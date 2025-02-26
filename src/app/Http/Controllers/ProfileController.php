<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $tab = $request->query('tab', 'sell');

        if ($tab === 'sell') {
            $items = Item::where('profile_id', $profile->id)->get();
        }
        else {
            $purchases = Purchase::where('profile_id', $profile->id)->pluck('item_id');
            $items = Item::whereIn('id', $purchases)->get();
        }

        return view('mypage.profile', compact('profile', 'tab', 'items'));
    }

    public function create()
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        return view('mypage.edit', compact('profile'));
    }

    public function store(ProfileRequest $profileRequest, AddressRequest $addressRequest)
    {
        $user = Auth::user();

        if ($profileRequest->hasFile('profile_image')) {
            $path = $profileRequest->file('profile_image')->store('profile_images', 'public');
        } else {
            $path = $user->profile->profile_image ?? null;
        }

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_name'   => $addressRequest->user_name,
                'profile_image' => $path,
                'postal_code' => $addressRequest->postal_code,
                'address'     => $addressRequest->address,
                'building'    => $addressRequest->building,
            ]
        );

        return redirect()->route('item.index');
    }
}
