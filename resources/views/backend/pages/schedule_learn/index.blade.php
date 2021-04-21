@extends('./backend/layout/master')
@section('title','Quản Trị Lịch Học')
@section('title_page','Xếp Lịch Học Cho Các Lớp')
@section('content')

<div class="col-12">
    <div style="padding-left: 500px" class="row bg-light form-inline">
        <div class="col-5"></div>
        <div class="col-7">
            <div class="row pl-5">
                <div class="dropdown pt-3 pb-4 mt-2">
                    <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lọc Theo Trạng Thái
                    </button>
                    <div style="width: 172px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/admin/schedule_learn">Tất Cả</a>
                        <a class="dropdown-item" href="/admin/schedule_learn?weekday=1">Đã Xếp</a>
                        <a class="dropdown-item" href="/admin/schedule_learn?weekday=0">Chưa Xếp</a>
                    </div>
                </div>
                <div>
                    <form style="margin-left:0px" class="form-inline pt-4">
                        <input style="width: 200px;" name="name" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Tìm Theo Tên Lớp" aria-label="Search">
                        <a>
                            <button style="width: 95px;" class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('thongbao'))
<div class="alert alert-primary text-center" role="alert">
    {{session('thongbao') }}
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th class="pl-3" scope="col">STT</th>
            <th scope="col">Tên Lớp</th>
            <th scope="col">Level</th>
            <th scope="col">Khóa Học</th>
            <th scope="col">Số Học Viên Trong Lớp</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(count($check_course) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả Nào
                </div>
            </div>
        </td>
        @endif
        <?php $i = 1 ?>
        @foreach ($get_all_class as $item)
        <tr>
            <th class="pl-3" scope="row">{{ $i++ }}</th>
            <td style="width: 250px;">{{ $item->name }}</td>
            <td style="width: 200px;">{{ $item->levelName->level }}</td>
            <td style="width: 250px;">{{ $item->courseName->course_name }}</td>
            <td>{{ $item->count_studen_count }}</td>
            <td>
                @if($item->status == 0)
                <p class="text-secondary">Lớp Đã Đóng</p>
                @else
                @if(array_search($item->id, $get_schedule) === false)
                <p class="text-warning">Chưa Xếp</p>
                @else
                <p class="text-primary">Đã Xếp</p>
                @endif
                @endif
            </td>
            <td style="padding-left: 150px">
                @if($item->status == 0)
                <button type="button" class="border-secondary btn btn-outline-secondary">Đã Đóng</button>
                @else
                @if(array_search($item->id, $get_schedule) === false)
                <button style="width: 97px;" data-toggle="modal" data-target="#exampleModal_{{$item->id}}" type="button" class="border-primary btn btn-outline-primary">Xếp Lịch</button>
                @else
                @if($item->count_studen_count == 0 && $item->teacher_id == null)
                <button style="width: 97px;" data-toggle="modal" data-target="#exampleModal_edit_{{$item->id}}" id="button_edit_{{$item->id}}" type="button" class="border-warning btn btn-outline-warning">Đổi Lịch</button>
                @else
                <button style="width: 97px;" data-toggle="modal" data-target="#exampleModal_edit_{{$item->id}}" id="button_edit_{{$item->id}}" type="button" class="border-primary btn btn-outline-primary">Xem Lịch</button>
                @if($item->teacher_id != null)
                <button style="width: 120px;" data-toggle="modal" data-target="#exampleModal_chuyen_lich_{{$item->id}}" id="button_chuyen_lich_{{$item->id}}" type="button" class="border-primary btn btn-outline-primary">Chuyển Lịch</button>
                @endif
                @endif
                @endif
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- xếp lịch --}}
@foreach ($get_all_class as $item)
<!-- Modal -->
<form id="btn_create_form_{{ $item->id }}" action="{{ route('schedule_learn.store') }}" method="post">
    @csrf
    <div class="modal fade" id="exampleModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header m-auto">
                    <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Xếp Lịch Học</h4>
                </div>
                <h5 class="error text-center text-danger"></h5>
                <div class="modal-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Lớp Đang Xếp</th>
                                <th scope="col">Lớp : {{$item->name}}</th>
                                @foreach ($get_all_level as $level)
                                @if($item->level_id == $level->id)
                                <th scope="col">Level : {{ $level->level }}</th>
                                @endif
                                @endforeach
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="mt-5">
                            <tr>
                                <th scope="row">Thứ 2</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="2" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 3</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="3" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 4</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="4" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 5</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="5" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 6</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="6" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 7</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="7" id="type">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <a id="btn_create_{{ $item->id }}">
                        <button type="button" class="btn btn-primary">Lưu Lịch Học</button>
                    </a>
                    <input name="class_id" type="hidden" value="{{ $item->id }}">
                    @foreach ($get_all_level as $level)
                    @if($item->level_id == $level->id)
                    <input name="level_id" type="hidden" value=" {{ $level->id }}">
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
{{-- đổi lịch --}}
@foreach ($get_all_class as $item)
@if(array_search($item->id, $get_schedule) !== false)
<!-- Modal -->
<form id="form_edit_{{ $item->id }}" action="{{ route('schedule_learn.store') }}" method="post">
    @csrf
    <div class="modal fade" id="exampleModal_edit_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header m-auto">
                    <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">
                        @if($item->count_studen_count == 0)
                        Đổi Lịch Học
                        @else
                        Chi Tiết Lịch Học
                        @endif
                    </h4>
                </div>
                <h5 class="error text-center text-danger"></h5>
                <div class="modal-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    @if($item->count_studen_count == 0)
                                    Lớp Thay Đổi
                                    @else
                                    Chi Tiết Lớp
                                    @endif
                                </th>
                                <th scope="col">Lớp : {{$item->name}}</th>
                                @foreach ($get_all_level as $level)
                                @if($item->level_id == $level->id)
                                <th scope="col">Level : {{ $level->level }}</th>
                                @endif
                                @endforeach
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="mt-5">
                            <tr>
                                <th scope="row">Thứ 2</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="2" id="2_{{$item->id}}">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 3</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="3" id="3_{{$item->id}}">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 4</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="4" id="4_{{$item->id}}">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 5</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="5" id="5_{{$item->id}}">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 6</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="6" id="6_{{$item->id}}">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Thứ 7</th>
                                <td class="pr-0" colspan="3">
                                    <select class="form-control h-100 mt-2" name="7" id="7_{{$item->id}}">
                                        <option value="0">Chọn Ca</option>
                                        <option value="1">Ca 1 ( 7h15 đến 9h15 )</option>
                                        <option value="2">Ca 2 ( 9h30 đến 11h30 )</option>
                                        <option value="3">Ca 3 ( 1h30 đến 3h30 )</option>
                                        <option value="4">Ca 4 ( 15h45 đến 17h45 )</option>
                                        <option value="5">Ca 5 ( 18h00 đến 20h00 )</option>
                                        <option value="6">Ca 6 ( 20h15 đến 22h15 )</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    @if($item->count_studen_count == 0 && $item->teacher_id == null)
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <a id="btn_edit_{{ $item->id }}">
                        <button type="button" class="btn btn-primary">Đổi Lịch Học</button>
                    </a>
                    @else
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    @endif
                    <input name="class_id" type="hidden" value="{{ $item->id }}">
                    @foreach ($get_all_level as $level)
                    @if($item->level_id == $level->id)
                    <input name="level_id" type="hidden" value=" {{ $level->id }}">
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</form>
@endif
@endforeach


