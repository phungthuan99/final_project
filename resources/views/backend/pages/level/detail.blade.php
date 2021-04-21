@extends('./backend/layout/master')
@section('title','Chi tiết khoá học')
@section('title_page','Danh sách lớp học theo level')
@section('content')

<section class="content" style="margin:0;">
    <!-- <div class="ml-5 dropdown pt-3 pb-4 mt-2">
        <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lọc Theo Khoá
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($courses as $course)
            <a class="dropdown-item"
                href="{{route('level.index')}}/{{$level->id}}?course_id={{ $course->id }}">{{ $course->course_name }}</a>
            @endforeach
        </div>
        <form action="">
            <select id='suppiler' name='course_id'>
                <option value=''>Select supplier</option>
                @foreach ($courses as $course)
                <option value='{{$course->id}}'>
                    {{ $course->course_name }}</option>
                @endforeach
            </select>
            <button>submit</button>
        </form>
    </div> -->
    <div class="row">
        <div class="col-6"><h3 class="">Danh sách lớp học level {{$level->level}}</h3></div>
        <div class="col-6">
            <form class="d-flex align-items-center mb-4" action="">
            <input class="form-control mr-2" type="text" name="name" value="{{request()->get('name')}}" placeholder="Tìm kiếm theo tên lớp">
                <button type="submit" class="btn btn-outline-info mr-4">Tìm</button>
                <!-- <a href="{{route('course.index')}}" class="btn btn-outline-success">Bỏ lọc</a> -->
            </form>
        </div>
    </div>

    

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
                <th scope="col">Ngày bắt đầu</th>
                <th scope="col">Ngày Kết thúc</th>
                <th scope="col">Trạng thái</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @if(count($classes) == 0)
            <td colspan="7">
                <div class="mt-5 col-12 justify-content-center d-flex">
                    <div class=" alert alert-danger" role="alert">
                        Tên lớp không đúng hoặc khoá học hiện tại chưa có lớp
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
                <td>{{date('d-m-Y', strtotime($class->start_date))}}</td>
                <td>{{date('d-m-Y', strtotime($class->finish_date))}}</td>
                <td>
                    <!-- <input data-id="{{$class->id}}" id="btn_deactive_{{ $class->id }}" class="toggle-class" type="checkbox" data-onstyle="success"
                        data-offstyle="danger" data-toggle="toggle" data-on="Mở" data-off="Đóng"
                        {{ $class->status ? 'checked' : '' }}> -->
                    <a class="toggle-class" id="btn_deactive_{{ $class->id }}">
                        <input type="checkbox" id="toggle_class_{{ $class['id'] }}" @if($class->status == 1) checked @endif
                        data-toggle="toggle" data-on="Mở "
                        data-off="Đóng" data-onstyle="success" data-offstyle="danger"
                        >
                    </a>

                </td>
                <td>
                    <a class="btn btn-outline-info" href="{{ route('class.show',"$class->id") }}"> Chi Tiết
                    </a>
                    <a data-start="{{$class->start_date}}" class="btn btn-outline-warning edit-class"
                        href="{{route('class.edit',"$class->id")}}">Sửa</a>

                    <!-- @if($class->status == 1)
                    <button id="btn_deactive_{{ $class->id }}" class="btn btn-outline-danger">Đóng</button>
                    @else
                    <button id="btn_deactive_{{ $class->id }}" class="btn btn-outline-success">Mở</button>
                    @endif -->

                    <form id="deactive_form_{{ $class->id }}" action="{{ route('class.destroy',$class->id) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        <input type="hidden" name="status" value="{{$class->status}}">
                        @csrf
                    </form>
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