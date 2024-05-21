@extends('admin.layout.master')

@section('content')
 <div class="container p-5">
    <a href="{{ route('post#list') }}" class="m-3">
        <button class="btn btn-dark"><i class="fa-solid fa-angle-left me-2"></i>Back</button>
    </a>
    <div class="col-8 offset-2 shadow-sm p-4">
               <div class="">
                   <label for="" class="d-block">Image</label>
                   <img src="{{ asset('storage/'.$data->image) }}" width="300px" class="my-3"/>
               </div>
               <div class="">
                   <label for="">Name</label>
                   <h4>{{ $data->title }}</h4>
               </div>
               <hr/>
               <div class="my-3">
                   <label for="">Category</label>
                   <h5>{{ $data->category }}</h5>
                </div>
                <hr/>
               <div class="my-3">
                   <label for="">Description</label>
                   <h5>{{ $data->description }}</h5>
               </div>

    </div>
 </div>
@endsection
