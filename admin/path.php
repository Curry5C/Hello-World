<?php
define("ROOT",dirname(__FILE__));

set_include_path('.' . PATH_SEPARATOR . ROOT . "/classes" . PATH_SEPARATOR . get_include_path());

include_once 'Db.php';

include_once 'HotelModel.php';

include_once 'FamilyModel.php';

include_once 'InfoFamilyModel.php';

include_once 'AdminModel.php';

$config = array(
 
 'dbhost' => 'localhost',
 'dbuser' => 'root',
 'dbpwd'  => '123456',
 'dbname' => 'lovehotel'

);

$db = Db::getInstance($config);

$bm  = new HotelModel($db);

$btm = new FamilyModel($db);

$info = new InfoFamilyModel($db);

$ad = new AdminModel($db);








