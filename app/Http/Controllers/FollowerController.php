<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //
    public function addfollower(Request $request)
    {
        $data = $request->validate([
            'following_id' => 'required',
            'follower_id' => 'required'
        ]);

        $follower = new Follower();
        $follower->create($data);

        return redirect()->back();

    }
}
