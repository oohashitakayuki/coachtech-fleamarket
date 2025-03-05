<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExhibitionRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExhibitionController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();

        return view('item.create', compact('categories'));
    }

    public function store(ExhibitionRequest $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('item_images', 'public');
        } else {
            $path = 'img/no-image.jpg';
        }

        $item = Item::create([
            'profile_id' => $profile->id,
            'name' => $request->input('name'),
            'image' => $path,
            'brand' => $request->input('brand'),
            'condition' => $request->input('condition'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        if ($request->has('categories')) {
            $item->categories()->attach($request->input('categories'));
        }

        return redirect()->route('item.index');
    }
}
