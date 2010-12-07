<?
//From Warp Warning
function display_warning($variable){
	$display_wrap_warning = "<div class=\"wrap-warning\">{$variable}</div>";
	return $display_wrap_warning; 
}

//From Warp Success 	
function display_success($variable){
	$display_wrap_success = "<div class=\"wrap-success\">{$variable}</div>";
	return $display_wrap_success; 
}

//News Icon แสดงไอคอน New
function NewsIcon($Ntime="", $Otime="", $Icon=""){
	if(TIMESTAMP <= ($Otime + 86400)){
		echo "<IMG SRC=\"".$Icon."\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";
	}
}

//Update Icon แสดงไอคอนอัพเดท
function UpdateIcon($Ntime="", $Otime="", $Icon=""){
	if(TIMESTAMP <= ($Otime + 86400)){
		echo "<IMG SRC=\"".$Icon."\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";
	}
}

//ฟังก์ชั่นในการลบตัว \ ออกเพื่อให้แสดงผลได้ถุกต้อง
function FixQuotes ($what = "") {
        $what = ereg_replace("'","''",$what);
        while (eregi("\\\\'", $what)) {
                $what = ereg_replace("\\\\'","'",$what);
        }
        return $what;
}

//ฟังก์ชั่นเปลี่ยนข้อความเว็บและเมล์ให้เป็นลิงก์ 
function CHANGE_LINK($Message = ""){
	$Message = eregi_replace("([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]#?/&=])","<a href=\"\\1://\\2\\3\" target=\"_blank\">\\1://\\2\\3</a>",$Message);
	$Message = eregi_replace("([[:alnum:]]+)@([^[:space:]]*)([[:alnum:]])","<a href=mailto:\\1@\\2\\3>\\1@\\2\\3</a>",$Message); 
return ($Message);
}

//ฟังก์ชันตัดข้อความตามจำนวนตัวอักษรที่กำหนด
function cutstring($str, $len) {
  if (strlen($str)<=$len) return $str;
  else return sprintf("%.".$len."s...", $str);
}

//ฟังก์ชัน ban คำหยาบ
function CheckRude( $temp )
{
     $wordrude = array( "หำ","ashole","a s h o l e","a.s.h.o.l.e","bitch","b i t c h","b.i.t.c.h","shit","s h i t","s.h.i.t","fuck","dick","f u c k","d i c k","f.u.c.k","d.i.c.k","มึง","มึ ง","ม ึ ง","ม ึง","มงึ","มึ.ง","มึ_ง","มึ-ง","มึ+ง","กู","ควย","ค ว ย","ค.ว.ย","คอ วอ ยอ","คอ-วอ-ยอ","ปี้","เหี้ย","ไอ้เหี้ย","เฮี้ย","ชาติหมา","ชาดหมา","ช า ด ห ม า","ช.า.ด.ห.ม.า","ช า ติ ห ม า","ช.า.ติ.ห.ม.า","สัดหมา","สัด","เย็ด","หี","สันดาน","แม่ง","ระยำ","ส้นตีน","แตด","ผอมด่วน" ) ; //คำหยาบ
     $wordchange = "<font color='#FF0000'>***</font>"; //ข้อความที่ต้องการให้เปลี่ยนเป็น
     for ( $i = 0 ; $i < sizeof( $wordrude ) ; $i++ )
     {
          $temp = eregi_replace ( $wordrude[$i] , $wordchange , $temp );
     };
     
     return $temp;
 }

