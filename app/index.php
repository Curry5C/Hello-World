<?php
include_once '../path.php';
session_start();
$name = $_SESSION['name'];
$sex = $_SESSION['sex'];
$identifier = $_SESSION['identifier'];
$family_card = $_SESSION['family_card'];
//$family_card = $_SESSION['family_card'];
//$identifier = $_SESSION['identifier'];
$sql1 = "select count(*) from info_family where family_card={$family_card} AND identifier='{$identifier}'";
$_SESSION['count2'] = $info -> count($sql1);
$count2 = $_SESSION['count2'];
$a = 3-$count2;
if(!$a){
		echo "<script type='text/javascript'>";
  	  	echo "   alert('您的家庭在本酒店已入住了3次，您已经没有入住机会了，请您选择其它酒店入住！');";
  	  	echo "</script>";			
}
$family_count = $_SESSION['family_count'];
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
<h1 class="subject" style="font-size:18px;">尊敬的 <?php echo $name;?><?php echo($sex == 1? "女士":"先生");?>,欢迎入住本酒店,您的家庭在本酒店还有<?php echo $a?>次入住的机会，全年您的家庭还有<?php echo $family_count?>次入住所有酒店的机会，如果您有什么需要，我们将竭尽为您服务！</h1>
<form name="form1" id="form1" action="doAction.php?action=list" method="post" onsubmit="return validateForm();">
<table cellpadding="0" cellspacing="0">
<tr>
<td width="100">姓名:</td>
<td><input type="text" name="name" id="name" value="<?php echo($name);?>" class="input" onmouseover=this.focus();this.select(); onclick="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"/></td>
</tr>
<tr>
<td>家庭编号:</td>
<td>
<input type="text" name="family_card" id="family_card" value="<?php echo($family_card);?>" class="input" onmouseover=this.focus();this.select(); onclick="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"/>
</td>
</tr>
<tr>
<td>入住房间:</td>
<td><input type="text" name="room" id="room" class="input" value=""/></td>
</tr>
<tr>
<td>房间价格:</td>
<td><input type="text" name="price" id="price" class="input" value=""/></td>
</tr>
<tr>
<td>入住天数:</td>
<td>
<input type="text" name="day" id="day" class="input" value=""/>
</td>
</tr>
<tr>
<td>酒店编号:</td>
<td><input type="text" name="identifier" id="identifier" class="input" value="<?php echo($identifier);?>" onmouseover=this.focus();this.select(); onclick="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}"/></td>
</tr>
<tr>
<td>入住时间:</td>
<td>
<input type="text" name="time" id="time" value="<?php echo date("Y-m-d");?>"class="input" />
</td>
</tr>
<tr>
<td>工作人员:</td>
<td><input type="text" name="worker" id="worker"  class="input"/></td>
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