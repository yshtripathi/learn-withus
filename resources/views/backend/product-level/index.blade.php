@extends('backend.layouts.master')
@section('title','LEARN || Product Levels')
@section('main-content')

<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Product Levels</h6>
      <a href="{{route('product-level.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add Product Level"><i class="fas fa-plus"></i> Add Product Level</a>
    </div>
    <div class="card-body">

      <form method="GET" action="{{route('product-level.index')}}" class="form-inline mb-4">
        <label for="course_filter" class="mr-2">Course</label>
        <select name="course_id" id="course_filter" class="form-control mr-2">
          <option value="">All courses</option>
          @foreach($courses as $course)
            <option value="{{$course->id}}" {{ request('course_id') == $course->id ? 'selected' : '' }}>{{$course->title}}</option>
          @endforeach
        </select>
        <button type="submit" class="btn btn-secondary btn-sm mr-2">Filter</button>
        @if(request('course_id'))
          <a href="{{route('product-level.index')}}" class="btn btn-light btn-sm">Clear</a>
        @endif
      </form>

      <div class="table-responsive">
        @if(count($levels)>0)
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Course</th>
              <th>Skill Level</th>
              <th>Skill Level (JP)</th>
              <th>Purpose</th>
              <th>Price (USD)</th>
              <th>Price (JPY)</th>
              <th>Price (HKD)</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($levels as $level)
                <tr>
                    <td>{{$level->id}}</td>
                    <td>{{ $level->course->title ?? '—' }}</td>
                    <td><span class="badge badge-info">{{$level->skill_level}}</span></td>
                    <td>{{$level->skill_level_jp}}</td>
                    <td>{{ Str::limit($level->purpose, 70) }}</td>
                    <td>{{ $level->price !== null ? number_format($level->price, 2) : '—' }}</td>
                    <td>{{ $level->price_jp !== null ? number_format($level->price_jp, 0) : '—' }}</td>
                    <td>{{ $level->price_hk !== null ? number_format($level->price_hk, 2) : '—' }}</td>
                    <td>
                        <a href="{{route('product-level.edit',$level->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('product-level.destroy',[$level->id])}}">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$level->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$levels->links()}}</span>
        @else
          <h6 class="text-center">No product levels found!!! Please create one</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>
      $(document).ready(function(){
          $('.dltBtn').click(function(e){
              var form = $(this).closest('form');
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
