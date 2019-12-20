@extends('layouts.layouts')
@section('title')
    商品
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>商品名</td>
		<td>属性值</td>
		<td>属性名</td>
   </tr>
	@foreach($attrinfo as $k=>$v)
		<tr>
			<td>{{$v['goods_name'] }}</td>
			<td>{{$v['attr_val'] }}</td>
			<td>{{$v['attr_name'] }}</td>
		</tr>
	@endforeach

</table>

@endsection