@extends('./backend/layout/master')
@section('title','Quản Trị Danh Mục')
@section('title_page','Sửa Danh Mục')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('category.update',"$categories->id") }}" method="POST">
    @csrf
    @method('PUT')
    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif
    <div class="form-group">
        <label for="exampleFormControlInput1">Tên danh mục</label>
        <br>
        {!! ShowErrors($errors,'name') !!}
        <input name="name" value="{{ $categories->name }}" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Loại</label><br>
        
        {!! ShowErrors($errors,'type') !!}
        <select name="type" id="" class="form-control">
            <option @if ($categories->type == 'news') selected @endif value="news">Tin tức</option>
            <option @if ($categories->type == 'notification') selected @endif value="notification">Thông báo</option>
        </select>
    </div>
    <a class="btn btn-danger mb-5" href="{{ route('category.index') }}">Quay lại</a>
    <button type="submit" class="mb-5 btn btn-primary">Sửa</button>
</form>
@endsection