@extends('./backend/layout/master')
@section('title','Quản Trị Học Viên')
@section('title_page','Thêm Mới Học Viên')
@section('content')
<div class="col-12">
    <form enctype="multipart/form-data" action="{{ route('student.store') }}" method="POST">
        @csrf
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
            {{session('thongbao')}}
        </div>
        @endif
        <div class="form-group">
            <label for="exampleFormControlInput1">Họ Tên</label>
            <br>
            {!! ShowErrors($errors,'fullname') !!}
            <input name="fullname" type="text" value="{{ old('fullname') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh</label>
            <br>
            {!! ShowErrors($errors,'avatar') !!}
            <input type="file" name="avatar" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">ngày Sinh</label>
            <br>
            {!! ShowErrors($errors,'date_of_birth') !!}
            <input name="date_of_birth" value="{{ old('date_of_birth') }}" type="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Số Điện Thoại</label>
            <br>
            {!! ShowErrors($errors,'phone') !!}
            <input name="phone" value="{{ old('phone') }}" type="number" class="form-control">
            <input name="class_id" value="" type="hidden">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">email</label>
            <br>
            {!! ShowErrors($errors,'email') !!}
            <input name="email" value="{{ old('email') }}" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Địa Chỉ</label>
            <br>
            {!! ShowErrors($errors,'address') !!}
            <input name="address" value="{{ old('address') }}" type="text" class="form-control">
        </div>
        {!! ShowErrors($errors,'class_id') !!}



        <div class="row">
            <div class="form-group col-4">
                <span class="error_course" style="color: red"></span>
            </div>

            <div class="form-group col-4">
                <span class="error_level" style="color: red"></span>
                {!! ShowErrors($errors,'level_id') !!}
            </div>

            <div class="form-group col-4">
                {!! ShowErrors($errors,'slot_add') !!}
            </div>

            <div class="form-group col-4">
                <select class="form-control h-100" name="course_id" id="course">
                    @if(count($get_all_course) == 0)
                    <option value="-1">Khóa đã kết thức hoặc quá 10% số buổi vui lòng tạo khóa và lớp mới hoặc chọn level và ca học để lưu vào danh sách chờ</option>
                    @else
                    <option value="-2">Chọn Khóa</option>
                    @endif
                    @if(count($get_all_course) != 0)
                    @foreach($get_all_course as $course)
                    <option value="{{$course->id}}"> {{$course->course_name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group col-4">
                <select class="form-control h-100" name="level_id" id="Level">
                    <option value="">Chọn Level</option>
                    @foreach($get_all_level as $level)
                    <option value="{{$level->id}}">Level: {{$level->level}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-4">
                <select class="form-control h-100" name="slot_add" id="slot">
                    <option value="">Chọn Ca</option>
                    <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                    <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                    <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                    <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                    <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                    <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                </select>
            </div>

        </div>

        <div class="form-group ">
            <div class="row paste_class">
                {{-- show class --}}
            </div>
        </div>
        <button type="submit" class="mt-5 mb-5 btn btn-primary">Thêm Học Viên</button>
    </form>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#Level').change(function() {
            if ($('#Level').val() != 0) {
                $('.error_level').html('');
                $("#slot option[value='']").prop("selected", "selected")
            }
        });
        $('#course').change(function() {
            if ($('#course').val() != -2) {
                $('.error_course').html('');
                $("#slot option[value='']").prop("selected", "selected")
                $("#Level option[value='']").prop("selected", "selected")
            }
            $('.thong-bao').css('display', 'none');
            $('.paste_class').html("");
        });
        $('#slot').on('change', function() {
            if ($('#course').val() == -2) {
                $('.error_course').html('Nếu bỏ trống Khóa Học học viên sẽ được lưu vào danh sách chờ');
            }
            if ($('#Level').val() == 0) {
                $('.error_level').html('Không được bỏ trống level');
            } else {
                $.ajax({
                    url: '/admin/student/create/' + $(this).val() + '/' + $('#Level').val() + '/' + $('#course').val(),
                    method: 'get',
                    success: function(response) {
                        // đổ dữ liệu
                        if (response == -1) {
                            html = "<p class='thong-bao pl-4 mt-4 text-danger'>Chưa có lớp nào trong ca này vui lòng chọn ca khác nếu không học viên sẽ được lưu vào danh sách chờ</p>"
                        } else {
                            html = "";
                            get_class = "";
                            response.map(x => {
                                get_class += `
                                <div class="form-check col-2 mt-3">
                                <input class="ml-1 form-check-input" type="radio" name="class_id" id="${x.id}" value="${x.id}">
                                <label class="form-check-label font-weight-normal ml-4" for="${x.id}">
                                ${x.name}
                                </label>
                                </div>
                                `;
                            })
                            html +=`<div class="form-check col-12 mt-3">
                                <h5 class="font-weight-bold">Danh Sách Lớp</h5>
                                <div class="row">
                                ${get_class}
                                </div>
                                </div>
                                `;
                        }
                        if ($('#course').val() != -2) {
                            $('.paste_class').html(html);
                        }
                    }
                });
            }

        });
    });
</script>
@endpush