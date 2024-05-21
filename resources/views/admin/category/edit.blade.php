@extends('admin.layout.master')

@section('content')
 <div class="container p-5">
    <a href="{{ route('category#list') }}" class="m-3">
        <button class="btn btn-dark"><i class="fa-solid fa-angle-left me-2"></i>Back</button>
    </a>
    <div class="col-8 offset-2 shadow-sm p-4">

        <form action="{{ route('category#editPage',$data->id) }}" method="POST">
            @csrf
            <div class="">
                <label for="">Title</label>
                <input type="text" class="form-control" value="{{ $data->title }}" name="title" placeholder="Enter Title..."/>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="my-3">
                <label for="">Description</label>
                <textarea cols="30" rows="5" name="description" placeholder="Enter Description..." class="form-control">{{ $data->description }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-success">Update Category</button>
            </div>
        </form>
    </div>
 </div>
@endsection
