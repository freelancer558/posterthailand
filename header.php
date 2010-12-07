<div class="header">
    <div id="header_top">
        <div id="logo">
            <a href="#">Poster Thailand Logo</a>
        </div>
        <div id="header_ads">                	 
            <div id="ads_728x90">
            </div>
        </div>
    </div>
    <div id="header_bottom">
        <div id="menu">
            <a id="post_here" href="<?php echo WEB_URL;?>/products/?m=post&p=select_cat" title="ลงประกาศฟรีที่นี่" alt="ลงประกาศฟรีที่นี่">
                <div></div>
            </a>
            <ul id="header_right_menu">
                <li class="ui-corner-top"><a href="<?php echo WEB_URL;?>/index.php">หน้าหลัก</a></li>
                <li class="ui-corner-top"><a href="<?php echo WEB_URL;?>/products/?m=categories&p=showcat">หมวดหมู่สินค้า</a></li>
                <li class="ui-corner-top"><a href="#">ติดต่อ PosterThailand</a></li>                        
            </ul>
            <!--<span id="logined">สวัสดีค่ะ <?php echo $_SESSION['usr'];?></span>-->                                      
            <ul id="header_left_menu">
            <?php
            	if(isset($_SESSION['usr'])){
			?>
            	<li class="ui-corner-top"><a href="<?php echo WEB_URL;?>/members/?m=register&p=register">ข้อมูลส่วนตัว</a></li>
                <li class="ui-corner-top"><a href="<?php echo WEB_URL;?>/members/?m=login&p=logout">ออกจากระบบ</a></li>
            <?php		
				}else{
			?>
            	<li class="ui-corner-top"><a href="<?php echo WEB_URL;?>/members/?m=register&p=register">สมัครสมาชิก</a></li>
                <li class="ui-corner-top"><a href="<?php echo WEB_URL;?>/members/?m=login&p=login">เข้าสู่ระบบ</a></li>
            <?php	
				}
			?>                    	
               
            </ul>
            
        </div>
    </div>
</div>