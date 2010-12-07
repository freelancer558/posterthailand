<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Poster Thailand</title>
<link href="<?php echo  WEB_URL;?>/styles/style.css" rel="stylesheet" />
<link href="<?php echo  WEB_URL;?>/styles/ads.css" rel="stylesheet" />
<link type="text/css" href="<?php echo  WEB_URL;?>/styles/ui-lightness/jquery-ui-1.8rc2.custom.css" rel="stylesheet" />

<!-- StyleSheet Plugin-->
<link type="text/css" href="<?php echo  WEB_URL;?>/styles/jqtransform.css" rel="stylesheet" />
<link type="text/css" href="<?php echo  WEB_URL;?>/styles/jquery.checkbox.css" rel="stylesheet" />
<link type="text/css" href="<?php echo  WEB_URL;?>/styles/vtip.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo  WEB_URL;?>/styles/validationEngine.jquery.css" type="text/css" media="screen"/>

<script type="text/javascript" src="<?php echo  WEB_URL;?>/scripts/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo  WEB_URL;?>/scripts/jquery/jquery-ui-1.8rc2.custom.min.js"></script>

<!-- Script Plugin -->
<script type="text/javascript" src="<?php echo  WEB_URL;?>/scripts/jquery/jquery.jqtransform.js"></script>
<script type="text/javascript" src="<?php echo  WEB_URL;?>/scripts/jquery/jquery.checkbox.min.js"></script>
<script type="text/javascript" src="<?php echo  WEB_URL;?>/scripts/jquery/vtip.js"></script>
<script src="<?php echo  WEB_URL;?>/scripts/jquery/jquery.validationEngine-th.js" type="text/javascript"></script>
<script src="<?php echo  WEB_URL;?>/scripts/jquery/jquery.validationEngine.js" type="text/javascript"></script>



		

<script type="text/javascript">
$(function(){

	$('form').jqTransform({imgPath:'<?php echo  WEB_URL;?>/styles/images/jqtransform/'});

 	$('input:checkbox:not([safari])').checkbox();
  	$('input:radio').checkbox();
	
	$('#signup_form').validationEngine();

	$('#signup_form').submit(function(){
		
	});

});
</script>

</head>

<body>
	<div class="page">
    
    	<?php require_once('../header.php');?>
        
        <?php
        	$s = $db->select_query('SELECT * FROM setting');
			$rs= $db->fetch($s);
		?>
        
        <div class="content">
        	<div id="wrap_top">
            	<div id="wrap_top_left">
                	<div id="wrap_ads">                	 
                        <div id="wrap_728x90"></div>
                	</div>                    
                    <div class="clear" style="margin-top:-5px;"></div> 
                    <center>
                    	<div id="title"><h1> ยินดีต้อนรับสมาชิกใหม่นะคะ ;)</h1></div>
                  	<?php
						$s = $db->select_query('SELECT * FROM setting');
						$setting = $db->fetch($s);
                        if($setting['activate']){
							echo '<div id="sub_title"> ระบบจะส่งอีเมลแจ้งชื่อผู้ใช้งานและรหัสผ่านกลับไปที่อีเมล และลิ้งค์เพื่อนยืนยันตัวตนไปตามอีเมลที่ได้ลงทะเบียน</div>';
						}else{
                        	echo '<div id="sub_title"> คุณสามารถเข้าใช้งานได้เลยคะ</div>';
						}
					?>
                         <img src="../styles/images/tick.png" />
  					</center>               
                  	                      
                  	<?php
                    if($_POST['process'] == 'register'){
						($_POST['postcode'] == '')? $_POST['postcode'] = 0 : $_POST['postcode'] ;
						$signup_sql = 'INSERT INTO members(
									  `username`,
									  `password`,
									  `email`,
									  `poster_name`,
									  `fname`,
									  `lname`,
									  `sex`,
									  `address`,
									  `tumbon`,
									  `amphur`,
									  `province`,
									  `postcode`,
									  `mobile_no`,
									  `phone`) VALUES(
									  "'.$_POST['username'].'",
									  "'.md5($_POST['password']).'",
									  "'.$_POST['email'].'",
									  "'.$_POST['poster_name'].'",
									  "'.$_POST['fname'].'",
									  "'.$_POST['lname'].'",
									  "'.$_POST['sex'].'",
									  "'.$_POST['add_no'].'",
									  "'.$_POST['tumbon'].'",
									  "'.$_POST['amphur'].'",
									  "'.$_POST['province'].'",
									  '.$_POST['postcode'].',
									  "'.$_POST['mobile_phone'].'",
									  "'.$_POST['phone'].'")';
						
						$db->select_query($signup_sql);
						
						send_multimail('welcome', array($_POST['email']) , array($_POST['poster_name'], WEB_URL , $_POST['username'],$_POST['password']));
												
					}
					?>
                    
                </div>
                <div id="wrap_top_right">
                	
                    <div class="clear"></div>
                	
                    <?php
                    	echo $rs['f230'];
					?>
                </div>
            </div>
            
            
        </div>
        
        <?php require_once('../footer.php');?>
        
    </div>
</body>
</html>