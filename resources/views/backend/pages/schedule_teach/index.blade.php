@extends('./backend/layout/master')
@section('title','Quản Trị Lịch Dậy')
@section('title_page','Xếp Lịch Dạy Cho Giảng viên')
@section('content')
<div class="col-12">
    <div class="row bg-light form-inline">
        <div class="col-4"></div>
        <div class="col-8">
            <div style="margin-left: 365px" class="row pl-5">
                <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                    <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lọc Theo Trạng Thái
                    </button>
                    <div style="width: 172px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/admin/schedule_teach">Tất Cả</a>
                        <a class="dropdown-item" href="/admin/schedule_teach?teacher=1">Đã Xếp</a>
                        <a class="dropdown-item" href="/admin/schedule_teach?teacher=0">Chưa Xếp</a>
                    </div>
                </div>
                <div>
                    <form class="form-inline pt-4">
                        <input name="name" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Tìm Theo Tên Lớp" aria-label="Search">
                        <a>
                            <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
            <th scope="col">Khóa</th>
            <th scope="col">Số Học Viên Trong Lớp</th>
            <th scope="col">Giảng Viên Được Phân Công</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(count($get_all_class) == 0)
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
            <td>{{ $item->name }}</td>
            <td>{{ $item->levelName->level }}</td>
            <td>{{ $item->courseName->course_name }}</td>
            <td>{{ $item->count_studen_count }}</td>
            <td>
                @if($item->teacher_id != null)
                <p class="text-primary">{{ $item->Get_teacher_Name->fullname }}</p>
                @else
                <p class="text-warning">Chưa Có Giảng Viên</p>
                @endif
            </td>
            <td>
                @if($item->teacher_id == null)
                <button style="width: 57%;" data-toggle="modal" data-target="#exampleModal_{{ $item->id }}" type="button" id="btn_create_teacher_{{ $item->id }}" class="create border-primary btn btn-outline-primary">Xếp Giảng Viên</button>
                @else
                <button style="width: 57%;" data-toggle="modal" data-target="#exampleModal_{{ $item->id }}" type="button" id="btn_create_teacher_{{ $item->id }}" class="create border-warning btn btn-outline-warning">Đổi Giảng Viên</button>
                @endif
                <button data-toggle="modal" data-target="#exampleModal_{{ $item->id }}" type="button" id="btn_create_teacher_{{ $item->id }}" class="border-success btn btn-outline-success chitiet">Chi Tiết</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- xếp giảng viên --}}
