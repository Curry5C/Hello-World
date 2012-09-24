<?php
/*$uri = $_SERVER ['REQUEST_URI'];
		echo $uri."<br/>";
$phpself =  $_SERVER ['PHP_SELF'] ;
		echo $phpself."<br/>";
echo($_SERVER ['QUERY_STRING']);
*/
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
		echo "	window.parent.frames.topFrame.location.reload();";
  	  	echo "   window.location='register.php';";
  	  	echo "</script>";
	}
}elseif($action == 'addFamily'){
	$arr['family_card'] = $_POST['family_card'];
	$arr['name'] = $_POST['name'];
	$arr['sex'] = $_POST['sex'];
	$arr['identify_card'] = $_POST['identify_card'];
	$arr['family_status'] = $_POST['family_status'];
	$arr['personal_count'] = $_POST['personal_count'];
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
	$family_card = $btm -> getCard($arr,1);
	$_SESSION['family_card'] = $family_card;
	$_SESSION['family_count'] = $btm ->getCard($arr,6);
	//echo $family_card;
	//$row1 = $btm -> update($family_card);
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
	$arr['price'] = $_POST['price'];
	$arr['day'] = $_POST['day'];
	$arr['time'] = $_POST['time'];
	$arr['worker'] = $_POST['worker'];
	$bool = $info -> insert($arr);
	$row1 = $btm -> update($arr['family_card']);
	if($bool){
		echo("您可以入住啦,如果您有什么需要,请尽快通知我们,我们会马上为您提供服务!");
	}else{
		echo("入住失败!");
	}
}elseif($action == 'change'){
	$identifier = $_POST['identifier'];
	$password1 = $_POST['password1'];
	$sql = "update hotel set password= '{$password1}' where identifier= '{$identifier}'";
	$row = $bm -> update($sql);
	if($row){
		echo("修改成功,<a href='hotelLogin.php'>返回登入页面！</a>");
	}
}elseif($action == 'refer'){
	$arr['identify_card'] = $_POST['identify_card'];
	$int = preg_match("/\d{17}[\d|X]|\d{15}/",$arr['identify_card'],$matchs);
	$identifier = $_SESSION['identifier'];
	if($identifier){
	if($int){
	$family_card = $btm -> getCard($arr,1);
	if($family_card){
	$sql1 = "select count(*) from info_family where family_card={$family_card} AND identifier='{$identifier}'";
	$_SESSION['count1'] = $info -> count($sql1);
	$sql2 = "select * from info_family where family_card={$family_card} AND identifier='{$identifier}'";
	$_SESSION['row1'] = $db -> fetchAll($sql2);
	$row2 = $info -> execute($sql2);
	if($row2){
		echo("<script type=\"text/javascript\">");
		echo "window.location='infoFamily.php';";
		echo("</script>");
	}else{
		echo "<script type='text/javascript'>";
  	  	echo "   alert('您的家庭在本酒店没有入住信息!');";
  	  	echo "   window.location='refer.php';";
  	  	echo "</script>";
	}
	}else{
		echo("<script type=\"text/javascript\">");
		echo "   alert('您的家庭在本酒店没有入住信息!');";
		echo "window.location='refer.php';";
		echo("</script>");
	}
	}else{
		echo "<script type='text/javascript'>";
  	  	echo "   alert('您输入的身份证号错误!');";
  	  	echo "   window.location='refer.php';";
  	  	echo "</script>";
	}
	}else{
		echo "<script type='text/javascript'>";
  	  	echo "   alert('请您先登入酒店!');";
  	  	echo "   window.location='refer.php';";
  	  	echo "</script>";
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
	}else{
		echo("<script type=\"text/javascript\">");
		echo "window.alert('此酒店暂时还没有人入住');";
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
  	  	echo "   window.location='../admin/index.php'";
  	  	echo "</script>";
	}else{
				echo "<script language='javascript'>
				      alert('你无权登录！');
				      window.location='../index.html';
				     </script>";
			}
}


?>
</body>
</html>







