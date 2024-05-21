<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //list
    public function list()
    {
        $data = User::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%')
                ->orWhere('email', 'like', '%' . request('key') . '%');
        })
            ->where('role', 'user')
            ->orderBy('created_at', 'desc')->paginate(10);
        $data->appends(request()->all());
        return view('admin.userList.list', compact('data'));
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
}
