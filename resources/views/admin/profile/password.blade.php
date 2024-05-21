@extends('admin.layout.master')

@section('content')
 <div class="container p-5">
    <a href="{{ route('dashboard#profile') }}" class="m-3">
        <button class="btn btn-dark"><i class="fa-solid fa-angle-left me-2"></i>Back</button>
    </a>
    <div class="col-8 offset-2 shadow-sm p-4">
        <div>
            <div>{{ Auth::user()->name }}</div>
            <h1 class="my-2">Change Password</h1>
            <p class="mb-5 text-warning">Your Password must be at least six characters</p>
        </div>

        <form action="{{ route('dashboard#change') }}" method="POST">
            @csrf
            <div class="">
                <label for="">Old Password</label>
                <input type="password"  class="form-control @if(!$errors->has('oldPassword')) is-valid @endif @error('oldPassword') is-invalid @enderror" value="" name="oldPassword" placeholder="Enter Old Password..."/>
                @error('oldPassword')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                @if (session('notMatch'))
                    <small class="text-danger">Old password is incorrent. Please Try again</small>
                @endif
            </div>
            <div class="my-3">
                <label for="">New Password</label>
                <input type="password" @if(!$errors->has('newPassword')) value="{{ old('newPassword') }}" @endif class="form-control @if(!$errors->has('newPassword')) is-valid @endif @error('newPassword') is-invalid @enderror" value="" name="newPassword" placeholder="Enter New Password..."/>
                @error('newPassword')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Confirm Password</label>
                <input type="password" @if(!$errors->has('confirmPassword')) value="{{ old('confirmPassword') }}" @endif class="form-control  @if(!$errors->has('confirmPassword')) is-valid @endif @error('confirmPassword') is-invalid @enderror" value="" name="confirmPassword" placeholder="Enter Comfirm Password..."/>
                @error('confirmPassword')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
        </form>
    </div>
 </div>
@endsection
