<?php 
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	$username = $_SESSION['username'];
	if($username == null)
	{
		echo "<script language='javascript'>
		alert('权限不够！');
		window.location='../index.html';
		</script>";
	}

?>