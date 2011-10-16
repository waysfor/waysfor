<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>后台管理登录页</title>
<link rel="stylesheet" href="/www/admin/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="/www/js/jquery.js" type="text/javascript"></script>
<!-- Custom jquery scripts -->
<script src="/www/admin/js/custom_jquery.js" type="text/javascript"></script>
<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="/www/admin/js/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).pngFix( );
});
</script>
</head>
<body id="login-bg">
<!-- Start: login-holder -->
<div id="login-holder">
	<!-- start logo -->
	<div id="logo-login">
		<a href="index.html"><img src="/www/admin/images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	<div class="clear"></div>
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	<!--  start login-inner -->
	<div id="login-inner">
		<form action="/admin/login" method="post">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>用户名</th>
			<td><input type="text" id="username" name="username" class="login-inp" /></td>
		</tr>
		<tr>
			<th>用户密码</th>
			<td><input type="password" id="password" name="password" value="************"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top">
				<!--
				<input type="checkbox" id="remain" name="remain" class="checkbox-size" id="login-check" />
				<label for="login-check">记住密码</label>
				-->
			</td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login" title="提交" /></td>
		</tr>
		</form>
		</table>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">忘记密码?</a>
 </div>
 <!--  end loginbox -->
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">请把您的邮箱发送给我们，稍后您的邮箱将收到我们的密码。</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>邮箱地址:</th>
			<td><input type="text" value="" class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login" title="发送" /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">返回登录页</a>
	</div>
	<!--  end forgotbox -->
</div>
<!-- End: login-holder -->
</body>
</html>