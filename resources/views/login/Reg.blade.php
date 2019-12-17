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

</head>

<body>
<div id="tab">
  <ul class="tab_menu">
    <li class="selected">主人~求摸摸</li>

  </ul>
  <div class="tab_box">

     <!--登录开始-->
    <div class="hide">
    <div class="sec_error_box"></div>
     	<form id="form">
     	<a href="/login/Logins">已有账号登陆</a><br />
			用户名:<input type="text" name="admin_name" id="admin_name" /><br />
			密码:<input type="password" name="admin_pwd" id="admin_pwd" /><br />
			确认密码:<input type="password" name="admin_pwd_do" id="admin_pwd_do" /><br />
			<input type="button" value="注册" id="red">

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
$('#admin_name').blur(function(){
			var admin_name = $(this).val();
			$.ajax({
				url:"Weiyi",
	       		type:'post',
	       		data:{admin_name:admin_name},
	       		dataType:'json',
	       		async:true,
	       		success:function(res){
	       			if (res.error==1) {
	       				alert(res.msg);
	       				return $('#red').prop('disabled',true);
	       			}else{
	       				alert(res.msg);
	       				return $('#red').prop('disabled',false);
	       			}
	       		}
			});
		});
	$('#red').click(function(){
		var form=$('#form').serialize();
		var admin_name=$('#admin_name').val();
		var admin_pwd=$('#admin_pwd').val();
		var admin_pwd_do=$('#admin_pwd_do').val();
		if (admin_name=='') {
			alert('用户名不能为空');
			return false;
		}

		if (admin_pwd=='') {
			alert('密码不能为空');
			return false;
		}

		if (admin_pwd_do=='') {
			alert('确认密码不能为空');
			return false;
		}

		if (admin_pwd!=admin_pwd_do) {
			alert('密码与确认密码不一致');
			return false;
		}
		

		$.ajax({
       		url:'Reg_do',
       		type:'post',
       		data:form,
       		dataType:'json',
       		async:true,
       		success:function(res){
       			if (res.error==1) {
       				alert(res.msg);
       				location.href="/login/Logins";
       			}else{
       				return alert(res.msg);
       			}
       		}

		},'json');



	})

</script>

