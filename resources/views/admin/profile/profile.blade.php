@extends('admin.layout.master')

@section('title', 'profile')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-8 offset-3 mt-5">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <legend class="text-center">User Profile</legend>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="">
                                            <div class="">
                                                @if (session('status'))
                                                    <div class="alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        <strong>Successfully!</strong> updated
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @endif
                                                <form action="{{ route('dashboard#update') }}" method="POST">
                                                    @csrf
                                                    <label for="" class="">Name</label>
                                                    <input type="text" value="{{ $data->name }}" name="name"
                                                        class="d-inline form-control" placeholder="Enter Name" />
                                                    <label for="" class="mt-3">Email</label>
                                                    <input type="email" value="{{ $data->email }}" name="email"
                                                        class=" form-control" placeholder="Enter Email" />

                                                    <div class="my-3 text-end">
                                                        <button type="submit" class="btn btn-dark">Update</button>
                                                    </div>
                                                </form>
                                                <div class="float-end">
                                                    <a href="{{ route('dashboard#password') }}"
                                                        class="text-primary nav-link">Change
                                                        Password</a>
                                                </div>
                                            </div>
                                            <div class="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
