@extends('layouts.layouts')
@section('title')
    品牌
@endsection
@section('content')
	<form id="form">
	<input type="hidden" name="brand_id" value="{{ $info->brand_id }}">
	  <div class="form-group">
	    <label for="exampleInputEmail1">品牌名称:</label>
	    <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="请填写名称" value="{{ $info->brand_name }}">
	  </div>

	    <div class="form-group">
	    <label for="exampleInputEmail1">品牌官网:</label>
	    <input type="text" class="form-control" name="brand_url" id="brand_url" placeholder="请填写名称" value="{{ $info->brand_url }}">
	  </div>

	  <div class="form-group">
	    <label for="exampleInputEmail1">品牌图片:</label>
	    <input type="file" name="brand_img" value="{{ $info->brand_img }}">
	  </div>

	 <div class="input-radio">
 		<label for="exampleInputEmail1" >是否上架:</label><br>
	  <input class="is_show" type="radio" {{$info['is_show']==1?"checked":''}} name="is_show" value="1" checked />
	  <label for="city1">是</label>
	   <input class="is_show" type="radio" {{$info['is_show']==2?"checked":''}} name="is_show" value="0" />
	   <label for="city1">否</label> 	
	</div>
	  <button type="button" class="btn btn-default" id="tj">修改</button>
	</form>
	<script>

		$("#tj").click(function(){
			var form=new FormData($('#form')[0]);
			var brand_name=$('#brand_name').val();
			var brand_url=$('#brand_url').val();
		if (brand_name=='') {
			alert('品牌名称不能为空');
			return false;
		}

		if (brand_url=='') {
			alert('品牌官网不能为空');
			return false;
		}

	$.ajax({
        url:"/admin/brands/BrandUpdate_do",
        type:'post',
        data:form,
        processData: false, 
     	contentType: false,
     	dataType:'json',
     	success:function(res){
     		
     		if (res.code==1) {
	     			alert(res.font);
	     			location.href="/admin/brands/BrandList";
	     		}else{
	     			alert(res.font);
	     		}
     		
     		}

		},'json')

	})

	</script>

@endsection