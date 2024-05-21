@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="">

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class=" mt-4">
                    <div class="row">
                        <div class="col-4">
                            <div class="container ">
                                <div class="shadow-sm p-4">
                                    <form action="{{ route('post#create') }}" method="post" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" value="{{ old('title') }}"
                                                name="title" placeholder="Enter Post Title..." />
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
                        </div>
                        <div class="card col-8">
                            <div class="card-header">
                                <div class="card-tools">
                                    <form action="{{ route('category#list') }}" method="GET">
                                        @csrf
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="key" value="{{ request('key') }}"
                                                class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($post) != 0)
                                            @foreach ($post as $d)
                                                <tr id="hideTr" class="">
                                                    <td id="categoryId">{{ $d->id }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $d->image) }}" width="100px" />
                                                    </td>
                                                    <td class="">{{ $d->title }}</td>
                                                    <td class="">{{ Str::limit($d['description'], 20, '...') }}</td>
                                                    <td class="">{{ $d->category_name }}</td>
                                                    <td class="">{{ $d->created_at->format('d-F-Y') }}</td>
                                                    <td class="">
                                                        <a href="{{ route('post#edit', $d->id) }}">
                                                            <button title="edit" data-placement="top"
                                                                data-toggle="tooltip" class="btn btn-sm bg-dark text-white">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('post#view', $d->id) }}">
                                                            <button title="view" data-placement="top"
                                                                data-toggle="tooltip" class="btn btn-sm bg-dark text-white">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </a>
                                                        <button title="delete" data-toggle="tooltip" data-placement="top"
                                                            class="item btn btn-sm deleteBtn bg-danger text-white">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            {{-- <h3 class="text-danger text-center my-5">This is no Post</h3>  --}}
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="p-3">
                    {{ $post->links('pagination::bootstrap-5') }}
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function() {
            $('.deleteBtn').click(function() {
                $parentNode = $(this).parents('tr')
                $id = $parentNode.find('#categoryId').text()

                $.ajax({
                    type: 'get',
                    data: {
                        'id': $id
                    },
                    dataType: 'json',
                    url: '{{ route('post#delete') }}',
                    success: function(response) {
                        $('#hideTr').hide()
                    }
                })
            })
        })
    </script>
@endsection
