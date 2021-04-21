@extends('./backend/layout/master')
@section('content')
<form enctype="multipart/form-data" class="pl-5 pt-5" action="{{ route('register.update',"$get_register->id") }}" method="POST">
    @csrf
    @method('PUT')
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
      <label for="exampleFormControlInput1">Họ Tên</label>
    <br>
    <input readonly name="fullname" value="{{ $get_register->fullname }}" type="text" class="form-control" >
    </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Ngày Sinh</label>
      <br>
        <input readonly name="date_of_birth" value="{{ $get_register->date_of_birth }}" type="date" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
      <br>
        <input readonly name="phone" value="{{ $get_register->phone }}" type="number" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
      <br>
        
        <input readonly name="email" value="{{ $get_register->email }}" type="email" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Địa Chỉ</label>
      <br>
        <input readonly name="address" value="{{ $get_register->address }}" type="text" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Level</label>
      <br>
        <input readonly name="level" value="{{ $get_register->level }}" type="text" class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Ghi chú</label>
      <br>
        <textarea readonly name="note" value=""class="form-control" >{{ $get_register->note }}</textarea>
      </div>
          <div class="form-group mt-3">
            <label for="exampleFormControlSelect1">Trạng Thái</label>
            <select class="form-control" name="status" id="">
                <option @if($get_register->status == 1) selected @endif value="1">Đã xác nhận</option>
                <option @if($get_register->status == 0) selected @endif value="0">Chưa xác nhận</option>
            </select>
          </div>


    <button type="submit" class="mt-5 mb-5 btn btn-primary">Cập nhật</button>
  </form>
  <style>
    .dropdown-submenu {
     position: relative;
    }

    .dropdown-submenu .dropdown-menu {
     top: 0;
     left: 100%;
     margin-top: -1px;
    }
    </style>
  @endsection

  @push('scripts')
  <script>
    $(document).ready(function () {
      $('.dropdown-submenu a.test').on("click", function(e){
           $(this).next('ul').toggle();
           e.stopPropagation();
           e.preventDefault();
           });
  });
  </script>
  @endpush



