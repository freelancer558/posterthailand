<?

//หากมีการเรียกไฟล์นี้โดยตรง
if (eregi("core.php",$PHP_SELF)) {
    Header("Location: index.php");
    die();
}

//ตรวจสอบว่ามีโมดูลหรือไม่ (โมดูล User)
function GETMODULE($name,$file){
	global $MODPATH, $MODPATHFILE ;
	if(!$name){$name = "index";}
	if(!$file){$file = "index";}
$modpathfile="modules/".$name."/".$file.".php";
if (file_exists($modpathfile)) {
	$MODPATHFILE = $modpathfile;
	$MODPATH = "modules/".$name."/";
	}else{
	die ("เสียใจด้วยครับ ไม่มีหน้าที่ท่านต้องการเข้าชม...<br>	รอสักครู่ ระบบจะนำท่านกลับไปยังหน้าหลัก...<br> <meta http-equiv='refresh' content='3;url=../index.php'>");//404
	}
}

require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/array.in.php");
require_once("includes/class.ban.php");
require_once("includes/function.in.php");

$db = New DB();

?>