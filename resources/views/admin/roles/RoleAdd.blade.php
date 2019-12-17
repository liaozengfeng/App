@extends('layouts.layouts')
@section('title')
    角色
@endsection
@section('content')
	<form id="form">
	  <div class="form-group">
	    <label for="exampleInputEmail1">角色名称:</label>
	    <input type="text" class="form-control" name="roles_name" id="roles_name" placeholder="请填写名称">
	  </div>
	  <button type="button" class="btn btn-default" id="tj">添加</button>
	</form>
	<script>

		$("#tj").click(function(){
			var form=$('#form').serialize();
			var roles_name=$('#roles_name').val();
		if (roles_name=='') {
			alert('分类名不能为空');
			return false;
		}


	$.ajax({
        url:"/admin/roles/RoleAdd_do",
        type:'post',
        data:form,
     	dataType:'json',
     	success:function(res){
     		
     		if (res.code==1) {
     			alert(res.font);
     			location.href="/admin/roles/RoleList";
     		}else{
     			alert(res.font);
     		}
     		
     		}

		},'json')

	})

	</script>

@endsection