<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            // ->where('id','!=',Auth::id())
            $users = User::with('following')->get();
            // foreach($users as $user){
            //     $user->following =
            // }
            $followings = Follower::where('follower_id',Auth::id())->pluck('following_id');
// dd($users);
            $posts = Post::with('user','image')->whereIn('user_id',$followings)->orderBy('created_at','DESC')->get();

            return view('home',compact('users','posts'));
        }
        return view('auth.login');
    }
}
