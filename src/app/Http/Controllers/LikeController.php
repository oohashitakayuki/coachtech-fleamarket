<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($itemId)
    {
        $user = Auth::user();
        $profile = $user->profile;
        if (!$profile->is_like($itemId)) {
            $profile->likes()->create([
                'profile_id' => $profile->id,
                'item_id'    => $itemId,
            ]);
        }

        return back();
    }

    public function destroy($itemId)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $like = Like::where('item_id', $itemId)->where('profile_id', $profile->id)->first();
        if ($like) {
            $like->delete();
        }

        return back();
    }
}
