@extends('layouts.layouts')
@section('title')
    权重角色管理
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>编辑</td>
		<td>权限网址</td>
		<td>角色名称</td>
   </tr>
	@foreach($res as $v)

	 <tr>
		<td>{{ $v->rel_id }}</td>
		<td>{{ $v->per_url }}</td>
		<td>{{ $v->roles_name }}</td>
   </tr>

	@endforeach

</table>
{{ $res->links() }}
@endsection