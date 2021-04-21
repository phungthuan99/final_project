@extends('./backend/layout/master')
@section('title','Quản Trị Danh Mục')
@section('title_page','Thêm Mới Danh Mục')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('category.store') }}" method="POST">
    @csrf
    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif
    <div class="form-group">
        <label for="exampleFormControlInput1">Tên Danh Mục</label>
        <br>
        {!! ShowErrors($errors,'name') !!}
        <input name="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Kiểu</label>
        {!! ShowErrors($errors,'type') !!}
       <select class="form-control" name="type" id="">
            <option value="news">Tin Tức</option>
            <option value="notification">Thông báo</option>
       </select>
    </div>
    <div class="d-flex align-items-center">
    <a class="btn btn-danger mr-4" href="{{route('category.index')}}">Quay lại</a>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </div>

    </div>

</form>
@endsection