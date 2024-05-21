<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    //list
    public function list(){
        $data = ActionLog::select('action_logs.*','posts.*',DB::raw('COUNT(action_logs.post_id) as post_count'))
        ->leftJoin('posts','posts.id','action_logs.post_id')
        ->groupBy('action_logs.post_id')
        ->get();
        // dd($data->toArray());
        return view('admin.trendPost.list',compact('data'));
    }

    public function detail($id){
        $data = Post::where('id',$id)->first();
        return view('admin.trendPost.detail',compact('data'));
    }
}
