@extends('layouts.layouts')
@section('title')
    角色
@endsection
@section('content')
	<form id="form">
	  <div class="form-group">
	    <label for="exampleInputEmail1">权重地址:</label>
	    <input type="text" class="form-control" name="per_url" id="per_url" placeholder="请填写名称">
	  </div>
	  <button type="button" class="btn btn-default" id="tj">添加</button>
	</form>
	<script>

		$("#tj").click(function(){
			var form=$('#form').serialize();
			var per_url=$('#per_url').val();
		if (per_url=='') {
			alert('权重不能为空');
			return false;
		}


	$.ajax({
        url:"/admin/perms/PermsAdd_do",
        type:'post',
        data:form,
     	dataType:'json',
     	success:function(res){
     		
     		if (res.code==1) {
     			alert(res.font);
     			location.href="/admin/perms/PermsList";
     		}else{
     			alert(res.font);
     		}
     		
     		}

		},'json')

	})

	</script>

@endsection