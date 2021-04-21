@extends('./backend/layout/master')
@section('title','Quản Trị Danh Mục')
@section('title_page','Quản Trị Danh Mục')
@section('content')
<section class="content" style="margin:0;">
<table style="background-color: white" class="table table-striped table-bordered dt-responsive nowrap ">
    @if(session('thongbao'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('thongbao') }}
    </div>
    @endif
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Danh Mục</th>
            <th scope="col">Kiểu</th>
            <th scope="col">
                <a href="{{ route('category.create') }}">
                    <button type="button" class="btn btn-outline-primary">Tạo danh mục mới</button>
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach ($categories as $category)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $category->name }}</td>
            <td>
                @if ($category->type == 'news') <span>Tin tức</span>
                @else <span>Thông báo</span>
                @endif
            </td>
            
            <td>
                <a href="{{ route('category.edit',"$category->id") }}" class="btn btn-outline-warning border-warning">Sửa</a>
                <a id="btn_delete_{{ $category->id }}" class="btn btn-outline-danger">Xóa</a>
                <form id="delete_form_{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}"
                    method="post" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container justify-content-center d-flex mt-5 pb-5">
    {{$categories->links()}}
</div>
</section>
@endsection

@push('scripts')
<script>
$("a[id^='btn_delete_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
    if (confirm('Bạn có muốn xóa không')) {
        $("#delete_form_" + id).submit();
    }
});
</script>
@endpush