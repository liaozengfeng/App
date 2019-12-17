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
		<a href="{{url('/admin/sort/SortDel')}}?sort_id={{ $v->sort_id }}" >删除||</a>
		<a href="{{url('/admin/sort/SortUpdate')}}?sort_id={{ $v->sort_id }}" >修改</a>
		</td>
   </tr>

	@endforeach

</table>
{{ $res->links() }}
@endsection