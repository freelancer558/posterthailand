<?
//หากมีการเรียกไฟล์นี้โดยตรง
if (eregi("config.in.php",$PHP_SELF)) {
    Header("Location: ../index.php");
    die();
}

// Version
define("_SCRIPT","PosterThailand"); 
define("_VERSION","Beta"); 

//Web Config
define("WEB_TITLE"," "._SCRIPT."  Version "._VERSION." "); 
define("WEB_URL","http://localhost/posterthailand") ; 
define("WEB_EMAIL","admin@posterthailand.com") ; 
define("TIMESTAMP",time()) ;

//Capcha ตัวหนังสือยืนยันการโพสข้อความ
define("USE_CAPCHA", true); //ใช้การป้องกันการโพสสแปม   true , false
define("CAPCHA_TYPE","1"); //รูปแบบของตัวอักษร 1 = แบบสวยงาม , 2 = แบบธรรมดา
define("CAPCHA_NUM","4"); //จำนวนตัวอักษร
define("CAPCHA_WIDTH","80"); //ขนาดความกว้าง
define("CAPCHA_HEIGHT","25"); //ขนาดความสูง

/*
CAPCHA_TYPE แบบที่ 1 ต้องเซ็ทค่าดังนี้
 กรณีที่ตัวอักษรไม่ขึ้นให้เข้าไปแก้ที่ไฟล์ capcha/CaptchaSecurityImages.php บรรทัดที่ 6 ให้ใส่ path ให้ถูกต้อง หากต้องการทราบ path ให้เปิดไฟล์ phpinfo.php เพื่อตรวจสอบ path ของเว็บไซต์ 
*/

//MySQL Connect
define("DB_HOST","localhost"); // ชื่อ host
define("DB_NAME","pt"); //ชื่อฐานข้อมูล
define("DB_USERNAME","root"); // ขิ้อ user ติดต่อฐานข้อมูล
define("DB_PASSWORD","l3arn"); // รหัสผ่านติดต่อฐานข้อมูล


define("_CATEGORY","category");


//Icon Size ขนาดของรูปภาพประกอบในบทความหรือข่าว
define("ads_W","125"); //
define("ads_H","125"); //
define("post_W","48"); //
define("post_H","48"); //

//ระบบจัดการขนาดไฟล์ภาพและไฟล์ upload ที่เพิ่มมาใหม่
define("_MEMBER_LIMIT_UPLOAD","51200"); //ขนาดไฟล์รูปสมาชิิกที่อัพโหลดได้ 
define("_MEMBER_LIMIT_PICWIDTH","100"); //ขนาดความก้ว้างไฟล์รูปสมาชิก 
define("_WEBBOARD_LIMIT_FILEUPLOAD","102400"); //ขนาดไฟล์ rar,zip ที่อัพโหลดได้ 
define("_MEMBERGAL_LIMIT_UPLOAD","512000");
define("_ADSPIC_LIMIT_UPLOAD","512000"); // ขนาดไฟล์ Slide show ที่ upload ได้

//ตรวจสอบ IP ของผู้เข้าใช้ังานเว็บ
if ($_SERVER['HTTP_CLIENT_IP']) { 
$IPADDRESS = $_SERVER['HTTP_CLIENT_IP'];
} elseif (ereg("[0-9]",$_SERVER["HTTP_X_FORWARDED_FOR"] )) { 
$IPADDRESS = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else { 
$IPADDRESS = $_SERVER["REMOTE_ADDR"];
}
define("IPADDRESS",$IPADDRESS) ;


//ผู้ดูแลระบบไม่ผ่านสิทธิการใช้งาน
$PermissionFalse .= "<BR><BR>";
$PermissionFalse .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/notview.gif\" BORDER=\"0\"></A><BR><BR>";
$PermissionFalse .= "<FONT COLOR=\"#336600\"><B>ท่านไม่ได้รับอนุญาตให้ใช้งานส่วนนี้ได้</B></FONT><BR><BR>";
$PermissionFalse .= "<A HREF=\"?name=admin&file=main\"><B>หน้าหลักผู้ดูแลระบบ</B></A>";
$PermissionFalse .= "</CENTER>";
$PermissionFalse .= "<BR><BR>";


$bkk= mktime(gmdate("H")+7,gmdate("i")+0,gmdate("s"),
	gmdate("m") ,gmdate("d"),gmdate("Y"));
$datetimeformat="j/m/y - H:i";
$now = date($datetimeformat,$bkk);


# ส่วนนี้สำหรับระบบส่งเมลล์ โดยใช้ gmail เข้าช่วย ดังนั้นต้องใช้ gmail account ของท่านระบบจึงจะทำงานสมบูรณ์

$email_user_send="posterthailand@gmail.com"; //แก้ไขเป็น gmail ของท่านเอง
$email_pass_send="password"; //แก้ไขเป็นรหัสผ่าน gmail ของท่านเอง

?>