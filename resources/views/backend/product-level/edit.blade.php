@extends('backend.layouts.master')
@section('title','LEARN || Product Level Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Product Level</h5>
    <div class="card-body">
      <form method="post" action="{{route('product-level.update',$level->id)}}">
        @csrf
        @method('PATCH')

        @include('backend.product-level.form')

        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
          <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection
