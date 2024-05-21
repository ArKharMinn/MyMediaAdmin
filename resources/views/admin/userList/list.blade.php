@extends('admin.layout.master')

@section('content')
    <div class="">
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class=" mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <form action="{{ route('user#list') }}" method="GET">
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) != 0)
                                            @foreach ($data as $d)
                                                <tr id="hideTr">
                                                    <td id="categoryId">{{ $d->id }}</td>
                                                    <td>{{ $d->name }}</td>
                                                    <td>{{ $d->email }}</td>
                                                    <td>{{ $d->created_at->format('d-F-y') }}</td>
                                                    <td>
                                                        @if (Auth::user()->id != $d->id)
                                                            <button title="delete" data-toggle="tooltip"
                                                                data-placement="top"
                                                                class="item btn btn-sm deleteBtn bg-danger text-white">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <h3 class="text-danger text-center my-5">This is no User</h3>
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
                    url: '{{ route('user#delete') }}',
                    success: function(response) {
                        $('#hideTr').hide()
                    }
                })
            })
        })
    </script>
@endsection
