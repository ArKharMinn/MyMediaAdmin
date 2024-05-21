<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Spatie\Backtrace\File;

class PostController extends Controller
{
    //list
    public function list()
    {
        $post = Post::select('posts.*', 'categories.title as category_name')
            ->leftJoin('categories', 'posts.category_id', 'categories.id')
            ->when(request('key'), function ($query) {
                $query->where('title', 'like', '%' . request('key') . '%');
            })
            ->orderBy('created_at', 'desc')->paginate(10);
        $post->appends(request()->all());
        $data = Category::get();
        return view('admin.post.list', compact('post', 'data'));
    }

    //create
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required',
        ]);
        $create = $this->dataCreate($request);
        $fileName = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $fileName);
        $create['image'] = $fileName;
        Post::create($create);
        return back();
    }

    //delete
    public function delete(Request $request)
    {
        $dbImg = Post::where('id', $request->id)->first();
        $dbImage = $dbImg['image'];
        Post::where('id', $request->id)->delete();
        if (Storage::exists('public/' . $dbImage)) {
            Storage::delete('public/' . $dbImage);
        }

        $response = [
            'status' => 'success'
        ];
        return response()->json($response, 200);
    }

    //update
    public function edit($id)
    {
        $data = Post::where('id', $id)->first();
        $cate = Category::get();
        return view('admin.post.edit', compact('data', 'cate'));
    }
    public function update($id, Request $request)
    {

        $data = $this->dataCreate($request);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $dbImg = Post::where('id', $id)->first();
            $dbImg = $dbImg->image;

            if ($dbImg != null) {
                Storage::delete('public/' . $dbImg);
            }
            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Post::where('id', $id)->update($data);
        return redirect()->route('post#list');
    }

    //view
    public function view($id)
    {
        $data = Post::select('posts.*', 'categories.title as category')
            ->leftJoin('categories', 'posts.category_id', 'categories.id')
            ->where('posts.id', $id)->first();
        return view('admin.post.view', compact('data'));
    }

    //data create
    private function dataCreate($request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
        ];
    }
}
