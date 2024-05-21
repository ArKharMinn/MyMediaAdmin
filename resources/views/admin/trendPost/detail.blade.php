@extends('admin.layout.master')

@section('content')
    <div class="container p-5">
        <a href="{{ route('trend#list') }}" class="m-3">
            <button class="btn btn-dark"><i class="fa-solid fa-angle-left me-2"></i>Back</button>
        </a>
        <div class="col-8 offset-2 shadow-sm border p-4">
            <div class="">
                <label for="">Title : </label>
                <h4>{{ $data->title }}</h4>
            </div>

            <div class=" d-flex">
                <div class="">
                    <img src="{{ asset('storage/' . $data->image) }}" width="300px" class="my-3" />
                </div>
                <div class=" p-3">
                    <label for="">Description :</label>
                    <h5>{{ $data->description }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
