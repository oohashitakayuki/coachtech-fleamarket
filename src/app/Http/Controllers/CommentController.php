<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $itemId)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $profile->comments()->create([
            'profile_id' => $profile->id,
            'item_id'    => $itemId,
            'comment'    => $request->input('comment'),
        ]);

        return back();
    }
}
