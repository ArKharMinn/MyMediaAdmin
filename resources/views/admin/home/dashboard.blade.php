@extends('admin.layout.master')

@section('content')
    <div class="col-10 offset-1 p-5">
        <div class="row">
            <div class="col-2 rounded shadow-sm p-1 border px-3 bg-white">
                <h5 class="">Admin</h5>
                <p>{{ count($admin) }}</p>
            </div>
            <div class="col-2 mx-2 rounded shadow-sm border p-1 px-3 bg-white">
                <h5 class="">User</h5>
                <p>{{ count($user) }}</p>
            </div>
            <div class="col-2 rounded shadow-sm border p-1 px-3 bg-white">
                <h5 class="">Post</h5>
                <p>{{ count($post) }}</p>
            </div>
        </div>
        <div class="my-3">
            <div class="my-3 d-flex justify-content-between align-items-center">
                <h5 class="">User List</h5>
                <a href="/user/list" class="nav-link btn bg-dark px-3 py-2">view all</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($user) != 0)
                            @foreach ($user as $d)
                                <tr id="hideTr">
                                    <td id="categoryId">{{ $d->id }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->created_at->format('d-F-y') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <h3 class="text-danger text-center my-5">This is no User</h3>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
        <div class="">
            <div class="my-3 d-flex justify-content-between align-items-center">
                <h5 class="">Post List</h5>
                <a href="/post/list" class="nav-link btn bg-dark px-3 py-2">view all</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($post) != 0)
                            @foreach ($post as $p)
                                <tr id="hideTr">
                                    <td id="categoryId">{{ $d->id }}</td>
                                    <td>{{ $p->title }}</td>
                                    <td>{{ $p->category }}</td>
                                    <td>{{ $p->created_at->format('d-F-y') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <h3 class="text-danger text-center my-5">This is no Post</h3>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
