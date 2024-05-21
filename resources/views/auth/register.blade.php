@extends('auth.master')

@section('content')
    <div class="col-8 offset-2 rounded shadow-sm bg-white">
        <div class=" p-5">
            <div class="text-center py-3">
                <h3 class="">Register</h3>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="my-3">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" />
                    @error('name')
                        <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" />
                    @error('email')
                        <small class="text-danger mt-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-3">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" />
                    @error('password')
                        <small class="text-danger mt-2a">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-3">
                    <label>Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" />
                    @error('password_confirmation')
                        <small class="text-danger mt-2a">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-dark btn-block">Register</button>
                </div>
                <div class="text-center my-3">
                    Already have an account ? <a href="/login" class="text-danger d-inline nav-link">Sign in</a>
                </div>
            </form>
        </div>
    </div>
@endsection
