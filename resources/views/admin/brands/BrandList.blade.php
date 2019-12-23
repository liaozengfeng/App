@extends('layouts.layouts')
@section('title')
    分类
@endsection
@section('content')
<form action="/admin/brands/BrandList" id="get">
	品牌名称:<input type="text" name="brand_name">
	是否显示:<select name="is_show">
			<option value="">请选择..</option>
			<option value="1">是</option>
			<option value="否">否</option>
		</select>
	条件:<select name="order" id="">
			<option value="">请选择..</option>
			<option value="brand_id">ID</option>
		</select>
	排序:<select name="order_do" id="">
			<option value="">请选择..</option>
			<option value="asc">升序</option>
			<option value="desc">倒序</option>
		</select>

	<input type="submit" value="搜索">
</form>
<table class="table table-bordered">
   <tr>
		<td>编辑</td>
		<td>品牌名称</td>
		<td>品牌图片</td>
		<td>是否显示</td>
		<td>操作</td>
   </tr>
	@foreach($res as $v)

	 <tr brand_id="{{ $v->brand_id }}">
		<td>{{ $v->brand_id }}</td>
		<td><a href="{{ $v->brand_url }}">{{ $v->brand_name }}</a></td>
		<td><img src="{{ '/storage/'.$v->brand_img }}"  style="max-width: 100px;"></td>
		<td>
			@if($v->is_show==1)
			<span is_show="1" class="is_show">是</span> 
 			@else
			<span is_show="0" class="is_show">否</span>
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

// 既点既改
// 是否显示
$(document).on('click','.is_show',function(){
		var is_show=$(this).attr('is_show');
		if (is_show==1) {
			var is_show=0;
		}else{
			var is_show=1;
		}
		var brand_id=$(this).parent().parent().attr('brand_id');
		var _this=$(this);
		$.ajax({
			url:"/admin/brands/BrandThat",//请求地址
			type:'get',//请求的类型
			dataType:'json',//返回的类型
			data:{is_show:is_show,brand_id:brand_id},//要传输的数据
			success:function(res){ //成功之后回调的方法
				if (is_show==1) {
					_this.text('是').attr('is_show','1');
				}else{
					_this.text('否').attr('is_show','0');
				}
			}
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
{{ $res->links() }}
@endsection