{{-- chuyển lịch --}}
@foreach ($get_all_class as $item)
<!-- Modal -->
<form id="btn_chuyen_lich_form_{{ $item->id }}" action="{{ route('schedule_learn.update',$item->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="modal fade" id="exampleModal_chuyen_lich_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header m-auto">
                    <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Chuyển Lịch Học</h4>
                </div>
                <h5 class="erorr_submit text-center" style="color: red;"></h5>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Ngày Muốn Chuyển</label>
                        <span id="erorr_ngay_muon_chuyen" style="color: red;height: 10px;">
                        </span>
                        <select class="form-control" name="id_date_old" id="ngay_muon_chuyen_{{$item->id}}">
                            {{-- in ra các ngày của lớp học --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ngày Chuyển Sang</label>
                        <span id="erorr_ngay_chuyen_sang" style="color: red;height: 10px;"></span>
                            <input type="date" name="date_update" class="form-control" id="ngay_chuyen_sang_{{$item->id}}">
                    </div>
                    <div class="row" id="show_slot_null_{{$item->id}}">
                        {{-- show các ca mà trống trong ngày đo --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" id="button_an_chuyen_lich_{{$item->id}}" class="btn btn-primary">Chuyển Lịch</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
<div class="container justify-content-center d-flex mt-5">
    @if($check == false)
    {{$get_all_class->links()}}
    @endif
</div>
@endsection
@push('scripts')
<script>
    // create ////////////////////////////////////////
    $("a[id^='btn_create_']").click(function(event) {
        id = event.currentTarget.attributes.id.value.replace('btn_create_', '');
        var count = 0;
        $("select option:selected").each(function() {
            if ($(this).val() != 0) {
                count++;
            }
        });
        if (count >= 2) {
            if (confirm('Xác Nhận Lịch Học')) {
                $("#btn_create_form_" + id).submit();
            }
        } else {
            $(".error").html("Vui Lòng Chọn ca Cho ít Nhất 2 Ngày Trong Tuần");
        }
    });
    // check edit ////////////////////////////////////////
    $("a[id^='btn_edit_']").click(function(event) {
        id = event.currentTarget.attributes.id.value.replace('btn_edit_', '');
        var count = 0;
        $("select option:selected").each(function() {
            if ($(this).val() != 0) {
                count++;
            }
        });
        if (count >= 2) {
            if (confirm('Xác Nhận Lịch Học')) {
                $("#form_edit_" + id).submit();
            }
        } else {
            $(".error").html("Vui Lòng Chọn ca Cho ít Nhất 2 Ngày Trong Tuần");
        }
    });
    // show detail ajax ////////////////////
    $(document).ready(function() {
        $("button[id^='button_edit_']").click(function() {
            id = event.currentTarget.attributes.id.value.replace('button_edit_', '');
            $.ajax({
                url: '/admin/schedule_learn/show/edit/' + id,
                method: 'get',
                success: function(response) {
                    // đổ dữ liệu
                    $.each(response, function(weekday, slot) {
                        $(`#${weekday}_${id} option[value="${slot}"]`).prop("selected", "selected");
                    });
                }
            });
        });
    });
    // show lich hoc ajax ////////////////////
    $(document).ready(function() {
        $("button[id^='button_chuyen_lich_']").click(function() {
            id = event.currentTarget.attributes.id.value.replace('button_chuyen_lich_', '');
            html = "";
            $.ajax({
                url: '/admin/schedule_learn/show/chuyen_lich/' + id,
                method: 'get',
                success: function(response) {
                    // lấy a các ngày trong lịch mà chưa học
                    for (const [key, value] of Object.entries(response)) {
                        html += `
                        <option value="${key}" >${value}</option>
                        `;
                    }
                    $(`#ngay_muon_chuyen_${id}`).html(`<option value="0">Chọn Ngày</option>${html}`);
                }
            });
        });
    });

    // check ấn nút mà k chọn ngày chuyển ////////////////////////////////////////
    $("select[id^='ngay_muon_chuyen_']").on('change', function() {
        id = event.currentTarget.attributes.id.value.replace('ngay_muon_chuyen_', '');
        $(`input#ngay_chuyen_sang_${id}`).val("")
        $('span#erorr_ngay_muon_chuyen').html("");
        $(`div#show_slot_null_${id}`).html("");
    });

    // khi ấn vào lút chuyển lịch thì kiểm tra dữ liệu đã đúng chưa
    $("button[id^='button_an_chuyen_lich_']").click(function() {
        id = event.currentTarget.attributes.id.value.replace('button_an_chuyen_lich_', '');
        // check có phải chọn ngày quá khứ hay k
        var datep = $(`#ngay_chuyen_sang_${id}`).val();
        if (Date.parse(datep) - Date.parse(new Date()) < 0) {
            // qk
            $('span#erorr_ngay_chuyen_sang').html("<p>Không Được Chuyển Vào Ngày Hiện Tại Hoặc Quá Khứ</p>");
        } else {
            // ht
            if ($(`select#ngay_muon_chuyen_${id}`).val() == 0 || $(`input#ngay_chuyen_sang_${id}`).val() == null || $('input[name=slot]:checked').val() == undefined) {
                $('h5.erorr_submit').html('vui Lòng Nhập Đủ Thông Tin');
            } else {
                $("#btn_chuyen_lich_form_" + id).submit();
            }
        }
    });

    $("input[id^='ngay_chuyen_sang_']").on('change', function() {
        id = event.currentTarget.attributes.id.value.replace('ngay_chuyen_sang_', '');
        // check có phải chọn ngày quá khứ hay k và bỏ thông báo lỗi
        var datep = $(`#ngay_chuyen_sang_${id}`).val();
        if (Date.parse(datep) - Date.parse(new Date()) < 0) {
            $('span#erorr_ngay_chuyen_sang').html("<p>Không Được Chuyển Vào Ngày Hiện Tại Hoặc Quá Khứ</p>");
            $(`#show_slot_null_${id}`).clss('display','none');
            $('#erorr_slot').css('display','none');
        }else{
            $('span#erorr_ngay_chuyen_sang').html("");
        }
        if ($(`select#ngay_muon_chuyen_${id}`).val() == 0) {
            $('span#erorr_ngay_muon_chuyen').html("<p> Vui Lòng Chọn Ngày Muốn Chuyển </p>");
        } else {
            html = "";
            $.ajax({
                url: '/admin/schedule_learn/show/lich_trong/' + $(`select#ngay_muon_chuyen_${id}`).val() + '/' + $(`input#ngay_chuyen_sang_${id}`).val(),
                method: 'get',
                success: function(response) {
                    // lấy ra các lịch mà trống trong ngày đó
                    if(response.length == 0){
                        html += "<span id='erorr_slot' style='color:red;margin-left:17px'>Không Có Ca Nào Trống Trong Ngày Này</span>";
                    }else{
                        $('#erorr_slot').css('display','none');
                        response.map(x => {
                        html += `
                        <div class="form-check ml-3">
                        <input class="form-check-input" type="radio" name="slot" id="exampleRadios1" value="${x}">
                        <label class="form-check-label" for="exampleRadios1">
                            Ca : ${x}
                        </label>
                        </div>
                        `;
                    });
                    }
                    $(`#show_slot_null_${id}`).html(`<label class="col-12" for="exampleFormControlSelect1">Các Ca Trống Trong Ngày</label>${html}`);
                }
            });
        }
    });
</script>
@endpush
