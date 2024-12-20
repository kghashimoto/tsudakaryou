<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php the_title(); ?></title>

<?php
add_action( 'wp_enqueue_scripts', function(){
  wp_enqueue_style( 'common_page', get_template_directory_uri() . '/css/common.css',array(),'1' );
} );

add_action( 'wp_enqueue_scripts', function(){
  wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css',array(),'1' );
} );
	
add_action( 'wp_enqueue_scripts', function(){
  wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css',array(),'1' );
} );
?>

<?php wp_head(); ?>
</head>
<body>
	<div class="back" <?php if(!is_front_page()){ ?>style="height:90px;"<?php } ?>> 
		
	</div>
    <header>
		<div class="header_top"><p>寿恵会 津高寮｜岡山市北区津高の特別養護老人ホーム デイサービス ショートステイ</p>
			<div class="header_top_right">

		<ul>
<li><a href="#">サイトマップ</a></li>
<li><a href="#">交通アクセス</a></li>
</ul></div>
    　</div>
    
    <div class="header_main">
     <a href="/" class="logo">
	<img src="<?php echo get_template_directory_uri(); ?>/img/title_logo.gif" alt="社会福祉法人寿恵会　津高寮">
     </a>
    
     <div>
    電話でのお問い合わせは<div class="green_circle">→</div><a href="tel:086-252-1100"><span>TEL.</span>086-252-1100</a>
    
     </div>
    
    </div>
    <div class="thumbnail">
	  <img src="<?php echo get_the_post_thumbnail_url(); ?>">
	</div> 

                <nav class="global_nav">
                   <?php wp_nav_menu(array('theme_location' => 'pc-navi',
										  'link_before' =>'<span></span>'
										  )); ?>
                </nav>
    </header>

