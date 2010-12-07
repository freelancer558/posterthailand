<?php 
	$site_url = 'http://localhost/posterthailand/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Poster Thailand</title>
<link href="<?php echo $site_url;?>styles/style.css" rel="stylesheet" />
<link href="<?php echo $site_url;?>styles/ads.css" rel="stylesheet" />
<link type="text/css" href="<?php echo $site_url;?>styles/ui-lightness/jquery-ui-1.8rc2.custom.css" rel="stylesheet" />

<!-- StyleSheet Plugin-->
<link type="text/css" href="<?php echo $site_url;?>styles/jqtransform.css" rel="stylesheet" />
<link type="text/css" href="<?php echo $site_url;?>styles/jquery.checkbox.css" rel="stylesheet" />


<script type="text/javascript" src="<?php echo $site_url;?>scripts/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $site_url;?>scripts/jquery/jquery-ui-1.8rc2.custom.min.js"></script>

<!-- Script Plugin -->
<script type="text/javascript" src="<?php echo $site_url;?>scripts/jquery/jquery.jqtransform.js"></script>
<script type="text/javascript" src="<?php echo $site_url;?>scripts/jquery/jquery.checkbox.min.js"></script>
<script type="text/javascript" src="<?php echo $site_url;?>scripts/jquery/jquery.hint.js"></script>

<script type="text/javascript">
$(function(){

	$('input').hint();
		
	$('form').jqTransform({imgPath:'<?php echo $site_url;?>styles/images/jqtransform/'});

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
                    	<li><a href="?m=categories&p=categories&c=<?php echo $r['cat_name'];?>">&raquo; <?php echo $r['cat_name'];?></a></li>                   	                      
					<?php
					}
					echo '</ul>';
					?>
                    <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FPosterthailand-fanpage%2F178290318853273&amp;width=230&amp;colorscheme=light&amp;connections=6&amp;stream=false&amp;header=true&amp;height=287" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:230px; height:287px;" allowTransparency="true"></iframe>
                </div>
            </div>
            

            
            <div id="wrap_bottom">
            	<div id="wrap_bottom_left">
                	<div id="title"><h1>ประกาศล่าสุดของหมวด <?php echo $_GET['c'];?></h1></div>
                    <div class="clear"></div>
                    <div id="post" class="even">
                    	<div id="post_img"></div>
                        <div id="post_title">
                        	<div id="post_header">Sale PlayStation 2 Low Price  <span id="price">฿ 2500.-</span></div>
                            <span id="post_cat">Category :  <a href="#">Game</a></span> | <span id="post_dat"> Date Poste : 20-11-10</span>
        
                        </div>
                    </div>
                 	<div id="dot"></div>
                    <div id="post">
                    	<div id="post_img"></div>
                        <div id="post_title">
                        	<div id="post_header">Sale PlayStation 2 Low Price  <span id="price">฿ 2500.-</span></div>
                            <span id="post_cat">Category :  Game</span> | <span id="post_dat"> Date Poste : 20-11-10</span>
                          
                        </div>
                    </div>
                    <div id="dot"></div>
                    <div id="post" class="even">
                    	<div id="post_img"></div>
                        <div id="post_title">
                        	<div id="post_header">Sale PlayStation 2 Low Price  <span id="price">฿ 2500.-</span></div>
                            <span id="post_cat">Category :  Game</span> | <span id="post_dat"> Date Poste : 20-11-10</span>
                        
                        </div>
                    </div>
                    <div id="dot"></div>
                    <div id="post">
                    	<div id="post_img"></div>
                        <div id="post_title">
                        	<div id="post_header">Sale PlayStation 2 Low Price  <span id="price">฿ 2500.-</span></div>
                            <span id="post_cat">Category :  Game</span> | <span id="post_dat"> Date Poste : 20-11-10</span>
                         
                        </div>
                    </div>
                    <div id="dot"></div>
                    <div id="post" class="even">
                    	<div id="post_img"></div>
                        <div id="post_title">
                        	<div id="post_header">Sale PlayStation 2 Low Price  <span id="price">฿ 2500.-</span></div>
                            <span id="post_cat">Category :  Game</span> | <span id="post_dat"> Date Poste : 20-11-10</span>
                          
                        </div>
                    </div>
                    <div id="dot"></div>
                    
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