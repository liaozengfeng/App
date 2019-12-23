@extends('layouts.layouts')
@section('title')
    分类
@endsection
@section('content')
    <form action="javascript:;">
        <input type="hidden" value="{{ $goods_info['goods_id'] }}" id="goods_id">
        <div class="form-group">
            <label for="exampleInputEmail1">分类名称</label>
            <span class="form-control" id="exampleInputEmail1">{{ $sort_name['sort_name'] }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">商品名称</label>
            <span class="form-control" id="exampleInputEmail1">{{ $goods_info['goods_name'] }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">类型名称</label>
            <select class="form-control" id="select">
                <option value="">--请选择--</option>
                @foreach($attr_info as $v)
                    <option value="{{ $v['attr_id'] }}" attr_name="{{ $v['attr_name'] }}">{{ $v['attr_name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group attr">

        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <script>
        $(function () {
            $(document).on("change",".form-control",function () {
                var attr_name=$(".form-control option:selected").text();
                var str='';
                if (attr_name=='颜色'){
                    str+="    <label for=\"inputPassword\" class=\"col-sm-2 control-label\">颜色</label>\n" +
                        "    <div class=\"col-sm-10\">\n" +
                        "      <input type=\"text\" id=\"inputPassword\">\n" +
                        "    </div>\n";
                }else if (attr_name=='尺寸') {
                    str+="    <label for=\"inputPassword\" class=\"col-sm-2 control-label\">尺寸</label>\n" +
                        "    <div class=\"col-sm-10\">\n" +
                        "      <input type=\"text\" class=\"\" id=\"inputPassword\">\n" +
                        "    </div>\n";
                }
                $(".attr").html(str);
            })

            $(document).on("click",".btn",function () {
                var data={};
                data.goods_id=$("#goods_id").val();
                data.attr_id=$("#select").val();
                data.attr_val=$("#inputPassword").val();
                $.ajax({
                    method:"POST",
                    url:"/admin/goods/attrsave",
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