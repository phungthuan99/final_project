@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Thêm Mới Học Viên')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="/admin/student/store/excel" method="POST">
    @csrf
    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif
    <div class="form-group">
        <label for="exampleFormControlInput1">Nhập file excel</label>
        <br>
        {!! ShowErrors($errors,'address') !!}
        <input accept=".xlsx, .xls, .csv, .ods" name="excel" type="file" class="form-control">
    </div>
    <button type="submit" class="mb-5 btn btn-primary">Thêm Học Viên</button>
</form>
@endsection
