@extends('layouts.layouts')
@section('title')
    角色用户管理
@endsection
@section('content')
	<form id="form">
	  <div class="form-group">
	    <label for="exampleInputEmail1" >用户名称:</label>
	   	<span id="admin_id" admin_id="{{$res['admin_id']}}">{{ $res['admin_name'] }}</span>
	  </div>
	
	<div class="form-group">
	    <label for="exampleInputEmail1" >角色名称:</label>
	    <select name="roles_id" id='roles_id' class="form-control" >
	    @foreach($info as $v)
			<option value="{{ $v->roles_id }}" 
			@if($res['roles_id']==$v->roles_id)
			selected
			@endif
			 >{{ $v->roles_name }}</option>
		@endforeach
	    </select>
	  </div>

	  <button type="button" class="btn btn-default" id="tj">修改</button>
	</form>
	<script>

		$("#tj").click(function(){
			var data={};
			data.admin_id=$("#admin_id").attr("admin_id");
			data.roles_id=$("#roles_id").val();
			// alert(data.roles_id);return;
			$.ajax({
		        url:"/admin/relevances/RelevanUpdate_do",
		        type:'post',
		        data:data,
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