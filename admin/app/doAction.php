<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once '../path.php';
$action = $_GET['action'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
</head>
<body>
<?php 
session_start();
if($action == 'addHotel'){
	$arr['h_name'] = $_POST['h_name'];
	$arr['identifier'] = $_POST['identifier'];
	$arr['h_id'] = $_POST['h_id'];
	$arr['address'] = $_POST['address'];
	$arr['password'] = $_POST['password'];
	$bool = $bm -> insert($arr);
	if($bool){
		echo("酒店添加成功,您可以查看<a href=\"hotelList.php\">酒店列表</a>");
	} else {
		echo("酒店添加失败,请重新<a href=\"addHotel.php\">添加</a>");
	}
}elseif($action == 'hotelLogin'){
	$arr['identifier'] = $_POST['identifier'];
	$_SESSION['identifier'] = $arr['identifier'];
	$arr['password'] = $_POST['password'];
	$row = $bm -> checkLogin($arr);
	$_SESSION['h_name'] = $bm -> getCard($arr,2); 
	$_SESSION['h_id'] = $bm -> getCard($arr,1);
	//echo $row;
	if($row>0){
		
		echo "<script type='text/javascript'>";
  	  	echo "   alert('登入成功！');";
  	  	echo "   window.location='register.php';";
  	  	echo "</script>";
	}
}elseif($action == 'addFamily'){
	$arr['family_card'] = $_POST['family_card'];
	$arr['name'] = $_POST['name'];
	$arr['sex'] = $_POST['sex'];
	$arr['identify_card'] = $_POST['identify_card'];
	$arr['family_status'] = $_POST['family_status'];
	$arr['family_count'] = $_POST['family_count'];
	$bool = $btm -> insert($arr);
	if($bool){
		if($bool){
		echo("家庭添加成功,您可以查看<a href=\"listFamily.php\">家庭列表</a>");
		} else {
		echo("家庭添加失败,请重新<a href=\"addFamily.php\">添加</a>");
		}
	}
}elseif($action == 'register'){
	$arr['identify_card'] = $_POST['identify_card'];
	$arr['name'] = $_POST['name'];
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['sex'] = $_POST['sex'];
	$row = $btm -> checkRegister($arr);
	if($row>0){
	$family_card = $btm -> getCard($arr);
	$_SESSION['family_card'] = $family_card;
	//echo $family_card;
	$row1 = $btm -> update($family_card);
	//echo $row1;
	
		
		echo "<script type='text/javascript'>";
  	  	echo "   alert('登入成功！');";
  	  	echo "   window.location='index.php';";
  	  	echo "</script>";
		}
}elseif($action == 'list'){
	$arr['name'] = $_POST['name'];
	$arr['family_card'] = $_POST['family_card'];
	$arr['identifier'] = $_POST['identifier'];
	$arr['h_id'] = $_SESSION['h_id'];
	$arr['room'] = $_POST['room'];
	$arr['day'] = $_POST['day'];
	$arr['time'] = $_POST['time'];
	$arr['worker'] = $_POST['worker'];
	$bool = $info -> insert($arr);
	if($bool){
		echo("您可以入住啦,如果您有什么需要,请尽快通知我们,我们会马上为您提供服务!");
	}else{
		echo("入住失败!");
	}
}elseif($action == 'change'){
	$username = $_SESSION['username'];
	$password1 = $_POST['password1'];
	$sql = "update administrator set password= '{$password1}' where username= '{$username}'";
	$row = $ad -> update($sql);
	if($row){
		echo "<script type='text/javascript'>";
  	  	echo "   alert('修改成功！');";
  	  	echo "   window.location='../init.php';";
  	  	echo "</script>";
		
	}
}elseif($action == 'refer'){
	$family_card = $_POST['family_card'];
	$sql1 = "select count(*) from info_family where family_card='{$family_card}'";
	$_SESSION['count1'] = $info -> count($sql1);
	$sql2 = "select * from info_family where family_card={$family_card}";
	$_SESSION['row1'] = $db -> fetchAll($sql2);
	$row2 = $info -> execute($sql2);
	if($row2){
		echo("<script type=\"text/javascript\">");
		echo "window.location='infoFamily.php';";
		echo("</script>");
	}
}elseif($action == 'statistics'){
	$identifier = $_POST['identifier'];
	$sql1 = "select count(*) from info_family where identifier='{$identifier}'";
	$_SESSION['count'] = $info -> count($sql1);
	$sql2 = "select * from info_family where identifier='{$identifier}'";
	$_SESSION['row1'] = $db -> fetchAll($sql2);
	$row2 = $info -> execute($sql2);
	if($row2){
		echo("<script type=\"text/javascript\">");
		echo "window.location='infoHotel.php';";
		echo("</script>");
	}
}elseif($action == 'admin'){
	$arr['username'] = $_POST['username'];
	$_SESSION['username'] = $arr['username'];
	$arr['password'] = $_POST['password'];
	$row = $ad -> checkLogin($arr);
	if($row>0){
		
		echo "<script type='text/javascript'>";
  	  	echo "   alert('登入成功！');";
  	  	echo "   window.location='../admin/index.html'";
  	  	echo "</script>";
	}else{
				echo "<script language='javascript'>
				      alert('你无权登录！');
				      window.location='../index.html';
				     </script>";
			}
}elseif($action == 'total'){
	$h_id = $_POST['h_id'];
	$sql1 = "select count(*) from info_family where h_id='{$h_id}'";
	$_SESSION['count'] = $info -> count($sql1);
	$sql2 = "select * from info_family where h_id='{$h_id}'";
	$_SESSION['row1'] = $db -> fetchAll($sql2);
	$row2 = $info -> execute($sql2);
	if($row2){
		echo("<script type=\"text/javascript\">");
		echo "window.location='infoTotal.php';";
		echo("</script>");
	}
}elseif($action == 'delete_family'){
	$family = $_POST['family'];
	if(is_array($family)){
		foreach($family as $val){
			$row1 = $btm -> delete($val);
			
		
		if($row1){
			echo("<script type=\"text/javascript\">");
			echo "window.location='listFamily.php';";
			echo("</script>");
		}
	}

}
}elseif($action == 'delete_hotel'){
	$hotel = $_POST['hotel'];
	if(is_array($hotel)){
		foreach($hotel as $val){
			$row2 = $bm -> delete($val);
			
		
		if($row2){
			echo("<script type=\"text/javascript\">");
			echo "window.location='hotelList.php';";
			echo("</script>");
		}
	}

}
}elseif($action == 'addUser'){
	$arr['username'] = $_POST['username'];
	$arr['password'] = $_POST['password'];
	$row = $ad -> insert($arr);
	if($row){
			echo("<script type=\"text/javascript\">");
			echo "window.alert('添加成功');";
			echo "window.location='../init.php';";
			echo("</script>");
	}
}

?>
</body>
</html>







