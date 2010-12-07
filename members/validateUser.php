<?php
if(!isset($_SESSION)){session_start();};
require_once("../core.php");
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

/* RECEIVE VALUE */
$validateValue=$_POST['validateValue'];
$validateId=$_POST['validateId'];
$validateError=$_POST['validateError'];

/* RETURN VALUE */
$arrayToJs = array();
$arrayToJs[0] = $validateId;
$arrayToJs[1] = $validateError;

$q = $db->select_query('SELECT username FROM members');
$r = $db->num_rows('members','*','');
while($rs = $db->fetch($q)){
	$hasuser = $rs['username'];
}

if( $validateValue !="admin" ){		// validate??
	if($r > 0 && in_array($validateValue,$hasuser)){		
		$arrayToJs[2] = "false";		// RETURN FALSE
	}else{
		$arrayToJs[2] = "true";			// RETURN TRUE
	} 
	
	echo '{"jsonValidateReturn":'.json_encode($arrayToJs).'}';			// RETURN ARRAY WITH success
}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[2] = "false";
			echo '{"jsonValidateReturn":'.json_encode($arrayToJs).'}';		// RETURN ARRAY WITH ERROR
		}
	}
	
}

?>