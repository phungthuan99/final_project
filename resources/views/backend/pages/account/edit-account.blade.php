@extends('./backend/layout/master')
@section('title','Chỉnh sửa thông tin tài khoản')
@section('title_page','Chỉnh Sửa thông tin tài khoản')
@section('content')
<form enctype="multipart/form-data" class="col-10 pl-5 pb-5 pt-5" action="{{ route('account.update',"$user->id") }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Họ tên</label>
          <br>
            {!! ShowErrors($errors,'fullname') !!}
            <input name="fullname" type="text" value="{{ $user->fullname }}" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ngày sinh</label>
          <br>
            {!! ShowErrors($errors,'date_of_birth') !!}
            <input name="date_of_birth" type="date" value="{{ $user->date_of_birth }}" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Địa chỉ</label>
          <br>
            {!! ShowErrors($errors,'address') !!}
            <input name="address" type="text" value="{{ $user->address }}" class="form-control" >
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
          <br>
            {!! ShowErrors($errors,'email') !!}
            <input name="email" value="{{ $user->email }}" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh</label> <br>
            <img style="width:30%" src="storage/{{ $user->avatar }}" alt="">
            <br>
            {!! ShowErrors($errors,'avatar') !!}
            <input type="hidden" name="avatar" value="{{ $user->avatar }}">
            <input type="file" name="avatar" class="form-control">
        </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Số điện thoại</label>
            <br>
            {!! ShowErrors($errors,'phone') !!}
            <input name="phone" value="{{ $user->phone }}" type="text" class="form-control" >
          </div>
          {{-- <div class="form-group">
            <label for="exampleFormControlInput1">Mật khẩu</label>
          <br>
            {!! ShowErrors($errors,'password') !!}
            <input name="password" type="password" class="form-control" >
        </div> --}}
    <button style="submit" class="mb-5 btn btn-primary">Sửa</button>
  </form>
  @endsection



