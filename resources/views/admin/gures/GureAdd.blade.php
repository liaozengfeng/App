@extends('layouts.layouts')
@section('title')
   轮播图
@endsection
@section('content')
	<form id="form">
	 
	  <div class="form-group">
	    <label for="exampleInputEmail1">轮播图图片:</label>
	    <input type="file" name="gure_img">
	  </div>

	  <button type="button" class="btn btn-default" id="tj">添加</button>
	</form>
	<script>

		$("#tj").click(function(){
			var form=new FormData($('#form')[0]);

	$.ajax({
        url:"/admin/gures/GureAdd_do",
        type:'post',
        data:form,
        processData: false, 
     	contentType: false,
     	dataType:'json',
     	success:function(res){
     		
     		if (res.code==1) {
	     			alert(res.font);
	     			location.href="/admin/gures/GureList";
	     		}else{
	     			alert(res.font);
	     		}
     		
     		}

		},'json')

	})

	</script>

@endsection