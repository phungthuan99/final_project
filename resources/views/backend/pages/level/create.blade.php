@extends('./backend/layout/master')
@section('title','Quản Trị Level')
@section('title_page','Thêm Mới Level')
@section('content')
<form class="pl-5 pt-5" action="{{ route('level.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
      <label for="">Level</label>
    <br>
      {!! ShowErrors($errors,'level') !!}
      <input name="level"  value="{{ old('level') }}" type="text" class="form-control" >
    </div>
    <div class="form-group">
      <label for="">Mô tả</label>
    <br>
      {!! ShowErrors($errors,'description') !!}
      <input name="description"  value="{{ old('description') }}" type="text" class="form-control" >
    </div>
    <div class="form-group">
      <label for="">Học Phí</label>
    <br>
      {!! ShowErrors($errors,'fee') !!}
      <input name="fee"  value="{{ old('fee') }}" type="text" class="form-control" >
    </div>
    <div class="form-group">
      <label for="">Ảnh</label>
    <br>
      {!! ShowErrors($errors,'image') !!}
      <input name="image" type="file" class="form-control" >
    </div>

    <button type="submit" class="mb-5 btn btn-primary"> Thêm Level</button>
  </form>
  @endsection
