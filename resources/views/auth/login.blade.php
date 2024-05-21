@extends('auth.master')

@section('content')
    <div class="row rounded shadow-sm bg-white">
        <div class="col-6 p-5">
            <div class="text-center py-3">
                <h5 class="">Welcome to</h5>
                <h4 class="">My Media App</h4>
            </div>
            <form action="" method="POST">
                @csrf
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
                <div class="mt-5">
                    <button type="submit" class="btn btn-success btn-block">Login</button>
                </div>
                <div class="text-center my-3">
                    Don't have an account ? <a href="/register" class="text-danger d-inline nav-link">Sign up</a>
                </div>
            </form>
        </div>
        <div class="col-6 bg-dark d-flex justify-content-center align-items-center bgImage">
            <div class="">
                <h5 class="">My Media App</h5>
            </div>
        </div>
    </div>
@endsection

<style>
    .bgImage {
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url('{{ asset('image/pagoda.jpeg') }}');
    }
</style>
