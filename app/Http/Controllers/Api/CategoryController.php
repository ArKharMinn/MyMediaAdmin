<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function category(){
        $category = Category::get();
        return response()->json([
            'category' => $category
        ]);
    }
    public function search(Request $request){
        $categoryData = Category::select('posts.*')
        ->join('posts','posts.category_id','categories.id')
        ->where('categories.title','like','%'.$request->key.'%')
        ->get();
        return response()->json([
            'categoryData' => $categoryData
        ]);
    }
}
