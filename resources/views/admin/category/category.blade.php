@extends('admin.layout.master')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="">

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class=" mt-4">
          <div class="row">
            <div class="col-3">
                <div class="">
                    <div class="shadow-sm p-4">
                        <form action="{{ route('category#createPage') }}" method="POST">
                            @csrf
                            <div class="">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Category Name..."/>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Description</label>
                                <textarea cols="30" rows="8" name="description" placeholder="Enter Description..." class="form-control"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
            <div class="col-9">
                <div class="card-header">
                  <div class="card-tools p-3">
                    <form action="{{ route('category#list') }}" method="GET">
                      @csrf
                      <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="key" value="{{ request('key') }}" class="form-control float-right" placeholder="Search">

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
                  <div class=" card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap text-center">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($data) != 0)
                            @foreach ($data as $d)
                             <tr id="hideTr">
                               <td id="categoryId">{{ $d->id }}</td>
                               <td>{{ $d->title }}</td>
                               <td>{{ Str::limit($d['description'],20, '...') }}</td>
                               <td>{{ $d->created_at->format('d-F-Y') }}</td>
                               <td>
                                  <a href="{{ route('category#edit',$d->id) }}">
                                      <button title="edit" data-placement="top" data-toggle="tooltip" class="btn btn-sm bg-dark text-white">
                                          <i class="fas fa-edit"></i>
                                        </button>
                                  </a>
                                  <button title="delete" data-toggle="tooltip" data-placement="top" class="item btn btn-sm deleteBtn bg-danger text-white">
                                      <i class="fas fa-trash-alt"></i>
                                  </button>
                               </td>
                             </tr>
                            @endforeach

                          @else
                              <h3 class="text-danger text-center my-5">This is no Category</h3>
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
            {{ $data->links('pagination::bootstrap-5') }}
         </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function(){
            $('.deleteBtn').click(function(){
                $parentNode = $(this).parents('tr')
                $id = $parentNode.find('#categoryId').text()

                $.ajax({
                    type : 'get',
                    data : { 'id' : $id },
                    dataType : 'json',
                    url : '{{ route('category#delete') }}',
                    success : function(response){
                        $('#hideTr').hide()
                    }
                })
            })
        })
    </script>
@endsection
