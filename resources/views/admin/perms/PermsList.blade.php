@extends('layouts.layouts')
@section('title')
    角色
@endsection
@section('content')

<table class="table table-bordered">
   <tr>
		<td>编辑</td>
		<td>权重地址</td>
		<td>操作</td>
   </tr>
	@foreach($re as $v)

	 <tr>
		<td>{{ $v->per_id }}</td>
		<td>{{ $v->per_url }}</td>

		<td><a href="{{url('/admin/perms/PermsDel')}}?per_id={{ $v->per_id }}" id="del">删除</a>
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
{{ $re->links() }}
@endsection