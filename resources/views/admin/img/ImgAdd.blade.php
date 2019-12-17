@extends('layouts.layouts')
@section('title')
   商品图片
@endsection
@section('content')
	<form id="form">
	 
	  <div class="form-group">
	    <label for="exampleInputEmail1">商品详情图片:</label>
	    <input type="file" name="goodss_img">
	  </div>
		
	 <div class="form-group">
	    <label for="exampleInputEmail1">商品名称:</label>
	    <select name="goods_id"  class="form-control">
			<option value="">请选择..</option>
			@foreach($info as $v)
			<option value="{{ $v->goods_id }}">{{ $v->goods_name }}</option>
			@endforeach
	    </select>
	  </div>

	  <button type="button" class="btn btn-default" id="tj">添加</button>
	</form>
	<script>

		$("#tj").click(function(){
			var form=new FormData($('#form')[0]);

	$.ajax({
        url:"/admin/img/ImgAdd_do",
        type:'post',
        data:form,
        processData: false, 
     	contentType: false,
     	dataType:'json',
     	success:function(res){
     		
     		if (res.code==1) {
	     			alert(res.font);
	     			location.href="/admin/img/ImgList";
	     		}else{
	     			alert(res.font);
	     		}
     		
     		}

		},'json')

	})

	</script>

@endsection