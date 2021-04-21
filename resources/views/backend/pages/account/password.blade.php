@extends('./backend/layout/master')
@section('title','Đổi mật khẩu')
@section('title_page','Đổi mật khẩu')
@section('content')
<form enctype="multipart/form-data" class="col-10 pl-5 pb-5 " action="{{ route('password.update',"$user->id") }}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Mật khẩu</label>
          <br>
            {!! ShowErrors($errors,'password') !!}
            <input name="password" type="password" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nhập lại mật khẩu</label>
          <br>
            {!! ShowErrors($errors,'cfpassword') !!}
            <input name="cfpassword" type="password" class="form-control" >
        </div>
    <button style="submit" class="mb-5 btn btn-primary">Sửa</button>
  </form>
  @endsection



