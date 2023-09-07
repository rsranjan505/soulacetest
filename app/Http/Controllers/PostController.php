<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function createpost(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif'
        ]);

        $post = new Post();
        $data = $request->except('image','_token');
        $data['user_id'] = Auth::id();
        $post = $post->create($data);

        if($request->image !=null){
            $image = $this->fileUpload($request->image,$post,'local');
            $image['image_type']='post';
            $post->image()->create($image);
        }
        return redirect()->back();
    }
}
