@extends('layouts.layouts')
@section('title')
    商品图片
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>编辑</td>
		<td>商品详情图片</td>
		<td>商品名称</td>
		<td>操作</td>
		
   </tr>
	@foreach($res as $v)

	 <tr>
		<td>{{ $v->img_id }}</td>
		<td><img src="{{ '/storage/'.$v->goodss_img }}" style="max-width: 100px;"></td>
		<td>{{ $v->goods_name }}</td>
		<td><a href="{{url('/admin/img/ImgDel')}}?img_id={{ $v->img_id }}" >删除||</a>
		<a href="{{url('/admin/img/ImgUpdate')}}?img_id={{ $v->img_id }}" >修改</a>
		</td>
   </tr>

	@endforeach

</table>
{{ $res->links() }}
@endsection