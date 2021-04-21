@extends('./backend/layout/master')
@section('title','Quản Lý Khoá Học')
@section('title_page','Tạo Khoá Học Mới')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('course.store') }}" method="POST">
    @csrf
    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif
    <div class="form-group">
        <label for="exampleFormControlInput1">Tên Khoá Học</label>
        <br>
        {!! ShowErrors($errors,'course_name') !!}
        <input name="course_name" type="text" value="{{ old('course_name')}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Ngày khai giảng</label>
        <br>
        {!! ShowErrors($errors,'start_date') !!}
        <input data-date="" data-date-format="DD MM YYYY" type="date" name="start_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Ngày kết thúc dự kiến</label>
        <br>
        {!! ShowErrors($errors,'finish_date') !!}
        <input data-date="" data-date-format="DD MM YYYY" name="finish_date" type="date" value="{{ old('finish_date')}}" class="form-control">
    </div>
    <div class="d-flex align-items-center">
        <a class="btn btn-danger mr-4" href="{{route('course.index')}}">Quay lại</a>
        <button type="submit" class="btn btn-primary">Tạo Khoá Học</button>
    </div>

    </div>

</form>
@endsection