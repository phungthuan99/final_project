@extends('./backend/layout/master')
@section('title','Chi tiết khoá học')
@section('title_page','Chi tiết khoá học')
@section('content')

<section class="content" style="margin:0;">
    <h3 class="ml-1">Danh sách lớp học của khoá {{$course->course_name}}</h3>
    <p class="ml-1">Ngày khai giảng: {{date('d-m-Y', strtotime($course->start_date))}}</p>
    <p class="ml-1">Ngày kết thúc dự kiến: {{date('d-m-Y', strtotime($course->finish_date))}}</p>
    <table style="background-color: white" class="table table-striped table-bordered dt-responsive nowrap">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên lớp</th>
                <th scope="col">Level</th>
                <th scope="col">Khoá</th>
                <th scope='col'>Số buổi học</th>
                <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @if(count($classes) == 0)
            <td colspan="7">
                <div class="mt-5 col-12 justify-content-center d-flex">
                    <div class=" alert alert-danger" role="alert">
                        Khoá học hiện tại chưa có lớp
                    </div>
                </div>
            </td>
            @endif
            <?php $i=1 ?>
            @foreach ($classes as $class)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $class->name }}</td>
                <td>{{ $class->levelName->level}}</td>
                <td>{{ $class->courseName->course_name}}</td>
                <td>{{ $class->number_of_sessions}}</td>
                <td>
                    <a class="toggle-class" id="btn_deactive_{{ $class->id }}">
                        <input type="checkbox" id="toggle_class_{{ $class['id'] }}" @if($class->status == 1) checked @endif
                        data-toggle="toggle" data-on="Mở "
                        data-off="Đóng" data-onstyle="success" data-offstyle="danger"
                        >
                    </a>
                    <form id="deactive_form_{{ $class->id }}" action="{{ route('class.destroy',$class->id) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        <input type="hidden" name="status" value="{{$class->status}}">
                        @csrf
                    </form>
                </td>
                <td>
                    <a class="btn btn-outline-info" href="{{ route('class.show',"$class->id") }}"> Chi Tiết
                    </a>
                    <a class="btn btn-outline-warning" href="{{ route('class.edit',"$class->id") }}">Sửa</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
    </div>
</section>
@endsection

@push('scripts')
<script>
    $("a[id^='btn_deactive_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_deactive_', '');
    if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái lớp học')) {
            $("#deactive_form_" + id).submit();
        } else {
            $(`input#toggle_class_${id}`).bootstrapToggle('disable')
        }
});
</script>
@endpush