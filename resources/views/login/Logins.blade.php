<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>私人宠物</title>
<link href="{{asset('logs/css/login.css')}}" rel="stylesheet" rev="stylesheet" src="{{asset('logs/text/css')}}" media="all" />
<script type="text/javascript" src="{{asset('logs/js/jQuery1.7.js')}}"></script>
<script type="text/javascript" src="{{asset('logs/js/jquery-1.8.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('logs/js/jquery1.42.min.js')}}"></script>
<script type="text/javascript" src="{{asset('logs/js/jquery.SuperSlide.js')}}"></script>
<script type="text/javascript" src="{{asset('logs/js/Validform_v5.3.2_min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
	var $tab_li = $('#tab ul li');
	$tab_li.hover(function(){
		$(this).addClass('selected').siblings().removeClass('selected');
		var index = $tab_li.index(this);
		$('div.tab_box > div').eq(index).show().siblings().hide();
	});
});
</script>




<script type="text/javascript">
$(function(){
/*登录信息验证*/
$("#sec_username_hide").focus(function(){
 var username = $(this).val();
 if(username=='~请输入账号哦~'){
 $(this).val('');
 }
});
$("#sec_username_hide").focusout(function(){
 var username = $(this).val();
 if(username==''){
 $(this).val('~请输入账号哦~');
 }
});
$("#sec_password_hide").focus(function(){
 var username = $(this).val();
 if(username=='~请输入密码哦~'){
 $(this).val('');
 }
});
$("#sec_password_hide").focusout(function(){
 var username = $(this).val();
 if(username==''){
 $(this).val('~输入密码哦~');
 }
});


});
</script>



</head>

<body>
<div id="tab">
  <ul class="tab_menu">
    <li class="selected">点击~登录</li>

  </ul>
  <div class="tab_box">

     <!--登录开始-->
    <div class="hide">
    <div class="sec_error_box"></div>

      <a href="/login/Reg">点击注册</a><br />
       	用户名:<input type="text" name="admin_name" id="admin_name"><br>	
		    密码:<input type="password" name="admin_pwd" id="admin_pwd"><br>
		    <input type="button" value="登陆" id="loginse"><br>
      </form>
    </div>
     <!-- 教务登录结束-->
  </div>
</div>

<div class="screenbg">
  <ul>
    <li><a href="javascript:;"><img src="{{asset('logs/images/0.jpg')}}"></a></li>
    <li><a href="javascript:;"><img src="{{asset('logs/images/1.jpg')}}"></a></li>
    <li><a href="javascript:;"><img src="{{asset('logs/images/2.jpg')}}"></a></li>
  </ul>
</div>
</body>
</html>
<script type="text/javascript" src="{{asset('logs/js/jquery.min.js')}}"></script>
<script>
$('#loginse').click(function(){
		var admin_name=$('#admin_name').val();
		var admin_pwd=$('#admin_pwd').val();
		$.ajax({
        	url:"Logins_do",
        	type:'post',
        	data:{admin_name:admin_name,admin_pwd:admin_pwd},
        	dataType:'json',
        	async:true,
        	success:function(res){
        		if (res.msg==3) {
        			alert(res.find);
        			location.href="/layouts/layouts";
        		}else{
        			alert(res.find);
        		}
        	}

		},'json');

	})

</script>


