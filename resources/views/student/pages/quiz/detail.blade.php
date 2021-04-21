@extends('student.layout.master')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <div class="col-12 text-center mb-3 font-weight-bold">
                                <div>Tổng Số Điểm Đạt Được: {{ $score }} Điểm</div>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php $check = array() ?>
                        @foreach(json_decode(str_replace("\'", "'",$question_and_answer)) as $key => $value)
                        <tr>
                            <td class="button_show">
                                <div class="col-12">Câu Hỏi Số {{ $i }} : {{ str_replace('\"', '"',str_replace("\'", "'", $key) )  }}</div>
                                <div class="col-12 mt-4">
                                    @foreach($value as $key2 => $answer)
                                    <div class="form-check">
                                        <input @foreach( json_decode(str_replace("\'", "'" ,$selected_answer)) as $key3=> $selectedanswer)
                                        @if($key == $key3 && $key2 == $selectedanswer )
                                        checked
                                        @endif
                                        @endforeach
                                        class="form-check-input" type="radio" name="exampleRadios_{{ $i }}" id="exampleRadios_{{ $key }}">
                                        <label class="form-check-label" for="exampleRadios_{{ $key }}">
                                            {{ $key2.": " }} {{ $answer }}
                                        </label>
                                        <br>
                                    </div>
                                    <br>
                                    @endforeach
                                </div>
                                <div class="col-12 mt-4 pt-4 pb-3 border-top">
                                    @foreach( json_decode(str_replace("\'", "'" ,$correct_answer)) as $key4 => $correctanswer)
                                    @if($key == $key4)
                                    Đáp Án Chính Xác Là :<span class="text-primary">{{ str_replace('"', " " ,str_replace('{', " " ,str_replace('}', " " ,json_encode($correctanswer)))) }}</span>
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                <div id="pagination"></div>
                <div style="clear:both;"></div>
                <style>
                    #pagination {
                        width: 100%;
                        text-align: center;
                        margin-left: -45px;
                    }

                    #pagination ul li {
                        border: 1px solid #17a2b8;
                        padding: 10px;
                        list-style: none;
                        display: inline;
                        float: left;
                        margin-left: 5px;
                    }
                </style>
            </div>
        </div>
    </div> <!-- end col -->
</div>
</div>
@endsection
{{-- previous --}}
<style>
    .flex-wrap {
        display: none !important;
    }

    .dataTables_filter {
        display: none !important;
    }

    .J-paginationjs-page {
        display: none !important;
    }

    .paginationjs-next {
        cursor: pointer;
    }

    .paginationjs-prev {
        cursor: pointer;
    }

    li.disabled {
        display: none !important;
    }

    button.button_show {
        margin: 60px 200px 200px 375px !important;
    }
</style>
@push('scripts')
<script>
    // phân trang
    $(document).ready(function() {
        let rows = []
        $('table tbody tr').each(function(i, row) {
            return rows.push(row);
        });

        $('#pagination').pagination({
            dataSource: rows,
            pageSize: 1,
            callback: function(data, pagination) {
                $('tbody').html(data);
            }
        })
    });
</script>
@endpush
