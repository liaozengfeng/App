@extends('layouts.layouts')
@section('title')
    商品
@endsection
@section('content')

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

	 <tr>
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
			是
			@else
			否
			@endif
		</td>

		<td>
			@if($v->is_sale==1)
			是
			@else
			否
			@endif
		</td>

		<td>
			@if($v->is_new==1)
			是
			@else
			否
			@endif
		</td>


		<td>
		<a href="{{url('/admin/goods/GoodsDel')}}?goods_id={{ $v->goods_id }}" >删除||</a>
		<a href="{{url('/admin/goods/GoodsUpdate')}}?goods_id={{ $v->goods_id }}" >修改</a>
		</td>
   </tr>

	@endforeach

</table>
{{ $res->links() }}
@endsection