//ทำการแบ่งหน้า
function SplitPage($page="",$totalpage="",$option=""){
	global $ShowSumPages , $ShowPages ;
	// สร้าง link เพื่อไปหน้าก่อน-หน้าถัดไป
	$ShowSumPages .= "<B>กำลังแสดงหน้าที่  </B>";
	if($page>1 && $page<=$totalpage) {
		$prevpage = $page-1;
		$ShowSumPages .= "<a href='".$option."&page=$prevpage' title='Back'><B><-</B></a>\n";
	}
	$ShowSumPages .= " <b>$page/$totalpage</b> ";
	if($page!=$totalpage) {
		$nextpage = $page+1;
		if($nextpage >= $totalpage){
			$nextpage = $totalpage ;
		}
		$ShowSumPages .= "<a href='".$option."&page=$nextpage' title='Next'><B>-></B></a>\n";
	}

	// วนลูปแสดงเลขหน้าทั้งหมด แบบเป็นช่วงๆ ช่วงละ 10 หน้า
	$b=floor($page/10); 
	$c=(($b*10));

	if($c>1) {
		$prevpage = $c-1;
		$ShowPages .= "<a href='".$option."&page=$prevpage' title='10 หน้าก่อนนี้'><<</a> \n";
	}
	else{
		$ShowPages .= "<B><<</B>\n";
	}
	$ShowPages .= " <b>";
	for($i=$c; $i<$page ; $i++) {
		if($i>0)
		$ShowPages .= "<a href='".$option."&page=$i'>$i</a> \n";
	}
	$ShowPages .= "<font color=red>$page</font> \n";
	for($i=($page+1); $i<($c+10) ; $i++) {
		if($i<=$totalpage)
		$ShowPages .= "<a href='".$option."&page=$i'>$i</a> \n";
	}
	$ShowPages .= "</b> ";
	if($c>=0) {
		if(($c+2)<$totalpage){
	$nextpage = $c+10;
	$ShowPages .= "<a href='".$option."&page=$nextpage' title='10 หน้าถัดไป'>>></a> \n";
		}
		else
	$ShowPages .= "<B>>></B>\n";
	}
	else{
		$ShowPages .= "<B>>></B>\n";
	}
}

//Function Sendmail
function SendMail($charset="",$to="",$tocc="",$from="",$subject="",$topic=""){
	/* message */
	$message = "
	<html>
	<head>
	<title>".$subject."</title>
	</head>
	<body>
	".$topic."
	</body>
	</html>
	";

	/* To send HTML mail, you can set the Content-type header. */
	$headers = '';
	$headers .= "To: ".$to."\r\n";
	$headers .= "From: ".$from."\r\n";
	$headers .= "Cc: ".$tocc."\r\n";
	$headers .= "Reply-to: $from\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=".$charset."\r\n";
	$headers .= "Date: " . date('r', time()) . "\n";

	/* and now mail it */
	if(@mail($to, $subject, $message, $headers)){
		return true ;
	}else{
		return false ;
	}
}

//แปลงเวลาเป็นภาษาไทย
function ThaiTimeConvert($timestamp="",$full="",$showtime=""){
	global $SHORT_MONTH, $FULL_MONTH, $DAY_SHORT_TEXT, $DAY_FULL_TEXT;
	$day = date("l",$timestamp);
	$month = date("n",$timestamp);
	$year = date("Y",$timestamp);
	$time = date("H:i:s",$timestamp);
	$times = date("H:i",$timestamp);
	if($full){
		$ThaiText = $DAY_FULL_TEXT[$day]." ที่ ".date("j",$timestamp)." เดือน ".$FULL_MONTH[$month]." พ.ศ.".($year+543) ;
	}else{
		$ThaiText = date("j",$timestamp)."  ".$SHORT_MONTH[$month]."  ".($year+543);
	}

	if($showtime == "1"){
		return $ThaiText." เวลา ".$time;
	}else if($showtime == "2"){
		$ThaiText = date("j",$timestamp)." ".$SHORT_MONTH[$month]." ".($year+543);
		return $ThaiText." : ".$times;
	}else{
		return $ThaiText;
	}
}

//ตรวจสอบว่าเป็น Admin จริงหรือไม่จริง
function CheckAdmin($user = "", $pwd =""){
	global $db ;
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res[user] = $db->select_query("SELECT id FROM ".TB_ADMIN." WHERE username='$user' AND password='$pwd' ");
	$arr[user] = $db->fetch($res[user]);
	if(!$arr[user][id]){
		echo "<script language='javascript'>" ;
		echo "alert('ท่านไม่ใช่ผู้ดูแลระบบ')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
	}
}

//ตรวจสอบระดับของผู้ดูแลระบบ
function CheckLevel($Username = "", $Action = ""){
	global $db ;
	//Check Level
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res[user] = $db->select_query("SELECT * FROM ".TB_ADMIN." WHERE username='$Username' ");
	$arr[user] = $db->fetch($res[user]);
	//Check Action
	$res[action] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." WHERE id='".$arr[user][level]."' ");
	$arr[action] = $db->fetch($res[action]);
	if($arr[action][$Action]){
		return True;
	}else{
		return False;
	}
}

