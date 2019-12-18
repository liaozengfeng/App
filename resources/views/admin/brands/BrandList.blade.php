@extends('layouts.layouts')
@section('title')
    分类
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>编辑</td>
		<td>品牌名称</td>
		<td>品牌图片</td>
		<td>是否显示</td>
		<td>操作</td>
   </tr>
	@foreach($res as $v)

	 <tr>
		<td>{{ $v->brand_id }}</td>
		<td><a href="{{ $v->brand_url }}">{{ $v->brand_name }}</a></td>
		<td><img src="{{ '/storage/'.$v->brand_img }}"  style="max-width: 100px;"></td>
		<td>
			@if($v->is_show==1)
			是
			@else
			否
			@endif
		</td>
		<td>
		<a href="{{url('/admin/brands/BrandDel')}}?brand_id={{ $v->brand_id }}" id="del">删除||</a>
		<a href="{{url('/admin/brands/BrandUpdate')}}?brand_id={{ $v->brand_id }}" >修改</a>
		</td>
   </tr>

	@endforeach

</table>
<script>
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
{{ $res->links() }}
@endsection