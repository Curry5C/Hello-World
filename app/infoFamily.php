<?php
include_once '../path.php';
session_start();
$count1 = $_SESSION['count1'];
$row1 = $_SESSION['row1'];
$a = 3-$count1;
if(!$a){
		echo "<script type='text/javascript'>";
  	  	echo "   alert('您的家庭在本酒店已入住了3次，您已经没有入住机会了，请您选择其它酒店入住！');";
  	  	echo "</script>";			
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<link type="text/css" rel="stylesheet" media="all" href="../styles/common.css" />
</head>
<body>
<div id="container">
<form name="form1" action="" method="post">
<table cellpadding="0" cellspacing="0">
<tr>
<td colspan="10" class="subject">家庭成员入住情况</td>
</tr>
<tr>
	<td>编号</td>
	<td>姓名</td>
	<td>家庭编号</td>
	<td>酒店编号</td>
	<td>入住房间</td>
	<td>房间价格</td>
	<td>入住天数</td>
	<td>入住时间</td>
	<td>工作人员</td>
	<td>操作</td>
</tr>
<?php
foreach($row1 as $row) {?>
<tr>
<td><?php echo($row['id'])?></td>
<td><?php echo($row['name'])?></td>
<td><?php echo($row['family_card'])?></td>
<td><?php echo($row['identifier'])?></td>
<td><?php echo($row['room'])?></td>
<td><?php echo($row['price'])?></td>
<td><?php echo($row['day'])?></td>
<td><?php echo($row['time'])?></td>
<td><?php echo($row['worker'])?></td>
<td><a href="register.php">入住登记</a></td>
</tr>
<?php }?>
<tr>
<td colspan="10">
<?php echo("注:您的家庭在本酒店已入住{$count1}次,您还有{$a}次入住机会!")?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>