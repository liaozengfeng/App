@extends('layouts.layouts')
@section('title')
 chuang
 @endsection
 @section('content')


<html lang="en">
<head >
    <meta charset="UTF-8">
    <title>用户列表</title>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet">
</head>
<body>


                                <table class="table table-striped">
                                    <h1>管理员列表</h1>
                                 <tr>
                                  <td>id</td>
                                  <td>广告名称</td>
                                  <td>广告照片</td>
                                  <td>广告商家</td>

                                  <td>操作</td>

                                 </tr>
                                 @foreach($res as $v)
                                 <tr>
                                  <td>{{$v->wide_id}}</td>
                                  <td>{{$v->wide_title}}</td>
                                  <td><img src="{{ '/storage/'.$v->wide_img }}" style="max-width: 100px;"></td>
                                  <td>{{$v->wide_name}}</td>
                                    <td>
                                        <a href="{{ url('/admin/wides/wides_delete') }}?wide_id={{ $v->wide_id }}"  class="layui-btn layui-btn-normal" id="del">删除</a>
                                  </td>
                                 </tr>
                                 @endforeach
                                </table>




</body>
</html>

   <script>
         $(document).on('click','#del',function(){
                event.preventDefault();
                 var url=$(this).attr('href');
                  $.ajax({
                      url:url,
                      success:function(res){
                      if (res==1) {
                             alert('删除成功');
                              }else{
                                alert('删除失败');
                                    }
                                }
                            })

                  $(this).parent().parent().remove();

                          })
                        </script>

 @endsection