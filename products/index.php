<?
if(!isset($_SESSION)){session_start();};
require_once("../core.php");

//define('INCLUDE_CHECK',true); //Check Login

$PHP_SELF = "index.php";
GETMODULE($_GET[m],$_GET[p]);

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

include ("".$MODPATHFILE."");

?>


