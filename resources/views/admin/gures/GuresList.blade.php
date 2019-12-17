@extends('layouts.layouts')
@section('title')
    轮播图
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>编辑</td>
		<td>轮播图图片</td>
		<td>操作</td>
		
   </tr>
	@foreach($res as $v)

	 <tr>
		<td>{{ $v->gure_id }}</td>
		<td><img src="{{ '/storage/'.$v->gure_img }}" style="max-width: 100px;"></td>
		<td><a href="{{url('/admin/gures/GureDel')}}?gure_id={{ $v->gure_id }}" >删除||</a>
		<a href="{{url('/admin/gures/GureUpdate')}}?gure_id={{ $v->gure_id }}" >修改</a>
		</td>
   </tr>

	@endforeach

</table>
{{ $res->links() }}
@endsection