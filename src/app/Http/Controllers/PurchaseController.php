<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\PurchaseRequest;
use App\Models\Item;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function create($id)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $item = Item::where('id',$id)->first();

        return view('purchase.checkout', compact('profile', 'item'));
    }

    public function store(PurchaseRequest $request, $itemId)
    {
        $user = Auth::user();
        $profile = $user->profile;
        if (!$profile->is_purchase($itemId)) {
            $profile->purchases()->create([
                'profile_id'     => $profile->id,
                'item_id'        => $itemId,
                'payment_method' => $request->input('payment_method'),
            ]);
        }

        return redirect()->route('item.index');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $item = Item::where('id',$id)->first();

        return view('purchase.address', compact('profile', 'item'));
    }

    public function update(AddressRequest $request, $itemId)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $profile->update([
            'postal_code' => $request->input('postal_code'),
            'address'     => $request->input('address'),
            'building'    => $request->input('building'),
        ]);

        return redirect()->route('purchase.create', ['item_id' => $itemId]);
    }
}