@foreach ($get_all_class as $item)
<!-- Modal -->
<form id="btn_create_teacher_form_{{ $item->id }}" action="{{ route('schedule_teach.store') }}" method="post">
    @csrf
    <input type="hidden" name="class_id" value="{{ $item->id }}">
    <div class="modal fade" id="exampleModal_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div style="width: 150%;margin-left: -120px" class="modal-content">
                <div class="modal-header m-auto">
                    <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">
                        @if($item->teacher_id == null)
                        Xếp Giảng Viên
                        @else
                        <span id="title">Đổi Giảng Viên</span>
                        @endif
                    </h4>
                </div>
                <h4 class="error text-center text-danger"></h4>
                <div class="modal-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Lớp Được Xếp:</th>
                                <th scope="col">Lớp : {{ $item->name }}</th>
                                <th scope="col">Level : {{ $item->levelName->level }}</th>
                                <th scope="col">Khóa : {{ $item->courseName->course_name }}</th>
                            </tr>
                        </thead>
                        <tbody class="mt-5">
                            <tr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Ngày Bắt Đầu</th>
                                            <th>Ngày Kết Thúc</th>
                                            <th>Số Học Viên Trong Lớp</th>
                                            <th>Ngày Và Ca Trong Tuần</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mt-5">
                                        <tr>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->finish_date }}</td>
                                            <td>{{ $item->count_studen_count }}</td>
                                            <td class="week_and_slot_{{ $item->id }}">
                                                {{-- show week_and_slot --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <span style="color: red" id="error_teacher_{{ $item->id }}"></span>
                                            <div class="row" id="paste_teacher_{{ $item->id }}">
                                                {{-- show teacher --}}
                                            </div>
                                        </tr>
                                    </tbody>
                                </table>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>

                    <div id="detail_{{ $item->id }}">
                    @if($item->teacher_id == null)
                        <a id="btn_create_teacher_{{ $item->id }}">
                            <button type="button" class=" btn btn-primary">Xếp Giảng  Viên</button>
                        </a>
                    @else
                    <a id="btn_create_teacher_{{ $item->id }}">
                        <button type="button" class="btn btn-primary">Đổi Giảng  Viên</button>
                    </a>
                    @endif
                </div>

                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

{{-- <div class="container justify-content-center d-flex mt-5 pb-5">
    {{$get_all_class->links()}}
</div> --}}
@endsection
@push('scripts')
<script>
    // submit form
    $("a[id^='btn_create_teacher_']").click(function(event) {
        id = event.currentTarget.attributes.id.value.replace('btn_create_teacher_', '');
        if ($(`#teacher_id_${id }`).val() == 0) {
            $(`#error_teacher_${id}`).html('Vui Lòng Chọn Giảng Viên Cho Lớp');
        } else {
            $("#btn_create_teacher_form_" + id).submit();
        }
    });
    // ấn chi tiết thì ẩn nút tạo đi và thay đổi title
    $(".chitiet").click(function() {
        id=event.currentTarget.attributes.id.value.replace('btn_create_teacher_', '');
        $(`#error_teacher_${id}`).html('');
        $(`#detail_${id}`).addClass('d-none');
        $(`#title`).html('Thông Tin Chi Tiết');
     });

     // ấn create thì hiện nút tạo
    $(".create").click(function() {
        id=event.currentTarget.attributes.id.value.replace('btn_create_teacher_', '');
        $(`#detail_${id}`).removeClass('d-none');
     });

    // show teacher and weekday and slot
    $(document).ready(function() {
        $("button[id^='btn_create_teacher_']").click(function() {
            option = "";
            week_slot = "";
            id = event.currentTarget.attributes.id.value.replace('btn_create_teacher_', '');
            $.ajax({
                url: '/admin/schedule_teach/create/' + id,
                method: 'get',
                success: function(response) {
                    console.log(response);
                    // đổ dữ liệu weekday and slot
                    var time_slot = null;
                    $.each(response[1], function(weekday, slot) {
                        switch (parseInt(slot)) {
                            case 1:
                                time_slot = '( 7h15 đến 9h15 )';
                                break;
                            case 2:
                                time_slot = '( 9h30 đến 11h30 )';
                                break;
                            case 3:
                                time_slot = '( 1h30 đến 3h30 )';
                                break;
                            case 4:
                                time_slot = '( 15h45 đến 17h45 )';
                                break;
                            case 5:
                                time_slot = '( 18h00 đến 20h00 )';
                                break;
                            case 6:
                                time_slot = '( 20h15 đến 22h15 )';
                                break;
                        }
                        week_slot += `<p>Thứ ${weekday}  --> Ca ${slot}  ${time_slot}</p>`;
                    });
                    $(`.week_and_slot_${id}`).html(week_slot);
                    // đổ dữ liệu option teacher
                    if (response[0].length == 0) {
                        // show edit
                        if(response[2][0] != null){
                            response[2].map(x => {
                            option += `<option selected value="${x.id}">${x.fullname}</option>`
                            });
                        }
                        teacher = `<div class="form-group col-12">
                                <select class="form-control h-100 " name="teacher_id" id="teacher_id_${id}">
                                    ${option}
                                    <option value="0">Chưa có giảng viên hoặc giảng viên đã có ca này rồi</option>
                                </select>
                            </div>`;
                    } else {
                        // show edit
                        if(response[2][0] != null){
                            response[2].map(x => {
                            option += `<option selected value="${x.id}">${x.fullname}</option>`
                            });
                        }
                        response[0].map(x => {
                            option += `<option value="${x.id}">${x.fullname}</option>`
                        });
                        teacher = `<div class="form-group col-12">
                                <select class="form-control h-100 " name="teacher_id" id="teacher_id_${id}">
                                    <option value="0">Chọn Giảng Viên cho Lớp</option>
                                    ${option}
                                </select>
                            </div>`;
                    }
                    $(`#paste_teacher_${id}`).html(teacher);
                }
            });

        });
    });

</script>
@endpush
