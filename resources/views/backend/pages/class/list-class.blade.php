@extends('./backend/layout/master')
@section('title','Quản Trị Lớp Học')
@section('title_page','Danh sách lớp khoá') 
@section('content')
<section class="content">
    <table style="background-color: white" class="table ml-5">
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
                <th scope="col">Trạng thái</th>
                <th scope="col">
                    <a href="{{ route('class.create') }}">
                        <button type="button" class="btn btn-outline-primary">Tạo lớp mới</button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach ($classes as $class)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $class->name }}</td>
                <td>{{ $class->level_id}}</td>
                <td>{{ $class->courseName->course_name}}</td>
                <td>
                    @if($class->status == 1) <span style='color: green'>Hoạt động</span>
                    @else <span style='color: red'>Khoá</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-outline-info" href="{{ route('class.show',"$class->id") }}"> Chi Tiết
                    </a>
                    <a class="btn btn-outline-warning" href="{{ route('class.edit',"$class->id") }}">Sửa</a>

                    @if($class->status == 1)
                    <button id="btn_deactive_{{ $class->id }}" class="btn btn-outline-danger">Đóng</button>
                    @else
                    <button id="btn_deactive_{{ $class->id }}" class="btn btn-outline-success">Mở</button>
                    @endif

                    <form id="deactive_form_{{ $class->id }}" action="{{ route('class.destroy',$class->id) }}" method="post"
                        style="display: none;">
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
        {{$classes->links()}}
    </div>
</section>
@endsection

@push('scripts')
<script>
$("button[id^='btn_deactive_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_deactive_', '');
    $("#deactive_form_" + id).submit();
});
</script>
@endpush