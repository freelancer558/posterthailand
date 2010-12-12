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
<link rel="stylesheet" href="<?php echo WEB_URL;?>/styles/jwysiwyg/jquery.wysiwyg.css" type="text/css" />
<link rel="stylesheet" href="<?php echo WEB_URL;?>/styles/jwysiwyg/jquery.wysiwyg.modal.css" type="text/css" />
<link rel="stylesheet" href="<?php echo WEB_URL;?>/styles/jwysiwyg/jquery.simplemodal.css" type="text/css" />
<link type="text/css" href="<?php echo  WEB_URL;?>/styles/vtip.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo  WEB_URL;?>/styles/validationEngine.jquery.css" type="text/css" media="screen"/>

<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery-ui-1.8rc2.custom.min.js"></script>

<!-- Script Plugin -->
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.jqtransform.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.checkbox.min.js"></script>
<script type="text/javascript" src="<?php echo  WEB_URL;?>/scripts/jquery/vtip.js"></script>
<script src="<?php echo  WEB_URL;?>/scripts/jquery/jquery.validationEngine-th.js" type="text/javascript"></script>
<script src="<?php echo  WEB_URL;?>/scripts/jquery/jquery.validationEngine.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jwysiwyg/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/captcha/jquery.realperson.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.bestupper.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.ajaxupload.3.5.js"></script>


<script type="text/javascript">
$(function(){
		
	$('form').jqTransform({imgPath:'<?php echo WEB_URL;?>/styles/images/jqtransform/'});

 	$('input:checkbox:not([safari])').checkbox();
	
  	$('input:radio').checkbox();

	$('#post_form').validationEngine();
	
	$('#p_detail').wysiwyg();
	
	$('#captcha').realperson();
	
	$('#sure_price').click(function(){
		if($(this).attr('checked') == false){
			$('#real_price').attr({'disabled':'','class':'validate[required]'});
			$('#start_price').attr({'disabled':'disabled','class':''});
			$('#end_price').attr({'disabled':'disabled','class':''});
		}
	});
	
	$('#rank_price').click(function(){
		if($(this).attr('checked') == false){
			$('#real_price').attr({'disabled':'disabled','class':''});
			$('#start_price').attr({'disabled':'','class':'validate[required]'});
			$('#end_price').attr({'disabled':'','class':'validate[required]'});
		}
	});
	
	$('#has_warranty').click(function(){
		if($(this).attr('checked') == false){
			$('#w_year').attr({'disabled':'','class':'validate[required]'});
			$('#w_month').attr({'disabled':'','class':'validate[required]'});
		}
	});
	
	$('#no_warranty').click(function(){
		if($(this).attr('checked') == false){
			$('#w_year').attr({'disabled':'disabled','class':''});
			$('#w_month').attr({'disabled':'disabled','class':''});
		}
	});
	
	$('#submit').click(function(){
	
		$.ajax({
			type: "POST",
			url: "../query.php",
			data: {checkcaptcha:true, captcha:$('#captcha').val(), chash:$('.realperson-hash').val()},
			dataType: 'json',
			beforeSend: function(x){$('#loading').html('<img src="../styles/images/loading.gif"/>');},
			success: function(msg){	
				if(msg.status == false){
				
					$('#loading').html('<p id="warning">กรอก Security code ไม่ถูกต้องค่ะ!</p>');
					$('#post_form').submit(function(){
						return false;
					});					
					
				}else{
					$('#loading').html('<img src="../styles/images/tick.png" width="32"/>');
					return true;
				}
								
			}			   
		});
	
	});
	
	$('#captcha').blur(function(){
		if($(this).val() == ''){
			$('#loading').html('');
		}else{
			$.ajax({
				type: "POST",
				url: "../query.php",
				data: {checkcaptcha:true, captcha:$('#captcha').val(), chash:$('.realperson-hash').val()},
				dataType: 'json',
				beforeSend: function(x){$('#loading').html('<img src="../styles/images/loading.gif"/>');},
				success: function(msg){	
					if(msg.status == false){
					
						$('#loading').html('<p id="warning">กรอก Security code ไม่ถูกต้องค่ะ!</p>');
						$('#post_form').submit(function(){
							return false;
						});					
						
					}else{
						$('#loading').html('<img src="../styles/images/tick.png" width="32"/>');
						$('#post_form').submit();
					}
									
				}			   
			});
		}
	});
	
	$('#captcha').bestupper(); 
	
	
	var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '../upload-file.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				//On completion clear the status
				status.text('');
				//Add uploaded file to list
				var imgstatus = response.split(',');
				
				if(imgstatus[0]==="success"){
					$('<li></li>').appendTo('#files').html('<img src="../uploads/'+imgstatus[1]+'" alt="" /><input type="hidden" name="img[]" value="'+imgstatus[1]+'"/>').addClass('success');
				} else{
					$('<li></li>').appendTo('#files').text(imgstatus[1]).addClass('error');
				}
			}
		});
	
});
</script>

