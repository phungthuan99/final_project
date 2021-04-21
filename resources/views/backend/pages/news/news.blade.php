@extends('./backend/layout/master')
@section('title','Quản Trị Tin Tức')
@section('title_page','Quản Trị Tin Tức')
@section('content')
<div class="filter mb-3">
    <div class="col-5 mb-3">
        <form action="" class="d-flex">
            <input class="form-control border-success mr-2" type="text" name="title" value="{{request()->get('title')}}" placeholder="Tìm theo tiêu đề">
            <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>
    </div>
    <div class="col-12 ">
        <form action="" class="row">
            <div class="col-4"><input type="date" class="form-control border-success" value="{{request()->get('start_date')}}" name="start_date" id=""></div>
            <div class="col-4"><input type="date" class="form-control border-success" value="{{request()->get('finish_date')}}" name="finish_date" id=""></div>
            <div class="col-3">
                <button type="submit" class="btn btn-outline-info">
                    Lọc theo ngày tháng
                </button>
            </div>
        </form>
   </div>
    </div>
</div>
<section class="content" style="margin:0!important;">
    <table style="background-color: white" class="table table-striped table-bordered dt-responsive nowrap ">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        <thead>
            <tr>
                <th style="width: 10px">ID</th>
                <th>Ảnh</th>
                <th style="width:30%">Tiêu đề</th>
                <th>Danh mục</th>
                <th>Lượt xem</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th><a class="btn btn-outline-success" href="{{route('news.create')}}">Thêm tin tức</a></th>
            </tr>
        </thead>
        <tbody>
            @if(count($news) == 0)
            <td colspan="8">
                <div class="mt-5 col-12 justify-content-center d-flex">
                    <div class=" alert alert-danger" role="alert">
                        Không có kết quả cho tin tức tìm kiếm
                    </div>
                </div>
            </td>
            @endif
        <?php $i = 1 ?>
            @foreach($news as $new)
            <tr>
                <td>{{ $i++ }}</td>
                <td><img src="storage/{{ $new->image }}" width="70px" height="50px"></td>
                <td>{{$new->title}}</td>
                <td>{{$new->categoryName->name}}</td>
                <td>{{$new->view}}</td>
                <td>
                    <a class="toggle-class" id="btn_deactive_{{ $new->id }}">
                        <input id="toggle_news_{{ $new['id'] }}"  type="checkbox" @if($new->status == 1) checked @endif
                        data-toggle="toggle" data-on="Hiện"
                        data-off="Ẩn" data-onstyle="success" data-offstyle="danger"
                        >
                    </a>
                </td>
                <td>{{$new->created_at->format('d-m-Y')}}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{route('news.show',[$new->id])}}">Chi tiết</a>
                    <a class="btn btn-outline-warning" href="{{route('news.edit',[$new->id])}}">Sửa</a>
                    <form id="deactive_form_{{ $new->id }}" action="{{ route('news.destroy',$new->id) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        <input type="hidden" name="status" value="{{$new->status}}">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$news->links()}}
    </div>
</section>
@endsection

@push('scripts')
<script>
$("a[id^='btn_deactive_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_deactive_', '');
    if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái của tin tức')) {
            $("#deactive_form_" + id).submit();
        } else {
            $(`input#toggle_news_${id}`).bootstrapToggle('disable')
        }
});
</script>
@endpush