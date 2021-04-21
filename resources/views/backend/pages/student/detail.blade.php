@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Thông Tin Học Viên')
@section('content')
<div class="col-12">
<form enctype="multipart/form-data" action="" method="POST">
    @csrf
        <div class="col-12">
            <div class="row">
        <div class="col-6">
            <div class="row">
            <div class="form-group col-11">
                <div class="row">
                <label for="exampleFormControlInput1">Họ Tên</label>
                <input name="fullname" value="{{ $get_student->fullname }}" type="text" class="form-control">
            </div>
            </div>
            <div class="form-group col-11">
                <div class="row">
                <label for="exampleFormControlInput1">Mã Học Viên</label>
                <input name="fullname" value="{{ $get_student->code }}" type="text" class="form-control">
            </div>
            </div>
            <div class="form-group col-11">
                <div class="row">
                <label for="exampleFormControlInput1">Ảnh</label>
                <div class="img" style="width:50%">
                    <img class="ml-5" style="max-width:100%" src="storage/{{ $get_student->avatar }}" alt="">
                </div>
            </div>
            </div>
            <div class="form-group col-11">
                <div class="row">
                <label for="exampleFormControlInput1">ngày Sinh</label>
                <input name="date_of_birth" value="{{ $get_student->date_of_birth }}" type="date" class="form-control">
            </div>
            </div>
            <div class="form-group col-11">
                <div class="row">
                <label for="exampleFormControlInput1">Số Điện Thoại</label>
                <input name="phone" value="{{ $get_student->phone }}" type="number" class="form-control">
            </div>
            </div>
            <div class="form-group col-11">
                <div class="row">
                <label for="exampleFormControlInput1">email</label>
                <input name="email" value="{{ $get_student->email }}" type="email" class="form-control">
            </div>
            </div>
            <div class="form-group col-11">
                <div class="row">
                <label for="exampleFormControlInput1">Địa Chỉ</label>
                <input name="address" value="{{ $get_student->address }}" type="text" class="form-control">
            </div>
            </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group col-12">
                <div class="row">
                <label for="exampleFormControlInput1">Khóa Học</label>
                @foreach($get_all_course as $course)
                @if($course->id == $get_student->ClassName->course_id)
                <input name="address" value="{{ $course->course_name }}" type="text" class="form-control">
                @endif
                @endforeach
            </div>
            </div>
            <div class="form-group col-12">
                <div class="row">
                <label for="exampleFormControlInput1">Level</label>
                @foreach($get_all_level as $level)
                @if($level->id == $get_student->ClassName->level_id)
                <input name="address" value="Level :{{ $level->level }}" type="text" class="form-control">
                @endif
                @endforeach
            </div>
            </div>
            <div class="form-group col-12">
                <div class="row">
                <label for="exampleFormControlInput1">lớp Học</label>
                <input name="address" value="{{ $get_student->ClassName->name }}" type="text" class="form-control">
            </div>
            </div>
            <div class="form-group col-12 mt-5">
                <div class="row">
                <label for="exampleFormControlInput1">Điểm Và Các Level Đã Học Tại Trung Tâm </label>
                <table class="table mt-4 pl-0">
                    <thead>
                        <tr>
                            <th class="pl-0" scope="col">STT</th>
                            <th scope="col">Khóa Học</th>
                            <th scope="col">Level</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Điểm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach($get_all_history as $history)
                        @if($get_student->id == $history->student_id)
                        @foreach($get_all_course as $course)
                        @if($history->course_id == $course->id)
                        @foreach($get_all_level as $level)
                        @if($history->level_id == $level->id)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $level->level }}</td>
                            <td>
                                @if($course->status == 1)
                                <p class="text-primary">Hoàn Thành</p>
                                @else
                                <p class="text-warning">Chưa Hoàn Thành</p>
                                @endif
                            </td>
                            <td>{{ $history->score }}</td>
                        </tr>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
    <a href="{{ route('student.edit',"$get_student->id") }}">
        <button type="button" class="border-blue bg-blue btn btn-outline-warning ml-3">Sửa Học Viên</button>
    </a>
    </div>
</form>
</div>
@endsection
