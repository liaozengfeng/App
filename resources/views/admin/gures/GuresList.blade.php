@extends('layouts.layouts')
@section('title')
    轮播图
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>编辑</td>
		<td>轮播图图片</td>
		<td>操作</td>
		
   </tr>
	@foreach($res as $v)

	 <tr>
		<td>{{ $v->gure_id }}</td>
		<td><img src="{{ '/storage/'.$v->gure_img }}" style="max-width: 100px;"></td>

		<td><a href="{{url('/admin/gures/GureDel')}}?gure_id={{ $v->gure_id }}" id="del" >删除</a>
		</td>
   </tr>
	@endforeach

</table>
<script>
	$(document).on('click','#del',function(){
		event.preventDefault();
		var url=$(this).attr('href');
		$.ajax({
			url:url,
			success:function(res){
				if (res==1) {
					alert("删除成功");
				}else{
					alert("删除失败");
				}
			}
		});

		$(this).parent().parent().remove();
	})

</script>
{{ $res->links() }}
@endsection