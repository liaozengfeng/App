@extends('layouts.layouts')
@section('title')
    分类
@endsection
@section('content')
	<form id="form">
	  <div class="form-group">
	    <label for="exampleInputEmail1">分类名称:</label>
	    <input type="text" class="form-control" name="sort_name" id="sort_name" placeholder="请填写名称">
	  </div>
	<div class="form-group">
	    <label for="exampleInputEmail1">无限分类:</label>
	    <select name="parent_id" id="parent_id" class="form-control">
			<option value="">请选择..</option>
			<option value="0">顶级分类</option>
			@foreach($sortData as $v)
				<option value="{{ $v->sort_id }}">{{str_repeat("==",$v->level).$v->sort_name }}</option>
			@endforeach
	    </select>
	  </div>

	 <div class="input-radio">
 		<label for="exampleInputEmail1" >是否显示:</label><br>
	  <input class="is_show" type="radio" name="is_show" value="1" checked />
	  <label for="city1">是</label>
	   <input class="is_show" type="radio" name="is_show" value="0" />
	   <label for="city1">否</label> 	
	</div>
	  <button type="button" class="btn btn-default" id="tj">添加</button>
	</form>
	<script>

		$("#tj").click(function(){
			var form=$('#form').serialize();
			var sort_name=$('#sort_name').val();
			var parent_id=$('#parent_id').val();
		if (sort_name=='') {
			alert('分类名不能为空');
			return false;
		}

		if (parent_id=='') {
			alert('无限分类不能为空');
			return false;
		}

	$.ajax({
        url:"/admin/sort/SortAdd_do",
        type:'post',
        data:form,
     	dataType:'json',
     	success:function(res){
     		
     		if (res.code==1) {
     			alert(res.font);
     			location.href="/admin/sort/SortList";
     		}else{
     			alert(res.font);
     		}
     		
     		}

		},'json')

	})

	</script>

@endsection