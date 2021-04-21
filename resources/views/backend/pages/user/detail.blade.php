@extends('./backend/layout/master')
@section('title','Quản Trị Tài Khoản')
@section('title_page','Thông Tin Tài Khoản')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="" method="POST">
    <div class="form-group">
        <label for="exampleFormControlInput1">Họ Tên</label>
        <input name="fullname" value="{{ $users->fullname }}" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ảnh</label><br>
        <img src="storage/{{ $users->avatar }}" style="width:15%" alt="">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ngày Sinh</label>
        <input name="date_of_birth" value="{{ $users->date_of_birth }}" type="date" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
        <input name="phone" value="{{ $users->phone }}" type="number" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input name="email" value="{{ $users->email }}" type="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
        <input name="address" value="{{ $users->address }}" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Vai trò</label>
        @if( $users->role == 5 ) <input name="address" value="Giám đốc" type="text" class="form-control">
        @elseif( $users->role == 4 ) <input name="address" value="Giảng viên" type="text" class="form-control">
        @elseif( $users->role == 3 ) <input name="address" value="Quản lý" type="text" class="form-control">
        @elseif( $users->role == 2 ) <input name="address" value="Admin" type="text" class="form-control">
        @endif
        
    </div>

    <a class="btn btn-danger" href="{{route('user.index')}}">Quay lại</a>
</form>
@endsection