<?php 
include_once('../path.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<link type="text/css" rel="stylesheet" media="all" href="../styles/common.css" />
<script type="text/javascript" src="../scripts/common.js"></script>
</head>
<body>
<div id="container">
<h1 class="subject">添加家庭</h1>
<form name="form1" id="form1" action="doAction.php?action=addFamily" method="post" onsubmit="return validateForm();">
<table cellpadding="0" cellspacing="0">
<tr>
<td width="100">家庭编号:</td>
<td><input type="text" name="family_card" id="family_card" class="input"/></td>
</tr>
<tr>
<td>姓名:</td>
<td><input type="text" name="name" id="name" class="input"/></td>
</tr>
<tr>
<td>性别:</td>
<td>
<input type="radio" name="sex" id="sex" value="0" checked="checked" />男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="sex" id="sex" value="1" />女
</td>
</tr>
<tr>
<td>身份证号码:</td>
<td><input type="text" name="identify_card" id="identify_card"  class="input"/></td>
</tr>
<tr>
<td>家庭地位:</td>
<td><input type="text" name="family_status" id="family_status" class="input"/></td>
</tr>
<tr>
<td>家庭次数:</td>
<td><input type="text" name="family_count" id="family_count" class="input" value="50"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="image" src="../images/submit.gif" alt=""/>&nbsp;<img src="../images/reset.gif" alt="" style="cursor:pointer;" onclick="resetForm('form1')"/></td>
</tr>
</table>
</form>
</div>
</body>
</html>