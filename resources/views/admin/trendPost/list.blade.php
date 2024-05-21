@extends('admin.layout.master')

@section('content')
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap text-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Name</th>
          <th>View Count</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @if (count($data) != 0)
          @foreach ($data as $d)
           <tr id="hideTr">
             <td id="categoryId">{{ $d->id }}</td>
             <td>
                <img src="{{ asset('storage/'.$d->image) }}" width="100px"/>
             </td>
             <td>{{ $d->title }}</td>
             <td><i class="fa-solid fa-eye"></i> {{ $d->post_count }}</td>
             <td>
                <a href="{{ route('tread#detail',$d->id) }}">
                    <button title="view" data-placement="top" data-toggle="tooltip" class="btn btn-sm bg-dark text-white">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                </a>
             </td>
           </tr>
          @endforeach

        @else
            <h3 class="text-danger text-center my-5">This is no Post</h3>
        @endif
        <div class="p-3">
            {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
         </div>
      </tbody>
    </table>

  </div>
@endsection
