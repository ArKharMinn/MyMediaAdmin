<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function post(){
        $post = Post::get();
        return response()->json([
            'post' => $post
        ]);
    }
    public function search(Request $request){
        $searchData = Post::where('title','like','%'.$request->key.'%')->get();
        return response()->json([
            'searchData' => $searchData
        ]);
    }
    public function detail(Request $request){
        $post = Post::where('id',$request->postId)->first();
        return response()->json([
            'post' => $post,
        ]);
    }
}
