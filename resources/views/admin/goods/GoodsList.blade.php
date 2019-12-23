@extends('layouts.layouts')
@section('title')
    商品
@endsection
@section('content')
<form action="/admin/goods/GoodsList" id="get">
	商品名称:<input type="text" name="goods_name">
	商品品牌:<input type="text" name="brand_name">
	是否上架:<select name="is_up">
			<option value="">请选择..</option>
			<option value="1">是</option>
			<option value="否">否</option>
		</select>
	条件:<select name="order" id="">
			<option value="">请选择..</option>
			<option value="goods_id">ID</option>
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
		<td>商品名称</td>
		<td>商品品牌</td>
		<td>商品分类</td>
		<td>商品库存</td>
		<td>商品图片</td>
		<td>商品描述</td>
		<td>商品价格</td>
		<td>是否上架</td>
		<td>是否热销</td>
		<td>是否新品</td>
		<td>操作</td>
		
   </tr>
	@foreach($res as $v)

	 <tr goods_id="{{ $v->goods_id }}">
		<td>{{ $v->goods_id }}</td>
		<td>{{ $v->goods_name }}</td>
		<td>{{ $v->brand_name }}</td>
		<td>{{ $v->sort_name }}</td>
		<td>{{ $v->goods_stock }}</td>
		<td><img src="{{ '/storage/'.$v->goods_img }}" style="max-width: 100px;"></td>
		<td>{!! $v->goods_desc !!}</td>
		<td>{{ $v->goods_pirce }}</td>
		<td>
			@if($v->is_up==1)
			<span is_up="1" class="is_up">是</span>
			@else
			<span is_up="0" class="is_up">否</span>
			@endif
		</td>

		<td>
			@if($v->is_sale==1)
			<span is_sale="1" class="is_sale">是</span>
			@else
			<span is_sale="0" class="is_sale">否</span>
			@endif
		</td>

		<td>
			@if($v->is_new==1)
			<span is_new="1" class="is_new">是</span>
			@else
			<span is_new="1" class="is_new">否</span>
			@endif
		</td>


		<td>
		<a href="javascript:;" class="save" sort_id="{{ $v->sort_id }}" goods_id="{{ $v->goods_id }}">属性添加</a>
		<a href="javascript:;" class="attrlist" goods_id="{{ $v->goods_id }}">属性查看</a>
		<a href="{{url('/admin/goods/GoodsDel')}}?goods_id={{ $v->goods_id }}" id="del" >删除||</a>
		<a href="{{url('/admin/goods/GoodsUpdate')}}?goods_id={{ $v->goods_id }}" >修改</a>
		</td>
   </tr>

	@endforeach

</table>
<script>
// 既点既改
// 是否上架
$(document).on('click','.is_sale',function(){
		var is_sale=$(this).attr('is_sale');
		if (is_sale==1) {
			var is_sale=0;
		}else{
			var is_sale=1;
		}
		var goods_id=$(this).parent().parent().attr('goods_id');
		var _this=$(this);
		$.ajax({
			url:"/admin/goods/GoodsThat",//请求地址
			type:'get',//请求的类型
			dataType:'json',//返回的类型
			data:{is_sale:is_sale,goods_id:goods_id},//要传输的数据
			success:function(res){ //成功之后回调的方法
				if (is_sale==1) {
					_this.text('是').attr('is_sale','1');
				}else{
					_this.text('否').attr('is_sale','0');
				}
			}
		})
	})

// 是否热销
$(document).on('click','.is_up',function(){
		var is_up=$(this).attr('is_up');
		if (is_up==1) {
			var is_up=0;
		}else{
			var is_up=1;
		}
		var goods_id=$(this).parent().parent().attr('goods_id');
		var _this=$(this);
		$.ajax({
			url:"/admin/goods/GoodsThat",//请求地址
			type:'get',//请求的类型
			dataType:'json',//返回的类型
			data:{is_up:is_up,goods_id:goods_id},//要传输的数据
			success:function(res){ //成功之后回调的方法
				if (is_up==1) {
					_this.text('是').attr('is_up','1');
				}else{
					_this.text('否').attr('is_up','0');
				}
			}
		})
	})

// 是否新品
$(document).on('click','.is_new',function(){
		var is_new=$(this).attr('is_new');
		if (is_new==1) {
			var is_new=0;
		}else{
			var is_new=1;
		}
		var goods_id=$(this).parent().parent().attr('goods_id');
		var _this=$(this);
		$.ajax({
			url:"/admin/goods/GoodsThat",//请求地址
			type:'get',//请求的类型
			dataType:'json',//返回的类型
			data:{is_new:is_new,goods_id:goods_id},//要传输的数据
			success:function(res){ //成功之后回调的方法
				if (is_new==1) {
					_this.text('是').attr('is_new','1');
				}else{
					_this.text('否').attr('is_new','0');
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
<script>
	$(function () {
		$(document).on("click",".save",function () {
		    var sort_id=$(this).attr("sort_id");
		    var goods_id=$(this).attr("goods_id");
			location.href='/admin/goods/attrsave?goods_id='+goods_id+"&sort_id="+sort_id;
        })
        $(document).on("click",".attrlist",function () {
            var goods_id=$(this).attr("goods_id");
            location.href='/admin/goods/attrlist?goods_id='+goods_id;
        })
    })
</script>
@endsection