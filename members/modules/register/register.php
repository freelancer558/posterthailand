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

});
</script>

</head>

<body>
	<div class="page">
    
    	<?php require_once('../header.php');?>
        
        <div class="content">
        	<div id="wrap_top">
            	<div id="wrap_top_left">
                	<div id="wrap_ads">                	 
                        <div id="wrap_728x90"></div>
                	</div>
                    
                    <form id="signup_form" action="?m=register&p=process" method="post" enctype="multipart/form-data" >
                            <table width="745" border="0" cellspacing="2" cellpadding="5">
                              <tr>
                                <td colspan="5">
                                	<div id="title"><h1>ข้อมูลสำหรับเข้าสู่ระบบ</h1><h3>กรุณากรอกข้อมูลในช่องที่มีเครื่องหมาย <span id="redstar">*</span> ให้ครบทุกช่องนะค่ะ</h3></div>
                  					<div class="clear" style="margin-top:-5px;"></div>
                                </td>
                              </tr>
                              <tr>
                                <td width="175"><div align="right"><strong>ชื่อผู้ใช้งาน :</strong></div></td>
                                <td width="200"><label for="username"></label>
                                <input type="text" name="username" id="username" title="กรูณากรอกชื่อผู้ใช้งานเป็นภาษาอังกฤษเท่านั้น และต้องมากกว่า 4 ตัวอักษร" class="vtip validate[required,custom[noSpecialCaracters],length[4,20],ajax[ajaxUser]]" /><span id="redstar">*</span></td>
                                <td width="116"><div align="right"><strong>อีเมล :</strong></div></td>
                                <td colspan="2"><label for="email"></label>
                                <input type="text" name="email" id="email" title="กรุณากรอกอีเมลที่ใช้งานได้จริงเพราะระบบจะส่งลิ้งค์สำหรับยืนยันตัวตนไปที่อีเมลนี้" class="vtip validate[required,custom[email]]"/><span id="redstar">*</span></td>
                              </tr>
                              <tr>
                                <td><div align="right"><strong>รหัสผ่าน :</strong></div></td>
                                <td><label for="password"></label>
                                <input type="text" name="password" id="password" title="รหัสผ่านต้องมีอย่างน้อย 4 ตัวอักษร" class="vtip validate[required,length[4,32]]"/><span id="redstar">*</span></td>
                                <td><div align="right"><strong>ยันยันรหัสผ่าน :</strong></div></td>
                                <td colspan="2"><label for="confirm_pass"></label>
                                <input type="password" name="confirm_pass" id="confirm_pass" title="ยืนยันรหัสผ่านจะต้องตรงกันกับรหัสผ่าน" class="vtip validate[required,confirm[password]]" /><span id="redstar">*</span></td>
                              </tr>
                              <tr>
                                <td colspan="5">&nbsp;
                                	
                                </td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                	<div id="title"><h1>ข้อมูลทั่วไป</h1> <h3>เพื่อเพิ่มความน่าเชือถือให้กับตัวผู้ลงประกาศ และสร้างความมั่นใจให้กับผู้ที่เข้ามาดู กรุณาลงข้อมูลให้ครบด้วยนะค่ะ</h3></div>
                  					<div class="clear" style="margin-top:-5px;"></div>
                                </td>
                              </tr>
                              <tr>
                                <td><div align="right"><strong>ชื่อ :</strong></div></td>
                                <td><label for="fname"></label>
                                <input type="text" name="fname" id="fname" /></td>
                                <td><div align="right"><strong>นามสกุล :</strong></div></td>
                                <td colspan="2"><label for="lname"></label>
                                <input type="text" name="lname" id="lname" /></td>
                              </tr>
                              <tr>
                                <td><div align="right"><strong>ชื่อแทนตัว :</strong></div></td>
                                <td><label for="card_id"></label>
                                <input type="text" name="poster_name" id="poster_name" title="ชื่อที่ใช้แสดงให้คนทั่วไปเห็น" class="vtip validate[required]" /><span id="redstar">*</span></td>
                                <td><div align="right"><strong>เพศ :</strong></div></td>
                                <td width="95"><input name="sex" type="radio" id="m" value="m" checked="checked" />
                                <label for="m"> ชาย</label></td>
                                <td width="100">  <input type="radio" name="sex" id="f" value="f" />
                                <label for="f"> หญิง     </label></td>
                              </tr>
                              <!--<tr>
                                <td><div align="right"><strong>รูปที่ใช้แสดง :</strong></div></td>
                                <td>&nbsp;</td>
                                <td colspan="3"><div align="right"></div></td>
                              </tr>-->
                              <tr>
                                <td><div align="right"><strong>ที่อยู่ :</strong></div></td>
                                <td colspan="2"><label for="add_no"></label>
                                <input type="text" name="add_no" id="add_no" />                                <div align="right"></div></td>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="right"><strong>ตำบล :</strong></div></td>
                                <td><label for="tumbon"></label>
                                <input type="text" name="tumbon" id="tumbon" /></td>
                                <td><div align="right"><strong>อำเภอ :</strong></div></td>
                                <td colspan="2"><label for="amphur"></label>
                                <input type="text" name="amphur" id="amphur" /></td>
                              </tr>
                              <tr>
                                <td><div align="right"><strong>จังหวัด :</strong></div></td>
                                <td><label for="province"></label>
                                <input type="text" name="province" id="province" /></td>
                                <td><div align="right"><strong>ไปรษณีย์ :</strong></div></td>
                                <td colspan="2"><label for="postcode"></label>
                                <input type="text" name="postcode" id="postcode" /></td>
                              </tr>
                              <tr>
                                <td><div align="right"><strong>โทรศัพท์มือถือ :</strong></div></td>
                                <td><label for="mobile_phone"></label>
                                <input type="text" name="mobile_phone" id="mobile_phone" /></td>
                                <td><div align="right"><strong>โทรศัพท์บ้าน :</strong></div></td>
                                <td colspan="2"><label for="phone"></label>
                                <input type="text" name="phone" id="phone" /></td>
                              </tr>
                              <tr>
                                <td><div align="right">
                                  <input type="checkbox" name="agree" id="agree" class="validate[required] checkbox"/>
                                  <label for="agree"></label>
                                </div></td>
                                <td colspan="4"> ท่านได้ทำการอ่าน <strong>ข้อตกลงและเงื่อนไขการให้บริการ</strong> เป็นอย่างดีแล้วจึงได้ทำการสมัครสมาชิก <span id="redstar">*</span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>
                                	<input type="hidden" name="process" id="process" value="register" />
                                	<input type="submit" name="submit" id="submit" value="สมัครสมาชิก" />
                                	<input type="reset" name="reset" id="reset" value="กรอกข้อมูลใหม่" />
                               	</td>
                                <td>&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                            </table>                    
                    </form>                    
                                        
              </div>
                <div id="wrap_top_right">
                	<div id="sub_title">หมวดหมู่สินค้า</div>
                    <div class="clear"></div>
                	<?php
                    $q = $db->select_query('SELECT * FROM '._CATEGORY); 
					
					echo '<ul class="catlist">';					
					while ($r = $db->fetch($q)) { 
					?>					
                    	<li><a href="?m=categories&p=categories&c=<?php echo $r['cat_name'];?>">&raquo; <?php echo $r['cat_name'];?></a></li>                   	                      
					<?php
					}
					echo '</ul>';
					?>
                    <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FPosterthailand-fanpage%2F178290318853273&amp;width=230&amp;colorscheme=light&amp;connections=6&amp;stream=false&amp;header=true&amp;height=287" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:230px; height:287px;" allowTransparency="true"></iframe>
                </div>
            </div>
            
            
        </div>
        
        <?php require_once('../footer.php');?>
        
    </div>
</body>
</html>