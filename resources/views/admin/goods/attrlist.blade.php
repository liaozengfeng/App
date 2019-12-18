@extends('layouts.layouts')
@section('title')
    商品
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>属性名</td>
		<td>属性值</td>
   </tr>
	@foreach($attrinfo as $k=>$v)
		@foreach($v['attr_val'] as $ke=>$va)
			<tr>
				<td>{{ $attrinfo[0]['attr'][$k]['attr_name'] }}</td>
				<td></td>
			</tr>
		@endforeach
	@endforeach

</table>

@endsection