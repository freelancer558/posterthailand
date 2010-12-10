<?php
$uploaddir = './uploads/'; 
$ext = substr($_FILES['uploadfile']['name'],strpos($_FILES['uploadfile']['name'],'.'));
$filename = $_FILES['uploadfile']['name']=time().$ext;
$file = $uploaddir . basename($filename); 
 
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  	echo "success,".$filename; 
} else {
	echo "error";
}
?>