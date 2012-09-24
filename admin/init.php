<?php include_once 'path.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<link type="text/css" rel="stylesheet" media="all" href="styles/common.css" />
</head>
<body>
<div id="container">
<table cellpadding="0" cellspacing="0">
<tr>
<td width="100">操作系统:</td>
<td><?php echo(PHP_OS)?></td>
</tr>
<tr>
<td>PHP版本:</td>
<td><?php echo(PHP_VERSION)?></td>
</tr>
<tr>
<td>PHP运行方式:</td>
<td><?php echo(PHP_SAPI)?></td>
</tr>
<tr>
<td>MySQL版本:</td>
<td><?php echo($db -> getServerInfo())?></td>
</tr>
<tr>
<td>GD版本:</td>
<td><?php print_r(gd_info())?></td>
</tr>

</table>
</div>
</body>
</html>