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
<script type="text/javascript">
function check(){
var idObj = document.getElementById('identify_card');
if(idObj.value==""){
   alert("请输入身份证号码!");idObj.focus();return false;
}
if(!(idObj.value.length==15 || idObj.value.length==18)){
   alert("身份证号只能为15位或18位!");idObj.focus();return false;

}
}
</script>
</head>
<body>
<div id="container">
<h1 class="subject">入住查询</h1>
<form name="form1" id="form1" action="doAction.php?action=refer" method="post" onsubmit="return validateForm();">
<table cellpadding="0" cellspacing="0">
<tr>
<td width="100">身份证号:</td>
<td><input type="text" name="identify_card" id="identify_card" class="input"/>&nbsp;<span style="font-size:12px">*请正确填写身份证号</span></td>
</tr>
<td>&nbsp;</td>
<td><input type="image" src="../images/submit.gif" alt="" onclick="check();"/>&nbsp;<img src="../images/reset.gif" alt="" style="cursor:pointer;" onclick="resetForm('form1')"/></td>
</tr>
</table>
</form>
</div>
</body>
</html>