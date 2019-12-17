@extends('layouts.layouts')
@section('title')
    角色用户管理
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>编辑</td>
		<td>用户名称</td>
		<td>角色名称</td>
		<td>操作</td>
   </tr>
	@foreach($res as $v)

	 <tr>
		<td>{{ $v->rel_id }}</td>
		<td>{{ $v->admin_name }}</td>
		<td>{{ $v->roles_name }}</td>

		<td><a href="{{url('/admin/relevances/RelevanUpdate')}}?admin_id={{ $v->admin_id }}">修改</a>
		</td>
   </tr>

	@endforeach

</table>

@endsection