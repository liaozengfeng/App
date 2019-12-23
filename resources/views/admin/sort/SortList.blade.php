@extends('layouts.layouts')
@section('title')
    分类
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>编辑</td>
		<td>分类名称</td>
		<td>是否显示</td>
		<td>操作</td>
   </tr>
	@foreach($res as $v)

	 <tr>
		<td>{{ $v->sort_id }}</td>
		<td>{!!str_repeat("&nbsp;",$v->level*5).$v->sort_name !!}</td>
		<td>
			@if($v->is_show==1)
			是
			@else
			否
			@endif
		</td>
		<td>
		<a href="{{url('/admin/sort/SortDel')}}?sort_id={{ $v->sort_id }}" >删除</a>||
		<a href="{{url('/admin/sort/SortUpdate')}}?sort_id={{ $v->sort_id }}" >修改</a>||
		<a href="javascript:;" class="cli" sort_id="{{ $v->sort_id }}">类型</a>
		<a href="javascript:;" class="list" sort_id="{{ $v->sort_id }}">查看类型</a>
		<a href="{{url('/admin/sort/SortDel')}}?sort_id={{ $v->sort_id }}" id="del">删除</a>
		</td>
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
	$(document).on('click','#del',function(){
		event.preventDefault();
		var url=$(this).attr('href');
		$.ajax({
			url:url,
			success:function(res){
				if (res==1) {
					alert("删除成功");
				}else{
					alert("删除失败");
				}
			}
		});

		$(this).parent().parent().remove();
	})
</script>
@endsection