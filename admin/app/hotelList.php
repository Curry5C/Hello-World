<?php
include_once '../path.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<link type="text/css" rel="stylesheet" media="all" href="../styles/common.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

function getCheckedNum(){
	var count = 0;
	$(":checkbox[name=hotel\\[\\]]").each(function(){
		if($(this).attr("checked")){
			count++;
		}
	});
	return count;
}

function changeButtonStatus(){
	/*
	if(getCheckedNum()){
		$(":button").attr("disabled",false);
	} else {
		$(":button").attr("disabled",true);
	}*/
	$(":submit").attr("disabled",!getCheckedNum());	
	
}


$(function(){
	$("#ctl").click(function(){		
		$(":checkbox[name=hotel\\[\\]]").attr("checked",$(this).attr("checked"));
		changeButtonStatus();
	});
	$(":checkbox[name=hotel\\[\\]]").click(function(){
		/*
		if($(":checkbox[name=hotel\\[\\]]").length == getCheckedNum()){
			//alert("aaa");
			$("#ctl").attr("checked",true);
		} else {
			$("#ctl").attr("checked",false);
		}
	*/		
		//var count = getCheckedNum();
		//alert(count);
		$("#ctl").attr("checked",$(":checkbox[name=hotel\\[\\]]").length == getCheckedNum());
		changeButtonStatus();
	});
})
</script>
</head>
<body>
<div id="container">
<form name="form1" action="doAction.php?action=delete_hotel" method="post">
<table cellpadding="0" cellspacing="0">
<tr>
<td colspan="5"><input type="submit" name="" value="彻底删除" disabled="disabled"/></td>
</tr>
<tr>
    <td><input type="checkbox" id="ctl" value="1"/></td>
	<td width="100">集团编号</td>
	<td>编号</td>
	<td>名称</td>
	<td>地址</td>
</tr>
<?php 
if($bm -> fetchAll()){
foreach($bm -> fetchAll() as $row) {?>
<tr>
<td><input type="checkbox" name="hotel[]" id="ct2" value="<?php echo($row['id'])?>"/></td>
<td><?php echo($row['h_id'])?></td>
<td><?php echo($row['identifier'])?></td>
<td><?php echo($row['h_name'])?></td>
<td><?php echo($row['address'])?></td>
</tr>
<?php }
}else{?>
<tr>
<td colspan="5">还没有添加酒店哦！</td>
</tr>
<?php
}
?>
</table>
</form>
</div>
</body>
</html>