<script type="text/javascript">
var geocoder; // กำหนดตัวแปรสำหรับ เก็บ Geocoder Object ใช้แปลงชื่อสถานที่เป็นพิกัด
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
function initialize() { // ฟังก์ชันแสดงแผนที่
	GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	geocoder = new GGM.Geocoder(); // เก็บตัวแปร google.maps.Geocoder Object
	// กำหนดจุดเริ่มต้นของแผนที่
	var my_Latlng  = new GGM.LatLng(13.75672590660421, 100.52215560546877);
	var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
	// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
	var my_DivObj=$("#map_canvas")[0];
	// กำหนด Option ของแผนที่
	var myOptions = {
		zoom: 8, // กำหนดขนาดการ zoom
		center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
		mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
	};
	map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
	
	my_Marker = new GGM.Marker({ // สร้างตัว marker ไว้ในตัวแปร my_Marker
		position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
		map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
		draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
		title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
	});
	
	// กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร	
	GGM.event.addListener(my_Marker, 'dragend', function() {
		var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
        map.panTo(my_Point); // ให้แผนที่แสดงไปที่ตัว marker		
        $("#la_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
        $("#lo_value").val(my_Point.lng());  // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
        $("#zoom_value").val(map.getZoom());  // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu			
		//alert(my_Point+'==='+map.getZoom());
	});		

	// กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
	GGM.event.addListener(map, 'zoom_changed', function() {
		$("#zoom_value").val(map.getZoom());   // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value 	
	});

}
/*
$(function(){
	// ส่วนของฟังก์ชันค้นหาชื่อสถานที่ในแผนที่
	var searchPlace=function(){ // ฟังก์ชัน สำหรับคันหาสถานที่ ชื่อ searchPlace
		var AddressSearch=$("#namePlace").val();// เอาค่าจาก textbox ที่กรอกมาไว้ในตัวแปร
		if(geocoder){ // ตรวจสอบว่าถ้ามี Geocoder Object 
			geocoder.geocode({
				 address: AddressSearch // ให้ส่งชื่อสถานที่ไปค้นหา
			},function(results, status){ // ส่งกลับการค้นหาเป็นผลลัพธ์ และสถานะ
      			if(status == GGM.GeocoderStatus.OK) { // ตรวจสอบสถานะ ถ้าหากเจอ
					var my_Point=results[0].geometry.location; // เอาผลลัพธ์ของพิกัด มาเก็บไว้ที่ตัวแปร
					map.setCenter(my_Point); // กำหนดจุดกลางของแผนที่ไปที่ พิกัดผลลัพธ์
					my_Marker.setMap(map); // กำหนดตัว marker ให้ใช้กับแผนที่ชื่อ map					
					my_Marker.setPosition(my_Point); // กำหนดตำแหน่งของตัว marker เท่ากับ พิกัดผลลัพธ์
					$("#lat_value").val(my_Point.lat());  // เอาค่า latitude พิกัดผลลัพธ์ แสดงใน textbox id=lat_value
					$("#lon_value").val(my_Point.lng());  // เอาค่า longitude พิกัดผลลัพธ์ แสดงใน textbox id=lon_value 
					$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu	 							
				}else{
					// ค้นหาไม่พบแสดงข้อความแจ้ง
					alert("Geocode was not successful for the following reason: " + status);
					$("#namePlace").val("");// กำหนดค่า textbox id=namePlace ให้ว่างสำหรับค้นหาใหม่
				 }
			});
		}		
	}
	$("#SearchPlace").click(function(){ // เมื่อคลิกที่ปุ่ม id=SearchPlace ให้ทำงานฟังก์ฃันค้นหาสถานที่
		searchPlace();	// ฟังก์ฃันค้นหาสถานที่
	});
	$("#namePlace").keyup(function(event){ // เมื่อพิมพ์คำค้นหาในกล่องค้นหา
		if(event.keyCode==13){	// 	ตรวจสอบปุ่มถ้ากด ถ้าเป็นปุ่ม Enter ให้เรียกฟังก์ชันค้นหาสถานที่
			searchPlace();		// ฟังก์ฃันค้นหาสถานที่
		}		
	});

});
*/
$(function(){
	// โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
	// ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
	// v=3.2&sensor=false&language=th&callback=initialize
	//	v เวอร์ชัน่ 3.2
	//	sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
	//	language ภาษา th ,en เป็นต้น
	//	callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize	
	$("<script/>", {
	  "type": "text/javascript",
	  src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
	}).appendTo("body");	
});
</script>

<style type="text/css">
@import "<?php echo WEB_URL;?>/styles/captcha/jquery.realperson.css";
	label { display: inline-block; width: 20%; }
	.realperson-challenge { display: inline-block;}
	.realperson-text{ color:#CCC;}
	.jqTransformSafari .jqTransformInputInner div{margin:0px 2px;}
</style>
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
                    
                    <div class="clear" style="margin-left:15px;"></div>
                    
                    <div id="ads_300x240px">
                    	<span id="ads_300x240_1"></span>
                    	<span id="ads_300x240_2"></span>
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
                    
                                        
                    <div id="suggest_ads">
                    	<div id="title"><h1>ประกาศตำแหน่งแนะนำ</h1></div>
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
                	<div id="sub_title">หมวดหมู่สินค้า</div>
                    <div class="clear"></div>
                	<?php
                    $q = $db->select_query('SELECT * FROM '._CATEGORY); 
					
					echo '<ul class="catlist">';					
					while ($r = $db->fetch($q)) { 
					?>					
                    	<li><a href="#">&raquo; <?php echo $r['cat_name'];?></a></li>                   	                      
					<?php
					}
					echo '</ul>';
					?>
                    <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FPosterthailand-fanpage%2F178290318853273&amp;width=230&amp;colorscheme=light&amp;connections=6&amp;stream=false&amp;header=true&amp;height=287" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:230px; height:287px;" allowTransparency="true"></iframe>
                </div>
            </div>
            
            <div id="wrap_bottom">
            	<div id="wrap_bottom_left">
                <?php
                if(!isset($_GET['c'])){
				?>
                	<div id="title"><h1>เลือกหมวดหมู่สำหรับลงประกาศ</h1></div>
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
                                <div id="cat_header"><a href="?m=post&p=select_cat&c=<?php echo $getleft['cat_name'];?>"><?php echo $getleft['cat_name'];?></a></div>
                                <?php
								$subq = $db->select_query('SELECT * FROM subcat WHERE cat_id = '.$getleft['cat_id']);
								while($subrs = $db->fetch($subq)){
								?>
								<span id="post_cat">
									<a href="?m=post&p=select_cat&c=<?php echo $getleft['cat_name'];?>&sc=<?php echo $subrs['sub_name'];?>" title="<?php echo $subrs['sub_name'];?>">
										<?php echo $subrs['sub_name'];?>
									</a>
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
                                <div id="cat_header"><a href="?m=post&p=select_cat&c=<?php echo $getleft['cat_name'];?>"><?php echo $getleft['cat_name'];?></a></div>
                                <?php
								$subq = $db->select_query('SELECT * FROM subcat WHERE cat_id = '.$getleft['cat_id']);
								while($subrs = $db->fetch($subq)){
								?>
								<span id="post_cat">
									<a href="?m=post&p=select_cat&c=<?php echo $getleft['cat_name'];?>&sc=<?php echo $subrs['sub_name'];?>" title="<?php echo $subrs['sub_name'];?>">
										<?php echo $subrs['sub_name'];?>
									</a>
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
                	<form id="post_form" action="?m=post&p=check_post" method="post" enctype="multipart/form-data">
                	  <table width="630" cellspacing="2" cellpadding="5" border="0" align="center">
                	    <tbody>
                	      <tr>
                	        <td width="96" align="right">
                            	<strong><span style="color:red;">*</span>หมวดหมู่:</strong>
                            </td>
                	        <td colspan="6">
                                <?php
                                	$catq = $db->select_query('SELECT * FROM category WHERE cat_name ="'.$_GET['c'].'"');
									$rs = $db->fetch($catq);
								?>
                            	<strong><span id="selectcat" value="<?php echo $rs['cat_id'];?>"><?php echo $_GET['c'];?></span></strong> [ <a href="<?php echo WEB_URL;?>/products/?m=post&p=select_cat">เปลี่ยนหมวดหมู่</a> ]
								<input type="hidden" name="cat_name" id="cat_name" value="<?php echo $rs['cat_id'].','.$_GET['c'];?>" />
                           	</td>
              	          </tr>
                	      <tr>
                	        <td align="right" width="96">
                            	<strong><span style="color:red;">*</span>ประเภท:</strong>
                          	</td>
                	        <td colspan="6">
                            <?php
							if(!isset($_GET['sc'])){
                                $getsubcat = $db->select_query('SELECT * FROM subcat WHERE cat_id = '.$rs['cat_id']);
	
								$msg = '<select name="subcat" id="subcat">';
								while($rs = $db->fetch($getsubcat)){
									$msg .= '<option value="'.$rs['sub_id'].','.$rs['sub_name'].'">'.$rs['sub_name'].'</option>';
								}
								$msg .= '</select>';
								echo $msg;
							}else{
								echo '<strong>'.$_GET['sc'].'</strong>';
								echo '<input type="hidden" name="subcat" id="subcat" value="'.$_GET['sc'].'"/>';
							}
							?>
                           	</td>
               	          </tr>
                          <tr>
                	        <td align="right"><strong><span style="color:red;">*</span>สถานที่ขายสินค้า:</strong></td>
                	        <td colspan="6">
                            	<input type="text" name="p_place" id="p_place" size="55" align="middle" title="สถานที่ ที่ท่านขายสินค้า" class="vtip validate[required]" />
                           	</td>
              	        </tr>
                	      <tr>
                	        <td align="right"><strong><span style="color:red;">*</span>หัวข้อ:</strong></td>
                	        <td colspan="6"><input type="text" name="topic" id="topic" size="55" align="middle"  title="หัวข้อของประกาศ" class="vtip validate[required]" /></td>
              	        </tr>
                	      <tr>
                	        <td valign="top"><div align="right"><strong><span style="color:red;">*</span>รายละเอียด:</strong><br />
              	          </div></td>
                	        <td colspan="6" valign="top">
                            <textarea name="jw" id="p_detail" rows="15" cols="72"></textarea>
                            </td>
              	        </tr>
                	      <tr>
                	        <td align="right" valign="top"><strong>  รูปภาพ:</strong></td>
                	        <td colspan="6">
                           	  <div id="upload" ><span>อัพโหลดรูป</span></div><span id="status" ></span>
								<ul id="files" ></ul>
                            </td>
              	        </tr>
                	      <tr>
                	        <td align="right" width="96">
                            	<strong><span style="color:red;">*</span>ต้องการ:</strong>
                           	</td>
                	        <td colspan="6">
                                <select name="status" id="status">
                                    <option value>เลือกความต้องการ</option>
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
                	        <td align="right" width="96"><strong>เวบไซต์:</strong></td>
                	        <td colspan="6"><input name="links" type="text" value="http://" size="40" align="middle"  title="เว็บไซต์ที่เกี่ยวข้องกับสินค้า" class="vtip" /></td>
              	        </tr>
                         <tr>
                	        <td align="right"><span style="color:red;">*</span><strong>รับประกัน:</strong></td>
                	        <td width="61"><div align="right">
                	          <input type="radio" name="warranty" id="no_warranty" value="no_warranty" checked="checked" />
              	          </div>
               	            </td>
                	        <td width="98"><div align="left">ไม่มีประกัน</div></td>
                	        <td colspan="4"></td>
               	          </tr>
                	      <tr>
                	        <td align="right">&nbsp;</td>
                	        <td><div align="right">
                	          <input type="radio" name="warranty" id="has_warranty" value="has_warranty" />
              	          </div>
               	            </td>
                	        <td><div align="left">มีประกัน</div></td>
                	        <td width="45"><div align="right">ปี:</div></td>
                	        <td width="18">
               	            <input type="text" name="w_year" id="w_year" size="10" disabled="disabled"/></td>
                	        <td width="87"><div align="right">เดือน:</div></td>
                	        <td>
               	            <input type="text" name="w_month" id="w_month" size="10" disabled="disabled"/></td>
              	          </tr>
                	      <tr>
                	        <td align="right"><span style="color:red;">*</span><strong>ราคา:</strong></td>
                	        <td width="61"><div align="right">
                	          <input name="price" type="radio" id="sure_price" value="sure_price" checked="checked" />
              	          </div>
               	            <label for="sure_price"></label></td>
                	        <td width="98"><div align="left">ราคาแน่นอน</div></td>
                	        <td><div align="right">ราคา:</div></td>
                	        <td><input type="text" name="real_price" id="real_price" size="10" class="validate[required]"/></td>
                	        <td colspan="2"><label for="real_price"></label></td>
               	          </tr>
                	      <tr>
                	        <td align="right">&nbsp;</td>
                	        <td><div align="right">
                	          <input type="radio" name="price" id="rank_price" value="rank_price" />
              	          </div>
               	            <label for="rank_price"></label></td>
                	        <td><div align="left">ราคาไม่แน่นอน</div></td>
                	        <td width="45"><div align="right">ระหว่าง:</div></td>
                	        <td width="18"><label for="start_price"></label>
               	            <input type="text" name="start_price" id="start_price" size="10" disabled="disabled"/></td>
                	        <td width="87"><div align="right">ถึง:</div></td>
                	        <td><label for="end_price"></label>
               	            <input type="text" name="end_price" id="end_price" size="10" disabled="disabled"/></td>
              	          </tr>
                	      <tr>
                	        <td align="right" width="96"><strong>สภาพ:</strong></td>
                	        <td colspan="2">
                            	<input type="radio" name="statusproduct" value="ของใหม่" checked="checked" /> ของใหม่ 
               	          	</td>
                	        <td colspan="4"><div align="left">
                	          <input type="radio" name="statusproduct" value="ของมือสอง" />
                	          ของมือสอง <br />
              	          </div></td>
               	          </tr>
                	      <tr>
                	        <td align="right" valign="top"><strong>วิธีส่งของ:</strong></td>
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
                	        <td align="right" width="96"><strong>จำนวน:</strong></td>
                	        <td colspan="2"><input type="text" name="p_among" size="20" maxlength="30"  title="ใส่จำนวนสินค้า" class="vtip" value="0" /></td>
                	        <td colspan="3"><div align="right"><strong>หยุดแสดงเมื่อสินค้าหมด:</strong> </div>
               	            <label for="disable_post"></label><div align="right"></div></td>
                	        <td width="144"><input type="checkbox" name="disable_post" id="disable_post" /></td>
              	          </tr>
                          <tr>
                	        <td align="right" width="96"><strong><span style="color:red;">*</span>เวลาของประกาศ:</strong></td>
                	        <td colspan="6">
                              <div align="left">
                                <select name="period" id="period">
                                  <option value>ไม่มีวันหมดอายุ</option>
                                  <option value="1">1 เดือน</option>
                                  <option value="3">3 เดือน</option>
                                  <option value="6">6 เดือน</option>
                                  <option value="12">12 เดือน</option>
                                </select>
                            </div></td>
               	          </tr>
                	      <tr>
                	        <td align="right" valign="top"><strong>คำค้นหา:</strong></td>
                	        <td colspan="6"><table width="100%" cellpadding="0">
                	          <tbody>
                	            <tr>
                	              <td width="28%"><input name="tag[]" type="text" /></td>
                	              <td width="28%"><input name="tag[]" type="text" /></td>
                	              <td width="44%"><input name="tag[]" type="text" /></td>
              	              </tr>
                	            <tr>
                	              <td><input name="tag[]" type="text" /></td>
                	              <td><input name="tag[]" type="text" /></td>
                	              <td><input name="tag[]" type="text" /></td>
              	              </tr>
              	            </tbody>
              	          </table></td>
              	        </tr>
                        <tr>
                	        <td colspan="7" align="right" valign="top">
                            <div id="sub_title">
                              <div align="left">แผนที่ของสถานที่ขายสินค้า</div>
                            </div>
                           	  <div id="map_canvas" style="width: 650px; height: 300px; position: relative; background-color: rgb(229, 227, 223); "></div>                            
                            </td>
               	          </tr>
                	      <tr>
                	        <td colspan="7" align="right" valign="top"><table width="650" border="0" cellspacing="2" cellpadding="5">
                	          <tr>
                	            <td colspan="4"><div id="sub_title">ข้อมูลผู้ประลงประกาศ</div></td>
                                <?php
                                	$getm = $db->select_query('SELECT * FROM members WHERE username = "'.$_SESSION['usr'].'"');
									$mrs = $db->fetch($getm);
								?>
              	            </tr>
                	          <tr>
                	            <td width="106"><div align="right"><strong>Username</strong> :</div></td>
                	            <td>
                                	<div align="left"><?php echo $mrs['username'];?></div>
                              	</td>
                	            <td width="110"><div align="right"><strong><span style="color:red;">*</span>ชื่อผู้ประกาศ:</strong></div></td>
                	            <td width="212">
                                	<div align="left"> 
										<?php echo $mrs['poster_name'];?>
                                   	</div>
                                    <input type="hidden" name="poster_name" id="poster_name" value="<?php echo $mrs['poster_name'];?>" />
                               	</td>
               	              </tr>
                	          <tr>
                	            <td><div align="right"><strong>ชื่อร้านค้า :</strong></div></td>
                	            <td colspan="3"><div align="left"><strong>
                	              <?php
                                    	empty($mrs['company_name'])? print '<input type="text" name="store_name" id="store_name"  title="ชื่อร้านค้าที่ขายสินค้านี้อยู่ หรือชื่อร้านที่ผู้เข้าชมสามารถติดต่อได้สะดวก" class="vtip" size="55"/>' : print $mrs['company_name'];
									?>
              	              </strong></div></td>
               	              </tr>
                	          <tr>
                	            <td>
                                	<div align="right"><strong><span style="color:red;">*</span>ที่อยู่ :</strong></div>
                               	</td>
                	            <td>
                                	<div align="left">
                                    <?php
                                    	empty($mrs['address'])?print'<input type="text" name="address" id="address" size="20" class="validate[required]"/>':print $mrs['address'];
									?>
              	              		</div>
                               	</td>
                	            <td><div align="right"><strong><span style="color:red;">*</span>ตำบล/แขวง:</strong></div></td>
                	            <td>
                                	<div align="left">
                                    <?php
                                    	empty($mrs['bumcon'])? print '<input type="text" name="tumbon" id="tumbon" class="validate[required]"/>': print $mrs['tumbon'];
									?>
              	              		</div>
                              	</td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong><span style="color:red;">*</span>อำเภอ :</strong></div></td>
                	            <td>
                                	<div align="left">
                                    <?php
                                    	empty($mrs['amphur']) ? print '<input type="text" name="amphur" id="amphur" class="validate[required]"/>': print $mrs['amphur'];
									?>
              	              		</div>
                              	</td>
                	            <td><div align="right"><strong><span style="color:red;">*</span>จังหวัด:</strong></div></td>
                	            <td>
                                	<div align="left">
                                    <?php
										$province_list = '
										<select name="province" id="province">
											<option value>เลือกจังหวัด</option>
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
										';
                                    	empty($mrs['province'])? print $province_list: print $mrs['province'];
									?>
                                      
              	              		</div>
                              	</td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong><span style="color:red;">*</span>ไปรษณีย์:</strong></div></td>
                	            <td>
                                	<div align="left">
                                    <?php
                                    	empty($mrs['postcode']) ? print '<input name="postcode" type="text" id="postcode" maxlength="5" class="validate[required]" />': print $mrs['postcode'];
									?>
              	              		</div>
                              	</td>
                	            <td><div align="right"><strong><span style="color:red;">*</span>มือถือ:</strong></div></td>
                	            <td>
                                	<div align="left">
                                    <?php
										empty($mrs['mobile_no'])? print '<input type="text" name="mobile" id="mobile" size="20" maxlength="50" class="validate[required]" />': print $mrs['mobile_no'];
                                    ?>	
              	              		</div>
                              	</td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong>เบอร์ร้าน :</strong></div></td>
                	            <td>
                                	<div align="left">
                	              	<?php
                                    	empty($mrs['phone'])? print '<input type="text" name="tel" size="20" maxlength="50" />': print $mrs['phone'];
									?>
              	              		</div>
                              	</td>
                	            <td><div align="right"><strong>Fax :</strong></div></td>
                	            <td>
                                	<div align="left">
                                    <?php
										empty($mrs['fax'])? print '<input type="text" name="fax2" size="20" maxlength="50" />': print $mrs['fax'];
                                    ?>
              	              		</div>
                              	</td>
              	            </tr>
                	          <tr>
                	            <td><div align="right"><strong><span style="color:red;">*</span>Security code:</strong></div></td>
                	            <td><input name="captcha" id="captcha" type="text"  maxlength="6" class="validate[required] vtip" title="กรอกข้อมูลตามตัวอักษรที่เห็นให้ถูกต้อง"/>                	              <div align="left"></div></td>
                	            <td colspan="2"><div id="loading"></div></td>
               	              </tr>
                	          <tr>
                	            <td>&nbsp;</td>
                	            <td colspan="3">
                                	<input type="hidden" name="la_value" id="la_value"/>
                                    <input type="hidden" name="lo_value" id="lo_value"/>
                                    <input type="hidden" name="zoom_value" id="zoom_value"/>
                                	<input type="submit" value="Submit" id="submit" name="submit" />
                	              	<input type="reset" value="Reset" name="reset" />
                                  </td>
              	            </tr>
              	          </table></td>
               	          </tr>
              	        </tbody>
              	    </table>
                	</form>
                	<a class="btn" href="http://www.think.co.th/think/?page_id=118"><span>ลงประกาศ</span></a>
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