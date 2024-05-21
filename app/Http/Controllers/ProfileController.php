<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    //profile page
    public function profile(){
        $id = Auth::user()->id;
        $data = User::where('id',$id)->first();
        return view('admin.profile.profile',compact('data'));
    }

    //logout
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    //update profile
    public function update(Request $request){
        $this->profileVali($request);
        $id = Auth::user()->id;
        $data = $this->getInfo($request);
        User::where('id',$id)->update($data);
        return back()->with([
            'status' => 'success'
        ]);
    }

    //password change
    public function password(){
        return view('admin.profile.password');
    }

    public function change(Request $request){
        $userId = Auth::user()->id;

        $this->passRule($request);
        $user = User::where('id',$userId)->select('password')->first();
        $dbPass = $user->password;
        if(Hash::check($request->oldPassword,$dbPass)){
            $data = [
               'password' => Hash::make($request->newPassword)
            ];
            User::where('id',$userId)->update($data);
            return redirect()->route('dashboard#profile')->with(['success' => 'passchange']);
        };
        return back()->with(['notMatch' => 'failed']);

    }
    //getInfo
    private function getInfo($request){
        return  [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
        ];
    }

    //password rule
    private function passRule($request){
        $request->validate([
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword|min:6',
        ]);
    }

    //update profile validation
    private function profileVali($request){
        $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                'address' => 'required'
            ]);
    }
}
