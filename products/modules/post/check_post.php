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
<link rel="stylesheet" href="<?php echo WEB_URL;?>/styles/galleriffic.css" type="text/css" />


<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery-ui-1.8rc2.custom.min.js"></script>

<!-- Script Plugin -->
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.jqtransform.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.checkbox.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.hint.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.galleriffic.js"></script>
<script type="text/javascript" src="<?php echo WEB_URL;?>/scripts/jquery/jquery.opacityrollover.js"></script>

<!-- We only want the thunbnails to display when javascript is disabled -->
<script type="text/javascript">
	document.write('<style>.noscript { display: none; }</style>');
</script>

<script type="text/javascript">
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker
var infowindow; // กำหนดตัวแปรสำหรับเก็บตัว popup แสดงรายละเอียดสถานที่
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น

function initialize() { // ฟังก์ชันแสดงแผนที่
	GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	// กำหนดจุดเริ่มต้นของแผนที่
	var my_Latlng  = new GGM.LatLng(<?php echo $_POST['la_value'];?>,<?php echo $_POST['lo_value'];?>);
	var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
	// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
	var my_DivObj=$("#map_canvas")[0]; 
	// กำหนด Option ของแผนที่
	var myOptions = {
		zoom: <?php echo $_POST['zoom_value'];?>, // กำหนดขนาดการ zoom
		center: my_Latlng , // กำหนดจุดกึ่งกลาง
		mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
	};
	map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
	
	my_Marker = new GGM.Marker({ // สร้างตัว marker
		position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
		map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
//		draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
		title:'<?php echo $_POST['topic'];?> '// แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
	});
    
	infowindow = new GGM.InfoWindow({
		content:''
	});
	
	// กำหนด event ให้กับตัว marker เมื่อคลิกที่ตัว marker ให้แสดง infowindows
	GGM.event.addListener(my_Marker, 'click', function() {
		infowindow.open(map,my_Marker); // ให้แสดง infowindows รายละเอียดสถานที่ ทุกครั้งที่โหลดแผนที่แล้ว 

	});		

	// กำหนด event ให้กับตัวแผนที่ เมื่อส่วนของแผนที่ทำการโหลดเรียบร้อยแล้ว
	GGM.event.addListener(map, 'tilesloaded', function() {
		infowindow.open(map,my_Marker); // ให้แสดง infowindows รายละเอียดสถานที่ ทุกครั้งที่โหลดแผนที่แล้ว 

	});



}
$(function(){
	// โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
	// ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
	// v=3.2&sensor=false&language=th&callback=initialize
	//	v เวอร์ชัน่ 3.2
	//	sensor กำหนดให้สามารถแสดงตำแหน่งที่เปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
	//	language ภาษา th ,en เป็นต้น
	//	callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
	$("<script/>", {
	  "type": "text/javascript",
	  src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
	}).appendTo("body");	
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
                           
                </div>
                <div id="wrap_top_right">
                	<div id="sub_title">มาเป็นเพื่อนกันนะค่ะ</div>
                    <div class="clear"></div>
                    <p>อย่าลืมมาเป็นเพื่อนกับ <strong>โพสเตอร์ไทยแลนด์</strong> บนเฟสบุ๊ค และทวิตเตอร์นะค่ะ  อาจจะมีสินค้าที่ท่านกำลังมองหาอยู่มาลงประกาศก็ได้ คลิ๊กเลย</p>
                    <div class="clear" style="border:none;"></div>
					<a href="http://www.facebook.com/poster.thailand">
                    	<img src="<?php echo WEB_URL;?>/styles/images/facebook_32.png" align="absmiddle" alt="มาเป็นเพื่อนกันบนเฟสบุ๊ค" title="มาเป็นเพื่อนกันบนเฟสบุ๊ค" />
                    </a>
                    <a href="http://twitter.com/posterthailand">
                    	<img src="<?php echo WEB_URL;?>/styles/images/twitter_32.png"  align="absmiddle" alt="มาเป็นเพื่อนกันบนทิตเตอร์" title="มาเป็นเพื่อนกันบนทิตเตอร์" /> 
                    </a>
                </div>
            </div>
            
            <div id="title"><h1>&nbsp;&nbsp;ตรวจสอบประกาศ</h1></div>
            <div class="clear"></div>
            
            <h1 class="product_title">
           		<?php echo $_POST['topic'];?>        
         	</h1>
            
            <div class="clear" style="width:98%;margin:0 auto;"></div>
            
            <div id="wrap_bottom">
            	<div id="product_detail">
                    <div id="product_detail_left">
                   		<div id="show_img">
                            <div id="gallery" class="content_img">
                                <div class="slideshow-container">
                                    <div id="loading" class="loader"></div>
                                    <div id="slideshow" class="slideshow"></div>
                                </div>
                            </div>
                            <div id="thumbs" class="navigation">
                                <ul class="thumbs noscript">
                                <?php
									foreach($_POST['img'] as $img){
										echo '<li>
                                        <a class="thumb" name="'.$img.'"  href="../uploads/'.$img.'">
                                            <img src="../uploads/'.$img.'" alt="'.$img.'" />
                                        </a>                                        
                                    	</li>';
									}
								?>
                                </ul>
                            </div>
                            
                        </div>
                        <div id="show_detail">
                            <div id="pdetail"><div>วันที่ลงประกาศ : </div><?php echo date('d-m-Y',time());?></div>
                            <div id="pdetail"><div>ชื่อผู้ประกาศ : </div><?php echo $_POST['poster_name'];?></div>
                            <div id="pdetail"><div>ความต้องการ : </div><?php echo $_POST['status'];?></div>
                            <div id="pdetail"><div>ติดต่อ : </div><?php echo $_POST['mobile'];?></div>
                            <div id="pdetail"><div>สภาพสินค้า : </div><?php echo $_POST['statusproduct'];?></div>
                            <div id="pdetail"><div>พื้นที่ขายสินค้า : </div><?php echo $_POST['p_place'];?></div>
                            <div id="pdetail"><div>ราคา : </div>	<?php ($_POST['price'] == 'sure_price') ? print $_POST['real_price'].' บาท': print $_POST['start_price'].' - '.$_POST['end_price'].' บาท';?>
                           	</div>
                            <div id="pdetail"><div>การรับประกัน : </div><?php ($_POST['warranty'] == 'no_warranty')? print 'ไม่มีประกัน' : print $_POST['w_year'].' ปี '.$_POST['w_month'].' เดือน';?>	
                           	</div> 
                            <div id="pdetail"><div>วิธีส่งสินค้า : </div><?php echo $_POST['send'];?></div>  
                        </div>
                    </div>
                    <div id="product_detail_right">
    					<div id="member_level"> Member/Gold/VIP</div>
                        <div id="fbshare">Facebook share</div>
                        <div id="twt_share">twitter</div>
                        <div id="report">แจ้งประกาศไม่เหมาะสม</div>                       
                        <div id="pid">รหัสสินค้า 12345678</div>
                    </div>
                </div>
                
                <div class="clear" style="width:98%;margin:10px auto;"></div>
                
            	<div id="wrap_bottom_left">
                
               		<div class="titleFontMini">
                <h2>
                    รายละเอียดการประกาศโฆษณา</h2>
                <div class="bgDetail">
                	<?php echo stripslashes($_POST['jw']);?>    
               	<div class="clear"></div>
                </div>
            </div>
            
                </div>
                <div id="wrap_bottom_right" style="background-color:white;">

                    <div id="map_canvas"></div>
                    
                    <div class="clear" style="border:none;"></div>
                    
                    <div id="sub_title">ติดต่อเจ้าของสินค้า</div>
                    <div class="clear"></div>
                    	<div id="show_detail" style="float:left; padding:5px;">
                            <div id="pdetail"><div>ชื่อผู้ติดต่อ :</div> <?php echo $_POST['poster_name'];?></div>
                            <div id="pdetail"><div>ชื่อร้าน / บริษัท :</div><?php echo $_POST['store_name'];?></div>
                            <div id="pdetail"><div>ที่อยู่ :</div> <?php echo $_POST['address'];?></div>
                            <div id="pdetail"><div>ตำบล/แขวง :</div> <?php echo $_POST['tumbon'];?></div>
                            <div id="pdetail"><div>อำเภอ/เขต :</div> <?php echo $_POST['amphur'];?></div>
                            <div id="pdetail"><div>จังหวัด :</div> <?php echo $_POST['province'];?></div>
                            <div id="pdetail"><div>รหัสไปรษณีย์ :</div> <?php echo $_POST['postcode'];?></div>
                            <div id="pdetail"><div>มือถือ :</div> <?php echo $_POST['mobile'];?></div>
                            <div id="pdetail"><div>อีเมล์ :</div> <?php echo $_SESSION['email'];?></div>
                        </div>
                   
					<div class="clear" style="border:none;"></div>
                    
                    <div id="sub_title">รายละเอียดเพิ่มเติม</div>
                    <div class="clear"></div>
                    	<div id="show_detail"  style="float:left;  padding:5px;">
                            <div id="pdetail"><div>เว็บไซต์ :</div> <?php echo $_POST['links'];?></div>
                            <div id="pdetail"><div>วันที่ลงประกาศ :</div> <?php echo date('d M Y');?></div>
                            <div id="pdetail"><div>วันสิ้นสุดประกาศ :</div> <?php echo date("d M Y",strtotime('+'.$_POST['period'].' months')); echo $_POST['period'];?></div>
                            <div id="pdetail"><div>แก้ไขประกาศล่าสุด :</div> ยังไม่ได้แก้ไข</div>
                            <div id="pdetail"><div>เลื่อนอันดับประกาศ :</div> ยังไม่ได้เลื่อนประกาศ</div>
							<div id="pdetail"><div>TAGS :</div> 
							<?php 
								$first_loop = false;
								foreach($_POST['tag'] as $tag){ 
								
									if($first_loop){
										echo ','.$tag;
									}else{
										echo $tag;
									}
									
									$first_loop = true;
								}
							?>
                            </div>
                        </div>
                    <div class="clear"></div>
                    <div id="sub_title">คุณถูกใจโฆษณานี้ไหม?</div>
                    <div class="clear"></div>
                    <?php
                    	echo $rs['f340'];
					?>
                </div>
            </div>
            
        </div>
        
        <?php require_once('../footer.php');?>
        
    </div>
    
<script type="text/javascript">
  jQuery(document).ready(function($) {
	  // We only want these styles applied when javascript is enabled
	  $('div.navigation').css({'width' : '182px', 'float' : 'left','height':'280px'});
	  $('div.content_img').css('display', 'block');

	  // Initially set opacity on thumbs and add
	  // additional styling for hover effect on thumbs
	  var onMouseOutOpacity = 0.67;
	  $('#thumbs ul.thumbs li').opacityrollover({
		  mouseOutOpacity:   onMouseOutOpacity,
		  mouseOverOpacity:  1.0,
		  fadeSpeed:         'fast',
		  exemptionSelector: '.selected'
	  });
	  
	  // Initialize Advanced Galleriffic Gallery
	  var gallery = $('#thumbs').galleriffic({
		  delay:                     2500,
		  numThumbs:                 15,
		  preloadAhead:              10,
		  enableTopPager:            true,
		  enableBottomPager:         true,
		  maxPagesToShow:            7,
		  imageContainerSel:         '#slideshow',
		  loadingContainerSel:       '#loading',
		  renderSSControls:          true,
		  renderNavControls:         true,
		  enableHistory:             false,
		  autoStart:                 false,
		  syncTransitions:           true,
		  defaultTransitionDuration: 900,
		  onSlideChange:             function(prevIndex, nextIndex) {
			  // 'this' refers to the gallery, which is an extension of $('#thumbs')
			  this.find('ul.thumbs').children()
				  .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
				  .eq(nextIndex).fadeTo('fast', 1.0);
		  },
		  onPageTransitionOut:       function(callback) {
			  this.fadeTo('fast', 0.0, callback);
		  },
		  onPageTransitionIn:        function() {
			  this.fadeTo('fast', 1.0);
		  }
	  });
  });
</script>
</body>
</html>