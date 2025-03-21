<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'recommend');
        $keyword = $request->query('keyword', '');
        $query = Item::query();

        if ($tab === 'mylist') {
            if (Auth::check()) {
                $profileId = Auth::user()->profile->id;
                $likedItemIds = Like::where('profile_id', $profileId)->pluck('item_id');
                $query->whereIn('id', $likedItemIds);
            } else {
                $query->whereRaw('0 = 1');
            }
        } else {
            $query = Item::query();
            if (Auth::check()) {
                $profileId = Auth::user()->profile->id;
                $query->where('profile_id', '!=', $profileId);
            }
        }

        $query->keywordSearch($keyword);

        $items = $query->with('purchases')->get();
        foreach ($items as $item) {
            $item->is_sold = $item->purchases()->exists();
        }

        return view('item.index', compact('tab', 'items', 'keyword'));
    }

    public function show(Request $request, $id)
    {
        $item = Item::with('categories')->where('id', $id)->first();

        $likeCount = Like::where('item_id', $id)->count();
        $commentCount = Comment::where('item_id', $id)->count();

        $latestComment = Comment::with('profile')->where('item_id', $id)->latest()->first();

        return view('item.show', compact('item', 'likeCount', 'commentCount', 'latestComment'));
    }
}