//ตัว Alert ว่าไม่สามารถเข้าใช้งานได้ 
function NotTrueAlert($permission="", $option="", $text=""){
	if($option == 1){
		$option = "<script language='javascript'>javascript:history.go(-1)</script>";
	}elseif($option == 2){
		$option = "<script language='javascript'>refresh_close();</script>";
	}elseif($option == 3){
		$option = "<script language='javascript'>self.close();</script>";
	}

	if(!$permission){
		echo "<script language='javascript'>" ;
		echo "alert('".$text."')" ;
		echo "</script>" ;
		echo $option ;
		exit();
	}
}

//เช็คขนาด Folder
function dirsize($dirName = '.') {
   $dir  = dir($dirName);
   $size = 0;

   while($file = $dir->read()) {
       if ($file != '.' && $file != '..') {
           if (is_dir($file)) {
               $size += dirsize($dirName . '/' . $file);
           } else {
               $size += filesize($dirName . '/' . $file);
           }
       }
   }
   $dir->close();
   return $size;
}

//แปลงหน่วยขนาดไฟล์ 
function getfilesize($bytes) {
   if ($bytes >= 1099511627776) {
       $return = round($bytes / 1024 / 1024 / 1024 / 1024, 2);
       $suffix = "TB";
   } elseif ($bytes >= 1073741824) {
       $return = round($bytes / 1024 / 1024 / 1024, 2);
       $suffix = "GB";
   } elseif ($bytes >= 1048576) {
       $return = round($bytes / 1024 / 1024, 2);
       $suffix = "MB";
   } elseif ($bytes >= 1024) {
       $return = round($bytes / 1024, 2);
       $suffix = "KB";
   } else {
       $return = $bytes;
       $suffix = "Byte";
   }
   if ($return == 1) {
       $return .= " " . $suffix;
   } else {
       $return .= " " . $suffix . "s";
   }
   return $return;
}

// function แสดงหน้า error โดยไม่ต้องใช้โค้ด exit

function showerror($showmsg) { 
	echo" <table width=\"400\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td><div align=\"left\">
      <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\">
        <tbody>
          <tr>
            <td width=\"20\"></td>
            <td></td>
            <td width=\"19\"></td>
          </tr>
        </tbody>
      </table>
      <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\">
        <tbody>
          <tr>
            <td width=\"10\"></td>
            <td valign=\"top\" width=\"100%\"><div align=\"center\">
              <table cellspacing=\"0\" cellpadding=\"0\" width=\"98%\" border=\"0\">
                <tbody>
                  <tr>
                    <td><table width=\"100%\" cellspacing=\"5\">
                      <tr>
                        <td><div align=\"center\"><strong><br />
                          <br />
                          $showmsg</strong><br />
                        </div></td>
                      </tr>
                    </table></td>
                  </tr>
                </tbody>
              </table>
            </div></td>
            <td width=\"10\"></td>
          </tr>
        </tbody>
      </table>
      <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\">
        <tbody>
          <tr>
            <td width=\"20\"></td>
            <td></td>
            <td width=\"19\"></td>
          </tr>
        </tbody>
      </table>
    </div></td>
  </tr>
</table>";
} // end fuction checktel


