@extends('./backend/layout/master')
@section('title','Quản Trị Tài Khoản')
@section('title_page','Sửa Tài Khoản')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('user.update',"$users->id") }}" method="POST">
    @csrf
    @method('PUT')
    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif
     <div class="form-group">
        <label for="">Ảnh</label><br>
        <img width="30%" src="storage/{{$users->avatar}}" alt="">
    </div>
    <div class="form-group">
        <label for="">Thay Ảnh</label> <br>
        <input type="file" class="form-control" name="avatar">
        {!! ShowErrors($errors,'avatar') !!}
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Họ Tên</label>
        <br>
        {!! ShowErrors($errors,'fullname') !!}
        <input name="fullname" value="{{ $users->fullname }}" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ngày Sinh</label>
        <br>
        {!! ShowErrors($errors,'date_of_birth') !!}
        <input name="date_of_birth" value="{{ $users->date_of_birth }}" type="date" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
        <br>
        {!! ShowErrors($errors,'phone') !!}
        <input name="phone" value="{{ $users->phone }}" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <br>
        {!! ShowErrors($errors,'email') !!}
        <input name="email" value="{{ $users->email }}" type="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
        <br>
        {!! ShowErrors($errors,'address') !!}
        <input name="address" value="{{ $users->address }}" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Vai trò</label>
        <br>
        <select class="form-control" name="role" id="">
            <option @if ($users->role == 5) selected @endif value="5">Giám đốc</option>
            <option @if ($users->role == 4) selected @endif value="4">Giảng viên</option>
            <option @if ($users->role == 3) selected @endif value="3">Quản lý</option>
            <option @if ($users->role == 2) selected @endif value="2">Admin</option>
        </select>
    </div>
    <a class="btn btn-danger mb-5" href="{{ route('user.index') }}">Quay lại</a>
    <button type="submit" class="mb-5 btn btn-primary">Sửa Tài Khoản</button>
</form>
@endsection