@extends('./backend/layout/master')
@section('title','Quản Trị Quiz')
@section('title_page',"Danh Sách Quiz Level $level")
@section('content')

<div class="col-12 m-auto">
<table class="table mt-5">
    @if(session('thongbao'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('thongbao') }}
      </div>
    @endif
    <thead>
        <tr>
            <th class="pl-3" scope="col">STT</th>
            <th scope="col">Mô Tả</th>
            <th scope="col">Người Tạo</th>
            <th scope="col">Số Câu Hỏi</th>
            <th scope="col">Trạng Thái</th>
            <th style="width: 300px"></th>
            <th style="margin-right: 23px"  scope="col">
                    <a href="{{ route('detail_question_test.create','level='.$level) }}">
                        <button style="width: 100%" type="button" class="border-primary btn btn-outline-primary"> Thêm Mới Bài Quiz</button>
                    </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @if(count($get_all_Question_test) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả  Nào
                </div>
            </div>
        </td>
        @endif
        <?php  $i=1; ?>
        @foreach ($get_all_Question_test as $item)
            </tr>
        <td>{{ $i++ }}</td>
        <td style="width: 16%;">
            Bài Quiz Buổi : {{ $item->quiz }}
        </td>
        <td style="width: 15%;">{{ $item->userName->fullname }}</td>
        <td style="width: 15%;">
            <?php $count=0; ?>
            @foreach ($questions_test as $questions)
            @if($questions->quiz_id == $item->quiz && $item->level_id == $questions->level_id)
            <?php  $count++ ?>
            @endif
            @endforeach
            {{ $count }}
        </td>
        <td style="width: 20%;">
            @if($count < 10)
            <p class="text-red">Chưa Đủ Câu Hỏi</p>
            @else
            <p class="text-primary">Đã Đủ Câu Hỏi</p>
            @endif
        </td>
        <td style="width: 100px"></td>
            <td class="text-center" style="width: 22%;">
            <a href="{{ route('detail_question_test.show',$item->id) }}">
                <button style="width: 109px;" type="button" class="border-primary btn btn-outline-primary"> Câu Hỏi </button>
            </a>
            <a href="{{ route('quiz_test.edit',$item->id) }}">
                <button style="width: 107px;" type="button" class="border-warning btn btn-outline-warning">Sửa</button>
            </a>
            <a style="width: 107px;" id="btn_delete_{{ $item->id }}"class="btn border-danger  btn-outline-danger">Xóa</a>
            <form id="delete_form_{{ $item->id }}" action="{{ route('quiz_test.destroy',$item->id) }}"
            method="post"style="display: none;"
            >
            @method('DELETE')
            @csrf
            </form>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<div class="container justify-content-center d-flex mt-5">
    {{$get_all_Question_test->links()}}
</div>
@endsection

@push('scripts')
<script>
  $("a[id^='btn_delete_']").click(function (event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
    if(confirm('Bạn có muốn xóa không')){
    $("#delete_form_" + id).submit();
    }
  });
</script>
@endpush
