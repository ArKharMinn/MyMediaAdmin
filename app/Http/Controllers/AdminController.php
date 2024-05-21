<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    //list
    public function list()
    {
        $data = User::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%')
                ->orWhere('email', 'like', '%' . request('key') . '%')
                ->orWhere('gender', 'like', '%' . request('key') . '%');
        })
            ->where('role', 'admin')
            ->orderBy('created_at', 'desc')->paginate(10);
        $data->appends(request()->all());
        return view('admin.adminList.list', compact('data'));
    }

    //delete
    public function delete(Request $request)
    {
        User::where('id', $request->id)->delete();
        $response = [
            'status' => 'success'
        ];
        return response()->json($response, 200);
    }

    //dashboard
    public function dashboard()
    {
        $admin = User::where('role', 'admin')->latest()->take(5)->get();
        $user = User::where('role', 'user')->get();
        $post = Post::select('posts.*', 'categories.title as category')
            ->leftJoin('categories', 'categories.id', 'posts.category_id')
            ->latest()->take(5)->get();
        return view('admin.home.dashboard', compact('admin', 'user', 'post'));
    }
}
