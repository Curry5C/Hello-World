<?php
	session_start();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<link type="text/css" rel="stylesheet" media="all" href="styles/common.css" />
<style type="text/css">
body{background:#094979;}
</style>
</head>
<body>
<h1 style="font-size:30px;line-height:80px;color:white;padding-left:30px;">幸福驿站后台管理系统--V1.0<span style="padding-left:500px;">您好<?php echo($_SESSION['username'])?>,欢迎登入后台管理系统!<a href="../index.html" target=_blank style="font-size:15px;line-height:80px;color:white;padding-left:30px;">登入前台</a></span></h1>
</body>
</html>