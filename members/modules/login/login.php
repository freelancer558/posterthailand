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
<script type="text/javascript" src="<?php echo  WEB_URL;?>/scripts/jquery/vibrate.js"></script>

<script type="text/javascript">
$(function(){

	$('form').jqTransform({imgPath:'<?php echo  WEB_URL;?>/styles/images/jqtransform/'});

 	$('input:checkbox:not([safari])').checkbox();
	
  	$('input:radio').checkbox();
	
	$('#signup_form').validationEngine();
	
/*	$('#signup_form').submit(function(){
		var u = $('#username').val();
		var p = $('#password').val();
		var rm= $('#remember_me').attr('checked');

		$.ajax({
			type: "POST",
			url: "../query.php",
			data: {login:true, user:u, pwd:p, rem:rm},
			dataType: 'json',
			beforeSend: function(x){$('#loading').html('<img src="../styles/images/loading.gif"/>')},
			success: function(msg){	
			
				$('#loading').html('');
				if(msg.status == 1){
					location.href = '../index.php'
				}else{
					alert('login false');
				}
				
			}			   
		});
		
		return false;	
	});*/

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
                    
                    <form id="signup_form" action="" method="post" enctype="multipart/form-data" >
                            <table width="450" border="0" cellspacing="2" cellpadding="5">
                              <tr>
                                <td colspan="3">
                                	<div id="title"><h1>เข้าสู่ระบบ</h1></div>
                  					<div class="clear" style="margin-top:-5px;"></div>
                                </td>
                              </tr>
                              <tr>
                                <td width="181" rowspan="3">
                                <center>
                                	<img src="<?=WEB_URL;?>/styles/images/biglock.png" align="absmiddle" class="bigKey">
                                </center>
                                </td>
                                <td width="230">
                                  <label for="username">
                                  <div align="left"><strong>ชื่อผู้ใช้งาน :</strong><br />
                                    <br />
                                  </div>
                                  </label>
                                  &nbsp;&nbsp;
                                  <p>
                                    <input type="text" name="username" id="username" />
                                </p></td>
                                <td width="1" rowspan="5">&nbsp;</td>
                              </tr>
                              <tr>
                                <td><label for="password">
                                  <div align="left"><strong>รหัสผ่าน :</strong><br />
                                    <br />
                                  </div>
                                </label>
                                <input type="password" name="password" id="password" /></td>
                              </tr>
                              <tr>
                                <td> <input type="checkbox" name="remember_me" id="remember_me" checked="checked"/>
                                 จดจำชื่อสมาชิกในคอมพิวเตอร์นี้ </td>
                              </tr>
                              <tr>
                                <td><div class="warning"></div></td>
                                <td><input type="submit" name="submit" id="submit" value="เข้าสู่ระบบ" /> <span id="loading"></span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>ฉันลืมรหัสผ่าน</td>
                              </tr>
                            </table>                    
                  </form>                    
                  	<div id="regist_nav">
                    	<div id="title"><h1>ยังไม่ได้เป็นสมาชิก?</h1></div>
       				  <div class="clear" style="margin-top:-5px;"></div>
                    	<p>
						คุณสามารถสมัครสมาชิกได้ง่ายๆ เพื่อเข้าใช้งานระบบของ PosterThailand.com สำหรับลงประกาศขาย, โฆษณาสินค้า ทั้งมือหนึ่ง หรือสินค้ามือสองได้<strong style="color:red;font-size: 22px;">ฟรีๆ!</strong> เพื่อช่วยเพิ่มโอกาสในการสร้างรายได้ที่แสนง่าย โดยกดที่สมัครสมาชิกได้เลยค่ะ </p>
					  <a href="<?php echo WEB_URL;?>/members/?m=register&p=register" class="none_underline"><div id="joinus">สมัครสมาชิก</div></a>
                    </div>            
                </div>
                <div id="wrap_top_right">
                	<div id="sub_title">ติดตามเราใน facebook</div>
                    <div class="clear"></div>
                	<?php
                    	echo $rs['f230'];
					?>
                </div>
            </div>
            
            
        </div>
        
        <?php require_once('../footer.php');?>
        
    </div>
 
<script type="text/javascript">

$(function() {
	
	function doLogin(){
		
		var u = $('#username').val();
		var p = $('#password').val();
		var rm= $('#remember_me').attr('checked');

        $.ajax({
			type :'POST',
			url: "../query.php",
			data: {login:true, user:u, pwd:p, rem:rm},
			dataType: 'json',
			beforeSend: function(x){$('#loading').html('<img src="../styles/images/loading.gif"/>')},
			success: function(msg){	
				//alert(msg);
				$('#loading').html('');
				if(msg.status == 0){
					
					// configurations for the buzzing effect. Be careful not to make it too annoying!
					var conf = {
							frequency: 5000,
							spread: 15,
							duration: 1000
						};
					
					
					// this is the call we make when the AJAX callback function indicates a login failure 
					$(".bigKey").vibrate(conf);
					
					// let's also display a notification
					if($(".warning").text() == ""){
						$(".warning").append('<p id="warning">ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้องค่ะ!</p>');

						// clear the fields to discourage brute forcing 						
						$("#username").val("");
						$("#password").val("");	
						$("#username").focus();

						return false;
					}
				}else if(msg.status == 1){
					location.href='../index.php';
				}
				
			} 
		});        
        	
	}
    $("form").submit( function() {
		doLogin();
		return false;
    });
	
	$('form input').keydown(function(e) {
		if (e.keyCode == 13) {
			doLogin();
			return false;
		}
	});
    
});
</script> 
 
</body>
</html>