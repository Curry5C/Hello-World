﻿<?php
include_once 'Licence/checkLicence.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>酒店管理</title>
</head>
<frameset rows="80,*">
    <frame name="topFrame" scrolling="no" src="top.php"/>
    <frameset cols="200,*">
    	<frame name="leftFrame" scrolling="no" src="menu.php"/>
    	<frame name="mainFrame" src="init.php"/>
    </frameset>
    <noframes>
    <body>
    <p>This page uses frames. The current browser you are using does not support frames.</p>
    </body>
    </noframes>
</frameset>
</html>