@extends('./backend/layout/master')
@section('title','Quản Trị Level')
@section('title_page',' Chỉnh Sửa Level')
@section('content')
<form class="pl-5 pt-5" enctype="multipart/form-data" action="{{ route('level.update',"$get_level->id") }}" method="POST">
    @csrf
    @method('PUT')
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
      <label for="exampleFormControlInput1">Level</label>
    <br>
      {!! ShowErrors($errors,'level') !!}
      <input name="level"  value="{{ $get_level->level }}" type="text" class="form-control" >
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Mô tả</label>
    <br>
      {!! ShowErrors($errors,'description') !!}
      <input name="description"  value="{{ $get_level->description }}" type="text" class="form-control" >
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Học phí</label>
    <br>
      {!! ShowErrors($errors,'fee') !!}
      <input name="fee"  value="{{ $get_level->fee}}" type="text" class="form-control" >
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Ảnh</label>
    <br>
      <img style="width: 30%;" name="image" src="storage/{{ $get_level->image}}" alt=""> <br>
      <input name="image"  type="file" class="form-control" >
      {!! ShowErrors($errors,'image') !!}
    </div>
    <button type="submit" class="mb-5 btn btn-primary"> Sửa Level</button>
    <a href="{{route('level.index')}}" class="mb-5 btn btn-warning">Quay lại</a>
  </form>
  @endsection
