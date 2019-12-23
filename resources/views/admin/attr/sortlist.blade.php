@extends('layouts.layouts')
@section('title')
    分类
@endsection
@section('content')

    <table class="table table-bordered">
        <tr>
            <td>所属分类</td>
            <td>ID</td>
            <td>类型名称</td>
        </tr>
        @foreach($attr_info as $v)
            <tr>
                <td>{{ $sort_name['sort_name'] }}</td>
                <td>{{ $v['attr_id'] }}</td>
                <td>{{ $v['attr_name'] }}</td>
            </tr>

        @endforeach

    </table>
    <script>
        $(function () {
            $(document).on("click",".cli",function () {
                var sort_id=$(this).attr('sort_id');
                location.href='/admin/attr/type?sort_id='+sort_id;
            })
            $(document).on("click",".list",function () {
                var sort_id=$(this).attr('sort_id');
                location.href='/admin/attr/list?sort_id='+sort_id;
            })
        })
    </script>
@endsection