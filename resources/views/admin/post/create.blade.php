@extends('admin.layout.master')

@section('content')
 <div class="container p-5">
    <a href="{{ route('post#list') }}" class="m-3">
        <button class="btn btn-dark"><i class="fa-solid fa-angle-left me-2"></i>Back</button>
    </a>
    <div class="col-8 offset-2 shadow-sm p-4">

        <form action="{{ route('post#upload') }}" method="post" enctype="multipart/form-data">
         @csrf
            <div class="">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="">
                <label for="">Title</label>
                <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Enter Post Title..."/>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="my-3">
                <label for="">Category</label>
                <select name="category" class="form-control">
                    <option value="">Choose Category</option>
                    @foreach ($data as $d)
                      <option value="{{ $d->id }}">{{ $d->title }}</option>
                    @endforeach
                </select>
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="my-3">
                <label for="">Description</label>
                <textarea cols="30" rows="5" name="description" placeholder="Enter Post Description..." class="form-control">{{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-success">Create Post</button>
            </div>
        </form>
    </div>
 </div>
@endsection
