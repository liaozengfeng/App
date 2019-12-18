@extends('layouts.layouts')
@section('title')
 GAO
 @endsection
 @section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>广告添加</title>
</head>
<body>
    <form id="form">
         <div class="form-group">
    <label for="exampleInputEmail1">广告名称</label>
    <input type="text" class="form-control" name="wide_title" id="wide_title" placeholder="广告名称">
  </div><br><br>



    <div class="form-group">
            <label for="exampleInputFile">图片</label>
            <input type="file"  name="wide_img" id="wide_img">

          </div><br><br>
 <!--                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">广告照片：</label>
                        <div class="col-sm-7">
                            <div class="file-input file-input-new">
                                <div class="input-group file-caption-main">

                                <div class="input-group-btn">
                                        <div tabindex="200" class="btn btn-primary btn-file">
                                            <input class="file uploadfile" type="file" multiple="" >
                                        </div>
                                    </div>

                                    <div  class="form-control file-caption  kv-fileinput-caption">
                                        <div class="file-caption-name" title=""></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 -->
   <div class="form-group">
    <div class="form-group">
        <label class="col-sm-2 control-label">广告内容：</label>
        <div class="col-sm-7">
            <textarea class="form-control" name="wide_content" id="wide_content"></textarea>
        </div><br><br><br><br><br><br>
    </div>




  <div class="form-group">
    <label for="exampleInputPassword1">广告商家</label>
    <input type="text" class="form-control" id="wide_name" name="wide_name" placeholder="拟:  拳打村霸企业">
  </div>


</div>
  <div class="checkbox">
  </div>
     <button type="button" class="btn">提交</button>
  </div>
    </form>

    <script>
    $('.btn').click(function(){//给点击按钮点击事件
      var form=new FormData($('#form')[0]);
      var wide_title=$("#wide_title").val();//获取用户名
      var wide_img=$("#wide_img").val();
      var wide_content=$("#wide_content").val();
      var wide_name=$("#wide_name").val();
      // alert(wide_content);return;
         if(wide_title==''){
          alert('标题不能为空');
          return false;
         }
         if(wide_content==''){
          alert('内容不能为空');
          return false;
         }
         if(wide_name==''){
          alert('商家不能为空');
          return false;
         }


    $.ajax({
        url:"/wides/wides_list",
        type:'post',
        data:form,
        processData: false,
        contentType: false,
        dataType:'json',
        success:function(res){

            if (res.err==1) {
                    alert(res.msg);
                    location.href="/wides/wides_line";
                }else{
                    alert(res.msg);
                }

            }


        },'json')



    })
</script>


</body>
</html>
@endsection