<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //list
    public function list(){
        $data = Category::when(request('key'),function($query){
            $query->where('title','like','%'.request('key').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(8);
        $data->appends(request()->all());
        return view('admin.category.category',compact('data'));
    }

    //update
    public function edit($id){
        $data = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('data'));
    }
    public function editPage(Request $request,$id){
        $data = $this->dataCreate($request);
        $request->validate([
            'title' => 'required|unique:Categories,title',
            'description' => 'required'
        ]);
        Category::where('id',$id)->update($data);
        return redirect()->route('category#list');
    }

    //create
    public function createPage(Request $request){
        $category = $this->dataCreate($request);
        $this->checkVail($request);
        Category::create($category);
        return redirect()->route('category#list');
    }

    //delete
    public function delete(Request $request){
        Category::where('id',$request->id)->delete();
        $response = [
            'status' => 'success'
        ];
        return response()->json($response,200);
    }

    //valitation
    private function checkVail($request){
        $request->validate([
            'title' => 'required|unique:Categories,title',
            'description' => 'required'
        ]);
    }

    //datacreate
    private function dataCreate($request){
        return [
            'title' => $request->title,
            'description' => $request->description,
        ];
    }
}
