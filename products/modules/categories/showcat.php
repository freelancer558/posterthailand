<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Poster Thailand</title>
<link href="<?php echo WEB_URL;?>/styles/style.css" rel="stylesheet" />
<link href="<?php echo WEB_URL;?>/styles/ads.css" rel="stylesheet" />
<link type="text/css" href="<?php echo WEB_URL;?>/styles/ui-lightness/jquery-ui-1.8rc2.custom.css" rel="stylesheet" />

<!-- StyleSheet Plugin-->
<link type="text/css" href="<?php echo WEB_URL;?>/styles/jqtransform.css" rel="stylesheet" />
<link type="text/css" href="<?php echo WEB_URL;?>/styles/jquery.checkbox.css" rel="stylesheet" />


<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery-ui-1.8rc2.custom.min.js"></script>

<!-- Script Plugin -->
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.jqtransform.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.checkbox.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.hint.js"></script>

<script type="text/javascript">
$(function(){

	$('input').hint();
		
	$('form').jqTransform({imgPath:'<?php echo WEB_URL;?>/styles/images/jqtransform/'});

 	$('input:checkbox:not([safari])').checkbox();
  	$('input:radio').checkbox();

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
                    
                    <div id="special_ads">
                    	<div id="title"><h1>ประกาศตำแหน่งพิเศษ</h1></div>
                        <div class="clear"></div>
                    	<span id="sp_box">
                        	<div id="sp_img"></div>
                            <div id="sp_title">This is tilte of product.This is tilte of product.This is tilte of product.</div>
                        </span>
                        <span id="sp_box">
                        	<div id="sp_img"></div>
                            <div id="sp_title">This is tilte of product.This is tilte of product.This is tilte of product.</div>
                        </span>
                        <span id="sp_box">
                        	<div id="sp_img"></div>
                            <div id="sp_title">This is tilte of product.This is tilte of product.This is tilte of product.</div>
                        </span>
                        <span id="sp_box">
                        	<div id="sp_img"></div>
                            <div id="sp_title">This is tilte of product.This is tilte of product.This is tilte of product.</div>
                        </span>
                        <span id="sp_box">
                        	<div id="sp_img"></div>
                            <div id="sp_title">This is tilte of product.This is tilte of product.This is tilte of product.</div>
                        </span>
                    </div>
                      
                </div>
                <div id="wrap_top_right">
                	<div id="sub_title">มาเป็นเพื่อนกัน</div>
                    <div class="clear"></div>
                    <div class="clear" style="border:none;"></div>
					<a href="http://www.facebook.com/poster.thailand">
                    	<img src="<?php echo WEB_URL;?>/styles/images/facebook_32.png" align="absmiddle" alt="มาเป็นเพื่อนกันบนเฟสบุ๊ค" title="มาเป็นเพื่อนกันบนเฟสบุ๊ค" />
                    </a>
                    <a href="http://twitter.com/posterthailand">
                    	<img src="<?php echo WEB_URL;?>/styles/images/twitter_32.png"  align="absmiddle" alt="มาเป็นเพื่อนกันบนทิตเตอร์" title="มาเป็นเพื่อนกันบนทิตเตอร์" /> 
                    </a>
                    <br /><br />
                	<div id="sub_title">ชอบหน้านี้อย่าลืมกด Like นะคะ</div>
                    <div class="clear"></div>
                	<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FPosterthailand-fanpage%2F178290318853273&amp;width=230&amp;colorscheme=light&amp;connections=6&amp;stream=false&amp;header=true&amp;height=287" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:230px; height:287px;" allowTransparency="true"></iframe>
                </div>
            </div>
            
            <div id="wrap_bottom">
            	<div id="wrap_bottom_left">
                <?php
                if(!isset($_GET['c'])){
				?>
                	<div id="title"><h1>หมวดหมู่สินค้าทั้งหมด</h1></div>
                    <div class="clear"></div>

                    <div id="cat_left">
                    <?php
                    $leftq = $db->select_query('SELECT * FROM category LIMIT 0,17');  	
					while($getleft = $db->fetch($leftq)){
					?>
                    	<div id="category">
                            <div id="cat_img" class="ui-corner-all">
                            <img src="<?php echo WEB_URL.'/styles/images/category/'.$getleft['cat_img'];?>" title="<?php echo $getleft['cat_name'];?>" alt="<?php echo $getleft['cat_name'];?>" />
                            </div>
                            <div id="cat_title">
                                <div id="cat_header"><a href="?m=categories&p=categories&c=<?php echo $getleft['cat_name'];?>"><?php echo $getleft['cat_name'];?></a></div>
                                <?php
								$subq = $db->select_query('SELECT * FROM subcat WHERE cat_id = '.$getleft['cat_id']);
								while($subrs = $db->fetch($subq)){
								?>
								<span id="post_cat">
									<?php echo $subrs['sub_name'];?>
								</span> | 
								<?php
								}
								?>
                            </div>
                        </div>
              		<?php
					}
					?>                         
                    </div>
                    <div id="cat_right">
                    <?php
                    $leftq = $db->select_query('SELECT * FROM category LIMIT 17,33');  	
					while($getleft = $db->fetch($leftq)){
					?>
                    	<div id="category">
                            <div id="cat_img" class="ui-corner-all">
                            <img src="<?php echo WEB_URL.'/styles/images/category/'.$getleft['cat_img'];?>" title="<?php echo $getleft['cat_name'];?>" alt="<?php echo $getleft['cat_name'];?>" />
                            </div>
                            <div id="cat_title">
                                <div id="cat_header"><a href="?m=categories&p=categories&c=<?php echo $getleft['cat_name'];?>"><?php echo $getleft['cat_name'];?></a></div>
                                <?php
								$subq = $db->select_query('SELECT * FROM subcat WHERE cat_id = '.$getleft['cat_id']);
								while($subrs = $db->fetch($subq)){
								?>
								<span id="post_cat">
									<?php echo $subrs['sub_name'];?>
								</span> | 
								<?php
								}
								?>
                            </div>
                        </div>
              		<?php
					}
					?> 
                    </div>
               	<?php
				}else{
				?>
                	<div id="title"><h1>กรอกข้อมูลสำหรับลงประกาศ</h1></div>
                    <div class="clear"></div>
                	<form id="post_form" action="" method="post" enctype="multipart/form-data">
                	  <table width="630" cellspacing="2" cellpadding="5" border="0" align="center">
                	    <tbody>
                	      <tr>
                	        <td width="96" align="right">
                            	<strong>*  หมวดหมู่ :</strong>
                            </td>
                	        <td colspan="6">
                            	<strong>เครื่องสำอางค์ เสริมความงาม </strong>[ <a href="http://localhost/paitarad/addmainform.php">เปลี่ยนหมวดหมู่</a> ]
                           	</td>
              	          </tr>
                	      <tr>
                	        <td align="right" width="96">
                            	<strong>*  ประเภท:</strong>
                          	</td>
                	        <td colspan="6">
                                <select name="littletype">
                                  <option value="" selected="selected">เลือกประเภทย่อย</option>
                                  <option value="เครื่องสำอางค์">เครื่องสำอางค์</option> 
                                  <option value="น้ำหอม">น้ำหอม</option> 
                                  <option value="ครีม โลชั่น">ครีม โลชั่น</option> 
                                  <option value="เกี่ยวกับผิวหน้า">เกี่ยวกับผิวหน้า</option> 
                                  <option value="เกี่ยวกับผม">เกี่ยวกับผม</option> 
                                  <option value="เกี่ยวกับมือและเล็บ">เกี่ยวกับมือและเล็บ</option> 
                                  <option value="เกี่ยวกับความสะอาดร่างกาย">เกี่ยวกับความสะอาดร่างกาย</option> 
                                  <option value="เสริมความงาม" selected="selected">เสริมความงาม</option> 
                                  <option value="อื่นๆ">อื่นๆ</option> 
                              </select>
                            	<div align="right"></div>
                           	</td>
               	          </tr>
                	      <tr>
                	        <td align="right"><strong> * หัวข้อ :</strong></td>
                	        <td colspan="6"><input type="text" name="topic2" size="55" align="middle" /></td>
              	        </tr>
                	      <tr>
                	        <td valign="top"><div align="right"><strong>*รายละเอียด :</strong><br />
              	          </div></td>
                	        <td colspan="6" valign="top"><textarea name="detail2" rows="15" cols="60"></textarea></td>
              	        </tr>
                	      <tr>
                	        <td align="right"><strong>  รูปภาพ :</strong></td>
                	        <td colspan="6"><strong>โพสรูปได้เฉพาะสมาชิกเท่านั้นค่ะ</strong></td>
              	        </tr>
                	      <tr>
                	        <td align="right" width="96">
                            	<strong>* ต้องการ :</strong>
                           	</td>
                	        <td colspan="6">
                                <select name="status">
                                    <option selected="selected">เลือกความต้องการ</option>
                                    <option value="ประกาศ">ประกาศ</option>
                                    <option value="ขาย">ขาย</option>
                                    <option value="ซื้อ">ซื้อ</option>
                                    <option value="ถาม">ถาม</option>
                                    <option value="แจกฟรี">แจกฟรี</option>
                                    <option value="ว่าจ้าง">ว่าจ้าง</option>
                                    <option value="รับจ้าง">รับจ้าง</option>
                                    <option value="ให้เช่า">ให้เช่า</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                           	</td>
               	          </tr>
                	      <tr>
                	        <td align="right" width="96"><strong>เวบไซต์ :</strong></td>
                	        <td colspan="6"><input name="links" type="text" value="http://" size="40" align="middle" /></td>
              	        </tr>
                	      <tr>
                	        <td align="right"><strong>*</strong><strong> ราคา:</strong></td>
                	        <td width="61"><div align="right">
                	          <input name="price" type="radio" id="sure_price" value="sure_price" checked="checked" />
              	          </div>
               	            <label for="sure_price"></label></td>
                	        <td width="98"><div align="left">ราคาแน่นอน</div></td>
                	        <td><div align="right">ราคา</div></td>
                	        <td><input type="text" name="real_price" id="real_price" size="10"/></td>
                	        <td colspan="2"><label for="real_price"></label></td>
               	          </tr>
                	      <tr>
                	        <td align="right">&nbsp;</td>
                	        <td><div align="right">
                	          <input type="radio" name="price" id="rank_price" value="rank_price" />
              	          </div>
               	            <label for="rank_price"></label></td>
                	        <td><div align="left">ราคาไม่แน่นอน</div></td>
                	        <td width="45"><div align="right">ระหว่าง</div></td>
                	        <td width="18"><label for="start_price"></label>
               	            <input type="text" name="start_price" id="start_price" size="10" /></td>
                	        <td width="87"><div align="right">ถึง</div></td>
                	        <td><label for="end_price"></label>
               	            <input type="text" name="end_price" id="end_price" size="10" /></td>
              	          </tr>
                	      <tr>
                	        <td align="right" width="96"><strong>  สภาพ :</strong></td>
                	        <td colspan="2">
                            	<input type="radio" name="statusproduct" value="ของใหม่" checked="checked" /> ของใหม่ 
               	          	</td>
                	        <td colspan="4"><div align="left">
                	          <input type="radio" name="statusproduct" value="ของมือสอง" />
                	          ของมือสอง <br />
              	          </div></td>
               	          </tr>
                	      <tr>
                	        <td align="right" valign="top"><strong>  วิธีส่งของ :</strong></td>
                	        <td colspan="2"><input type="radio" name="send" value="ทางพัสดุไปรษณีย์" checked="checked" />
ทางพัสดุไปรษณีย์ </td>
                	        <td colspan="4"><input type="radio" name="send" value="แล้วแต่ตกลง" />
แล้วแต่ตกลง </td>
               	          </tr>
                	      <tr>
                	        <td align="right" valign="top">&nbsp;</td>
                	        <td colspan="2"><input type="radio" name="send" value="นัดดูสินค้า" />
               	            นัดดูสินค้า </td>
                	        <td colspan="4"><input type="radio" name="send" value="วิธีอื่น" />
วิธีอื่น </td>
               	          </tr>
                	      <tr>
                	        <td align="right" width="96"><strong>* จำนวน :</strong></td>
                	        <td colspan="2"><input type="text" name="email" size="20" maxlength="30" title=" > 0" /></td>
                	        <td colspan="3"><div align="right"><strong>หยุดแสดงเมื่อสินค้าหมด:</strong> </div>
               	            <label for="disable_post"></label><div align="right"></div></td>
                	        <td width="144"><input type="checkbox" name="disable_post" id="disable_post" /></td>
              	          </tr>
                	      <tr>
                	        <td align="right" valign="top"><strong>คำค้นหา :</strong></td>
                	        <td colspan="6"><table width="100%" cellpadding="0">
                	          <tbody>
                	            <tr>
                	              <td width="28%"><input name="key1" type="text" id="key1" /></td>
                	              <td width="28%"><input name="key2" type="text" id="key2" /></td>
                	              <td width="44%"><input name="key3" type="text" id="key3" /></td>
              	              </tr>
                	            <tr>
                	              <td><input name="key4" type="text" id="key4" /></td>
                	              <td><input name="key5" type="text" id="key5" /></td>
                	              <td><input name="key6" type="text" id="key6" /></td>
              	              </tr>
              	            </tbody>
              	          </table></td>
              	        </tr>
                	      <tr>
                	        <td colspan="7" align="right" valign="top"><table width="650" border="0" cellspacing="2" cellpadding="5">
                	          <tr>
                	            <td colspan="5"><strong>ข้อมูลผู้ประลงประกาศ</strong></td>
              	            </tr>
                	          <tr>
                	            <td width="106"><div align="right"><strong>Username</strong> :</div></td>
                	            <td colspan="2"><div align="left">
                	              <input type="text" name="user" size="20" maxlength="50" value="" title="เฉพาะสมาชิก" />
              	              </div></td>
                	            <td width="110" align="center"><div align="right"><strong>Password :</strong></div></td>
                	            <td width="212" align="center"><div align="left">
                	              <input type="password" name="pwd" size="20" maxlength="50" value="" />
              	              </div></td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong>ชื่อผู้ประกาศ:</strong></div></td>
                	            <td colspan="2"><div align="left">
                	              <input name="name" type="text" value="" size="20" maxlength="100" />
              	              </div></td>
                	            <td align="center"><div align="right"><strong>ชื่อร้านค้า :</strong></div></td>
                	            <td align="center"><div align="left"><strong>
                	              <input type="text" name="store_name2" id="store_name2" />
              	              </strong></div></td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong>*ที่อยู่ :</strong></div></td>
                	            <td colspan="2"><div align="left">
                	              <input type="text" name="contact" size="20" />
              	              </div></td>
                	            <td><div align="right"><strong>ตำบล/แขวง:</strong></div></td>
                	            <td><div align="left">
                	              <input type="text" name="tumbon2" id="tumbon" />
              	              </div></td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong>อำเภอ :</strong></div></td>
                	            <td colspan="2"><div align="left">
                	              <input type="text" name="district2" id="district2" />
              	              </div></td>
                	            <td><div align="right"><strong>  * จังหวัด:</strong></div></td>
                	            <td><div align="left">
                	              <select name="city">
                	                <option value="" selected="selected">เลือกจังหวัด</option>
                	                <option value="กระบี่">กระบี่ </option>
                	                <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                	                <option value="กาญจนบุรี">กาญจนบุรี </option>
                	                <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                	                <option value="กำแพงเพชร">กำแพงเพชร </option>
                	                <option value="ขอนแก่น">ขอนแก่น</option>
                	                <option value="จันทบุรี">จันทบุรี</option>
                	                <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                	                <option value="ชัยนาท">ชัยนาท </option>
                	                <option value="ชัยภูมิ">ชัยภูมิ </option>
                	                <option value="ชุมพร">ชุมพร </option>
                	                <option value="ชลบุรี">ชลบุรี </option>
                	                <option value="เชียงใหม่">เชียงใหม่ </option>
                	                <option value="เชียงราย">เชียงราย </option>
                	                <option value="ตรัง">ตรัง </option>
                	                <option value="ตราด">ตราด </option>
                	                <option value="ตาก">ตาก </option>
                	                <option value="นครนายก">นครนายก </option>
                	                <option value="นครปฐม">นครปฐม </option>
                	                <option value="นครพนม">นครพนม </option>
                	                <option value="นครราชสีมา">นครราชสีมา </option>
                	                <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                	                <option value="นครสวรรค์">นครสวรรค์ </option>
                	                <option value="นราธิวาส">นราธิวาส </option>
                	                <option value="น่าน">น่าน </option>
                	                <option value="นนทบุรี">นนทบุรี </option>
                	                <option value="บุรีรัมย์">บุรีรัมย์</option>
                	                <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                	                <option value="ปทุมธานี">ปทุมธานี </option>
                	                <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                	                <option value="ปัตตานี">ปัตตานี </option>
                	                <option value="พะเยา">พะเยา </option>
                	                <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                	                <option value="พังงา">พังงา </option>
                	                <option value="พิจิตร">พิจิตร </option>
                	                <option value="พิษณุโลก">พิษณุโลก </option>
                	                <option value="เพชรบุรี">เพชรบุรี </option>
                	                <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                	                <option value="แพร่">แพร่ </option>
                	                <option value="พัทลุง">พัทลุง </option>
                	                <option value="ภูเก็ต">ภูเก็ต </option>
                	                <option value="มหาสารคาม">มหาสารคาม </option>
                	                <option value="มุกดาหาร">มุกดาหาร </option>
                	                <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                	                <option value="ยโสธร">ยโสธร </option>
                	                <option value="ยะลา">ยะลา </option>
                	                <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                	                <option value="ระนอง">ระนอง </option>
                	                <option value="ระยอง">ระยอง </option>
                	                <option value="ราชบุรี">ราชบุรี</option>
                	                <option value="ลพบุรี">ลพบุรี </option>
                	                <option value="ลำปาง">ลำปาง </option>
                	                <option value="ลำพูน">ลำพูน </option>
                	                <option value="เลย">เลย </option>
                	                <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                	                <option value="สกลนคร">สกลนคร</option>
                	                <option value="สงขลา">สงขลา </option>
                	                <option value="สมุทรสาคร">สมุทรสาคร </option>
                	                <option value="สมุทรปราการ">สมุทรปราการ </option>
                	                <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                	                <option value="สระแก้ว">สระแก้ว </option>
                	                <option value="สระบุรี">สระบุรี </option>
                	                <option value="สิงห์บุรี">สิงห์บุรี </option>
                	                <option value="สุโขทัย">สุโขทัย </option>
                	                <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                	                <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                	                <option value="สุรินทร์">สุรินทร์ </option>
                	                <option value="สตูล">สตูล </option>
                	                <option value="หนองคาย">หนองคาย </option>
                	                <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                	                <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                	                <option value="อุดรธานี">อุดรธานี </option>
                	                <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                	                <option value="อุทัยธานี">อุทัยธานี </option>
                	                <option value="อุบลราชธานี">อุบลราชธานี</option>
                	                <option value="อ่างทอง">อ่างทอง </option>
                	                <option value="อื่นๆ">อื่นๆ</option>
              	                </select>
              	              </div></td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong>* ไปรษณีย์:</strong></div></td>
                	            <td colspan="2"><div align="left">
                	              <input name="postcode" type="text" id="postcode" maxlength="5" />
              	              </div></td>
                	            <td><div align="right"><strong>* มือถือ:</strong></div></td>
                	            <td><div align="left">
                	              <input type="text" name="mobile" size="20" maxlength="50" />
              	              </div></td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong>เบอร์ร้าน :</strong></div></td>
                	            <td colspan="2"><div align="left">
                	              <input type="text" name="tel" size="20" maxlength="50" />
              	              </div></td>
                	            <td><div align="right"><strong>Fax :</strong></div></td>
                	            <td><div align="left">
                	              <input type="text" name="fax2" size="20" maxlength="50" />
              	              </div></td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong>* Security code:</strong></div></td>
                	            <td width="80"><div align="left"><strong><img src="http://localhost/paitarad/chars/51.gif" alt="" /><img src="http://localhost/paitarad/chars/52.gif" alt="" /><img src="http://localhost/paitarad/chars/49.gif" alt="" /><img src="http://localhost/paitarad/chars/55.gif" alt="" /><img src="http://localhost/paitarad/chars/53.gif" alt="" /><img src="http://localhost/paitarad/chars/57.gif" alt="" /></strong></div></td>
                	            <td width="80"><input name="simage2" type="text" size="7" /></td>
                	            <td><div align="left">กรอกรหัสที่เห็น</div></td>
                	            <td><div align="left"></div></td>
              	            </tr>
                	          <tr>
                	            <td>&nbsp;</td>
                	            <td colspan="4"><input type="submit" value="Submit" name="submit2" />
                	              <input type="reset" value="Reset" name="reset2" /></td>
              	            </tr>
              	          </table></td>
               	          </tr>
              	        </tbody>
              	    </table>
                	</form>
                <?php
				}
				?>
                </div>
                <div id="wrap_bottom_right">
                	<div id="ads_160x600_1"></div>
                    <div id="ads_160x600_2"></div>
                    <div id="left_ads_125x125">
                    	<div id="left_125">
                        	<span id="left_125_box">
                        		<div id="left_125_img"></div>
                        	</span>
                            <span id="left_125_box">
                        		<div id="left_125_img"></div>
                        	</span>
                            <span id="left_125_box">
                        		<div id="left_125_img"></div>
                        	</span>
                            <span id="left_125_box">
                        		<div id="left_125_img"></div>
                        	</span>
                        </div>
                        <div id="right_125">
                        	<span id="left_125_box">
                        		<div id="left_125_img"></div>
                        	</span>
                            <span id="left_125_box">
                        		<div id="left_125_img"></div>
                        	</span>
                            <span id="left_125_box">
                        		<div id="left_125_img"></div>
                        	</span>
                            <span id="left_125_box">
                        		<div id="left_125_img"></div>
                        	</span>
                        </div>
                    	
                        
                    </div>
                </div>
            </div>
        </div>
        
        <?php require_once('../footer.php');?>
        
    </div>
</body>
</html>