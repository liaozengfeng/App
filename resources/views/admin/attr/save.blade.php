@extends('layouts.layouts')
@section('title')
    分类
@endsection
@section('content')
    <form action="javascript:;">
        <input type="hidden" value="{{ $sort_info['sort_id'] }}" id="sort_id">
        <div class="form-group">
            <label for="exampleInputEmail1">分类名称</label>
            <span class="form-control" id="exampleInputEmail1">{{ $sort_info['sort_name'] }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">类型名称</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="类型名称">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <script>
        $(function () {
            $(document).on("click",".btn",function () {
                var data={};
                data.sort_id=$("#sort_id").val();
                data.attr_name=$("#exampleInputPassword1").val();
                $.ajax({
                    method:"POST",
                    url:"/admin/attr/type",
                    data:data,
                    dataType: "json",
                    success:function (res) {
                        if (res==1){
                            alert("添加成功");
                            location.href='/admin/sort/SortList';
                        }else{
                            alert("添加失败");
                        }
                    }
                })
            })
        })
    </script>
@endsection