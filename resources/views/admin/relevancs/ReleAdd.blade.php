@extends('layouts.layouts')
@section('title')
    权重角色管理
@endsection
@section('content')
	<form id="form">
	  <div class="form-group">
	    <label for="exampleInputEmail1" >用户名称:</label>
	    <select name="per_id" class="form-control" >
			<option value="">请选择</option>
			@foreach($res as $v)
			<option value="{{ $v->per_id }}">{{ $v->per_url }}</option>
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
		        url:"/admin/relevancs/ReleAdd_do",
		        type:'post',
		        data:form,
		     	dataType:'json',
		     	success:function(res){
		     		
		     		if (res.code==1) {
		     			alert(res.font);
		     			location.href="/admin/relevancs/ReleList";
		     		}else{
		     			alert(res.font);
		     		}
		     		
		     		}

				},'json')

			})

	</script>

@endsection