@extends('layouts.layouts')
@section('title')
    角色用户管理
@endsection
@section('content')
	<form id="form">
	  <div class="form-group">
	    <label for="exampleInputEmail1" >用户名称:</label>
	    <select name="admin_id" class="form-control" >
			<option value="">请选择</option>
			@foreach($res as $v)
			<option value="{{ $v->admin_id }}">{{ $v->admin_name }}</option>
			@endforeach
	    </select>
	  </div>
	
	<div class="form-group">
	    <label for="exampleInputEmail1" >角色名称:</label>
	    <select name="roles_id" class="form-control" >
			<option value="">请选择</option>
			@foreach($info as $v)
			<option value="{{ $v->roles_id }}">{{ $v->roles_name }}</option>
			@endforeach
	    </select>
	  </div>

	  <button type="button" class="btn btn-default" id="tj">添加</button>
	</form>
	<script>

		$("#tj").click(function(){
			var form=$('#form').serialize();
			$.ajax({
		        url:"/admin/relevances/RelevanAdd_do",
		        type:'post',
		        data:form,
		     	dataType:'json',
		     	success:function(res){
		     		
		     		if (res.code==1) {
		     			alert(res.font);
		     			location.href="/admin/relevances/RelevanList";
		     		}else{
		     			alert(res.font);
		     		}
		     		
		     		}

				},'json')

			})

	</script>

@endsection