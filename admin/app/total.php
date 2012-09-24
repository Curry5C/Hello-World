<?php
include_once '../path.php';
error_reporting(E_ALL ^ E_NOTICE);
$sql = "select count(*) from info_family";
$count = $info -> count($sql);
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
<td colspan="10" class="subject">总入住情况</td>
</tr>
<tr>
	<td>编号</td>
	<td>集团编号</td>
	<td>酒店编号</td>
	<td>姓名</td>
	<td>家庭编号</td>
	<td>入住房间</td>
	<td>房间价格</td>
	<td>入住天数</td>
	<td>入住时间</td>
	<td>工作人员</td>
</tr>
<?php 
if($info -> fetchAll()){
foreach($info -> fetchAll() as $row) {?>
<tr>
<td><?php echo($row['id'])?></td>
<td><?php echo($row['h_id'])?></td>
<td><?php echo($row['identifier'])?></td>
<td><?php echo($row['name'])?></td>
<td><?php echo($row['family_card'])?></td>
<td><?php echo($row['room'])?></td>
<td><?php echo($row['price'])?></td>
<td><?php echo($row['day'])?></td>
<td><?php echo($row['time'])?></td>
<td><?php echo($row['worker'])?></td>
</tr>
<?php }
}else{?>
<tr>
<td colspan="10">还没有人入住哦！</td>
</tr>
<?php }?>
<tr>
<td colspan="10"><?php echo("注:已有{$count}个人入住酒店!");?></td>
</tr>
</table>
</form>
</div>
</body>
</html>