//ฟังก์ชั่นเปลี่ยนไอคอน
function CHANGE_EMOTICON($Message = ""){
	$Message = eregi_replace(":emo1:","<IMG SRC=\"images/emotion/angel_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo2:","<IMG SRC=\"images/emotion/angry_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo3:","<IMG SRC=\"images/emotion/broken_heart.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo4:","<IMG SRC=\"images/emotion/cake.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo5:","<IMG SRC=\"images/emotion/confused_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo6:","<IMG SRC=\"images/emotion/cry_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo7:","<IMG SRC=\"images/emotion/devil_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo8:","<IMG SRC=\"images/emotion/embaressed_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo9:","<IMG SRC=\"images/emotion/envelope.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo10:","<IMG SRC=\"images/emotion/heart.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo11:","<IMG SRC=\"images/emotion/kiss.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo12:","<IMG SRC=\"images/emotion/lightbulb.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo13:","<IMG SRC=\"images/emotion/omg_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo14:","<IMG SRC=\"images/emotion/regular_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo15:","<IMG SRC=\"images/emotion/sad_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo16:","<IMG SRC=\"images/emotion/shades_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo17:","<IMG SRC=\"images/emotion/teeth_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo18:","<IMG SRC=\"images/emotion/thumbs_down.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo19:","<IMG SRC=\"images/emotion/thumbs_up.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo20:","<IMG SRC=\"images/emotion/tounge_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo21:","<IMG SRC=\"images/emotion/whatchutalkingabout_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo22:","<IMG SRC=\"images/emotion/wink_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);
	$Message = eregi_replace(":emo23:","<img src=\"images/emotion2/001.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo24:","<img src=\"images/emotion2/002.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo25:","<img src=\"images/emotion2/003.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo26:","<img src=\"images/emotion2/004.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo27:","<img src=\"images/emotion2/005.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo28:","<img src=\"images/emotion2/006.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo29:","<img src=\"images/emotion2/007.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo30:","<img src=\"images/emotion2/008.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace("::emo31:","<img src=\"images/emotion2/009.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo32:","<img src=\"images/emotion2/010.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo33:","<img src=\"images/emotion2/011.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo34:","<img src=\"images/emotion2/012.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo35:","<img src=\"images/emotion2/013.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo36:","<img src=\"images/emotion2/014.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo37:","<img src=\"images/emotion2/015.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo38:","<img src=\"images/emotion2/016.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo39:","<img src=\"images/emotion2/017.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo40:","<img src=\"images/emotion2/018.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo41:","<img src=\"images/emotion2/019.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo42:","<img src=\"images/emotion2/020.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo43:","<img src=\"images/emotion2/021.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo44:","<img src=\"images/emotion2/022.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo45:","<img src=\"images/emotion2/023.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo46:","<img src=\"images/emotion2/024.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo47:","<img src=\"images/emotion2/025.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo48:","<img src=\"images/emotion2/026.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo49:","<img src=\"images/emotion2/027.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo50:","<img src=\"images/emotion2/028.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo51:","<img src=\"images/emotion2/029.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 
	$Message = eregi_replace(":emo52:","<img src=\"images/emotion2/030.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	return stripslashes($Message);
}

//BB Code
$_BBCONFIG['QuotedBgColor'] = '#F7F7F7';
$_BBCONFIG['QuotedBorderColor'] = '#CCCCCC';
$_BBCONFIG['CodeBgColor'] = '#EFF7FF';
$_BBCONFIG['CodeBorderColor'] = '#BDBEBD';

function BBCODE($string){
	global $_BBCONFIG;
	$string = nl2br($string);
	$patterns = array(
		'`\[b\](.+?)\[/b\]`is',
		'`\[i\](.+?)\[/i\]`is',
		'`\[u\](.+?)\[/u\]`is',
		'`\[strike\](.+?)\[/strike\]`is',
		'`\[color=#([0-9A-F]{6})\](.+?)\[/color\]`is',
		'`\[email\](.+?)\[/email\]`is',
		'`\[img\](.+?)\[/img\]`is',
		'`\[url=([a-z0-9]+://)([\w\-]+\.([\w\-]+\.)*[\w]+(:[0-9]+)?(/[^ \"\n\r\t<]*?)?)\](.*?)\[/url\]`si',
		'`\[url\]([a-z0-9]+?://){1}([\w\-]+\.([\w\-]+\.)*[\w]+(:[0-9]+)?(/[^ \"\n\r\t<]*)?)\[/url\]`si',
		'`\[url\]((www|ftp)\.([\w\-]+\.)*[\w]+(:[0-9]+)?(/[^ \"\n\r\t<]*?)?)\[/url\]`si',
		'`\[flash=([0-9]+),([0-9]+)\](.+?)\[/flash\]`is',
		'`\[quote\](.+?)\[/quote\]`is',
		'`\[indent](.+?)\[/indent\]`is',
		'`\[size=([1-6]+)\](.+?)\[/size\]`is',
		'`\[sup\](.+?)\[/sup\]`is',
		'`\[sub\](.+?)\[/sub\]`is',
		'`\[code\](.+?)\[/code\]`is',
		'`\r\n|\r|\n`',
		'`\t`',
		'`\[img=(.+?)\]`is',
		'`\[align=(left|center|right)\](.+?)\[/align\]`is',
		'`\[glow\](.+?)\[/glow\]`is',
		'`\[shadow\](.+?)\[/shadow\]`is',
		'`\[media\](.+?)\[/media\]`is',
		'`\[movie\](.+?)\[/movie\]`is',
		'`\[center\](.+?)\[/center\]`is',
		'`\[left\](.+?)\[/left\]`is',
		'`\[right\](.+?)\[/right\]`is',
		'`\[\-\-\-\]`is',
			);

	$replaces =  array(
			'<strong>\\1</strong>',
			'<em>\\1</em>',
			'<span style="border-bottom: 1px dotted">\\1</span>',
			'<strike>\\1</strike>',
			'<span style="color:#\1;">\2</span>',
			'<a href="mailto:\1">\1</a>',
			'<img src="\1" alt="" style="border:0px;" />',
			'<a href="\1\2">\6</a>',
			'<a href="\1\2">\1\2</a>',
			'<a href="http://\1">\1</a>',
			'<object width="\1" height="\2"><param name="movie" value="\3" /><embed src="\3" width="\1" height="\2"></embed></object>',
			'<strong>อ้างอิง :</strong><div style="margin:0px 10px;padding:5px;background-color:'.$_BBCONFIG["QuotedBgColor"].';border:1px dotted '.$_BBCONFIG["QuotedBorderColor"].';width:100%;"><em>\1</em></div>',
			'<pre>\\1</pre>',
			'<h\1 style="display:inline">\2</h\1>',
			'<sup>\\1</sup>',
			'<sub>\\1</sub>',
			'<strong style="color:green;font-family:courier new,monospace;font-size:8pt;">Code:</strong><pre style="margin:0px 10px;padding:5px;background-color:'.$_BBCONFIG["CodeBgColor"].';border:1px solid '.$_BBCONFIG["CodeBorderColor"].';width:100%;font-size:10pt;font-family:courier new,monospace;">\1</pre>',
			'',
			'&nbsp;&nbsp;',
			'<img src="\1" alt="" style="border:0px;" />',
			'<div align="\1">\2</div>',
			'<table style=filter:glow(color=#00FF00, strength=3)>\\1</table>',
			'<table style=\"filter:shadow(color=pink, direction=left)\">\\1</table>',
			'<embed src=\\1  TYPE=\"application/x-mplayer2\" align=\"middle\" width=\"200\" height=\"42\" autostart=\"1\" autoplay=\"true\" dhtype=\"wma\">',
			'<object classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\" type=\"application/x-oleobject\" width=\"262\" height=\"260\" id=\"MediaPlayer1\">\n<param name=\"URL\" value=\\1  >\n<PARAM NAME=ShowControls VALUE=true>\n<PARAM NAME=ShowStatusBar VALUE=false>\n<PARAM NAME=Autostart VALUE=true>\n<PARAM NAME=ShowPositionControls value=true>\n<PARAM NAME=ShowTracker value=true>\n</object>',
			'<div align=center>\\1</div>',
			'<div align=left>\\1</div>',
			'<div align=right>\\1</div>',
			'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
			);
	$string = preg_replace($patterns, $replaces , $string);
	return stripslashes($string);
}

#   [b]bold[/b]                                                                              	: BOLD TEXT
#   [i]Italic[/i]                                                                                 	: ITALIC TEXT
#   [u]Underline[/u]                                                                      : UNDERLINED TEXT
#   [strike]Text[/strike]                                                                 	: STRIKE THROUGH TEXT
#   [color=#ffffff]Colored Text[/color]                                      	: COLORED TEXT
#   [email]me@email.com[/email]                                            	: EMAIL LINK
#   [img]http://www.blah.com/img.gif[/img]                        	: IMAGE
#   [url=http://www.domain.com]Text[/url]                           	: HYPERLINKED TEXT OR IMAGE
#   [url]http://www.url.com[/url]                                              	: HYPERLINK
#   [url]www.yourdomain.com[/url]                                         	: HYPERLINK WWW
#   [flash=width,height]http://blah.com/flash.swf[/flash]    	: FLASH MOVIE
#   [quote]Text![/quote]                                                              	: QUOTE    
#   [indent]Text[/indent]                                                             	: PREFORMATTED TEXT
#   [size=1-6]Text[/size]                                                              	: TEXT HEADINGS
#   [sup]superscription[/sup]
#   [sub]subscription[/sub]
#   [code]program code[/code]
#   [img=http://www.blah.com/img.gif]
#   [align=left,center,right]Alignment[/align]

// สร้าง thumbnail ตัดส่วนที่เกิน เพื่อให้ได้ขนาดที่กำหนด
function cropImage( $source , $target , $ssWidth )
{
	
		
	$data= array();
	$size=getimagesize($source);
	$img_w = $size[0];
    $img_h = $size[1];
	
	
	$pMime = $size[mime];
	switch ( $pMime )
	{
		case 'image/gif':
			$imgJpg = imagecreatefromgif( $source );
			$data[ext] = '.gif';
			break;
		case 'image/jpeg':
			$imgJpg = imagecreatefromjpeg( $source );
			$data[ext] = '.jpg';
			break;
		case 'image/png':
			$imgJpg = imagecreatefrompng( $source );
			$data[ext] = '.png';
			break;
		default:
			$data[error] = 'ไม่ใช่รูปภาพ';
			break;
	};
		
		$w=$img_w;
		$h=$img_h;
		if ( $error == '' )
		{
			if ( $w >= $h && $w > $ssWidth )
			{
				$nw = $ssWidth;
				$nh = ( $ssWidth * $h ) / $w;

			}
			else if ( w < h && h > ssWidth )
			{
				$nh = $ssWidth;
				$nw = ( $ssWidth * $w ) / $h;

			}
			else
			{
				$nh = $h;
				$nw = $w;
				
			};
		$img= imagecreatetruecolor($nw,$nh);
		imagecopyresampled($img,$imgJpg,0,0,0,0,$nw,$nh,$img_w,$img_h);
		if ( !imagejpeg($img,$target) )
		{
			$data[error] = "ไม่สามารถสร้างรูปได้, ตรวจสอบไดเร็คทอรี่ให้ถูกต้อง";
		};
		
		imagedestroy($imgJpg);
		imagedestroy($img);
	};
	return $data;
}

// reSize Photo
function reSize($url,$width,$dir){
//$substr=$dir.substr($url,8);
$getSize=getimagesize($url);
$img_w = $getSize[0];
$img_h = $getSize[1];
$w=$img_w;
$h=$img_h;
	if ( $w >= $h && $w > $width )
	{
		$lenght['w'] = $width;
		$lenght['h'] = ( $width * $h ) / $w;
	}
	else if ( $w < $h && $h > $width )
	{
		$lenght['h'] = $width;
		$lenght['w'] = ( $width * $w ) / $h;
	}
	else
	{
		$lenght['h'] = $h;
		$lenght['w'] = $w;
	};
return $lenght;
}

function send_multimail($systememail, $recipient_email = Array(), $replace = Array())
{

	$getm = mysql_fetch_assoc(mysql_query("SELECT * FROM systememails WHERE systememail_name='".$systememail."'"));
	$email = mysql_fetch_assoc(mysql_query("SELECT info_email FROM setting"));
	
	$message = vsprintf($getm['systememail_body'], $replace);

	//echo "================================";
    //echo $message;

	$subject = "=?utf-8?B?".base64_encode("".$getm['systememail_subject']."")."?=";
	$header  = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8\r\n";
	$header .= "From: ".$email['info_email']."\r\n";
	$header .= "Reply-To: ".$email['info_email']."\r\n";
	
   foreach($recipient_email as $to){
   	 @mail($to, $subject, $message, $header);
   }
	
}


function rpHash($value) {
	$hash = 5381;
	$value = strtoupper($value);
	for($i = 0; $i < strlen($value); $i++) {
		$hash = (($hash << 5) + $hash) + ord(substr($value, $i));
	}
	return $hash;
}
?>