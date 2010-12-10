<?
if(!isset($_SESSION)){session_start();};
require_once("core.php");

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

if($_POST['getsubcat']){

	$getsubcat = $db->select_query('SELECT * FROM subcat WHERE cat_id = '.$_POST['catid']);
	
	$msg = '<select id="subcat">';
	while($rs = $db->fetch($getsubcat)){
		$msg .= '<option value="'.$rs['sub_id'].'">'.$rs['sub_name'].'</option>';
	}
	$msg .= '</select>';
	echo $msg;
}

if($_POST['login']){
	$u = $_POST['user'];
	$p = md5($_POST['pwd']);
	$rm= $_POST['rem'];
	
	$q = $db->select_query('SELECT * FROM members WHERE username = "'.$u.'" AND password = "'.$p.'"');
	$rs = $db->fetch($q);
	$n = $db->rows($q);
	
	if($n > 0){
		$_SESSION['usr']	= $rs['username'];
		$_SESSION['ssid'] 	= session_id();
		$_SESSION['email']	= $rs['email'];
		if($rm == 'true'){
			$_SESSION['lifetime'] = 3600*24*365;
			$db->select_query('INSERT INTO session(ss_user,session,ss_endtime,ssdate) VALUES("'.$_SESSION['usr'].'","'.$_SESSION['ssid'].'","'.$_SESSION['lifetime'].'","'.time().'")');
		}else{
			$_SESSION['lifetime'] = 3600*24;
		}
		echo '{"status":"1","txt":"true"}';
	}else{
		echo '{"status":"0","txt":"false"}';
	}
	
}


if($_POST['checkcaptcha']){
	$c = $_POST['captcha'];
	$h = $_POST['chash'];
	if (rpHash($c) == $h) {
		echo '{"status":true}';
	}else{
		echo '{"status":false}';
	}
}
?>