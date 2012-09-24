<?php
	session_start();
	if($_SESSION['identifier']){
		unset($_SESSION['identifier']);
		echo "<script type='text/javascript'>";
  	  	echo "   alert('注销成功！');";
		echo "	window.parent.frames.topFrame.location.reload();";
  	  	echo "   window.location='hotelLogin.php';";
  	  	echo "</script>";
	}
	
?>