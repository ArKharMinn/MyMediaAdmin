@extends('admin.layout.master')

@section('content')
    <div class="container p-5">
        <a href="{{ route('post#list') }}" class="m-3">
            <button class="btn btn-dark"><i class="fa-solid fa-angle-left me-2"></i>Back</button>
        </a>
        <div class="col-8 offset-2 shadow-sm p-4">

            <form action="{{ route('post#update', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <label for="" class="d-block">Image</label>
                    <img src="{{ asset('storage/' . $data->image) }}" width="200px" class="my-3" />
                    <input type="file" class="form-control mb-3" name="image">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <label for="">Title</label>
                    <input type="text" class="form-control" value="{{ $data->title }}" name="title"
                        placeholder="Enter Post Title..." />
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="">Category</label>
                    <select name="category" class="form-control">
                        @foreach ($cate as $c)
                            <option value="{{ $c->id }}"@if ($data->id == $c->id) selected @endif>
                                {{ $c->title }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="">Description</label>
                    <textarea cols="30" rows="5" name="description" placeholder="Enter Post Description..." class="form-control">{{ $data->description }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success">Update Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
