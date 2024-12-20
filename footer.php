<!--test -->
<footer>
<div>
<a href="#">>>決算書及び事業計画書及び社会福祉法人現状報告書</a><br>
<a href="#">>>求人情報</a>
<a href="#">>>プライバシーポリシー</a>
<a href="#">>>サイトのご利用について</a>
	</div>

<div class="copyright">
	Copyright &copy;寿恵会 All rights reserved.
</div>
</footer>

<?php wp_footer(); ?>

<style>
	.wp-block-button__link{
		background-color:rgba(0,0,0,0);
		padding:4px 24px 4px 20px;
		color:#222;
		border-radius:0;
		border:solid 1px #AAA;
		text-align:left;
		width:200px;
		position:relative;
		display:inline-block;
		text-decoration:none;
		font-size:0.9rem;
	}
	.wp-block-button__link:hover{
		text-decoration:none;
	}
	.wp-block-button__link:after{
		content:"";
		position:absolute;
		width:100%;
		height:10px;
		left:0;
		bottom:-10px;
		box-shadow:0 -10px 4px rgba(0,0,0,0.05);
		display:inline-block;
	}
	.wp-block-button{
		position:relative;
	}
	.wp-block-button:before{
		
		content:"";
		position:absolute;
		width:8px;
		height:100%;
		left:6px;
		background:<?php the_field('theme_color') ?>;
		z-index:1;
	}
	.wp-block-button:after{
		
		content:"";
		background-image:url(<?php echo get_template_directory_uri(); ?>/img/arrow_botttom.png);
		background-position:center;
		background-size:contain;
		position:absolute;
		width:17px;
		height:17px;
		right:16px;
		color:white;
		top:calc(50% - 8px);
		font-size:10px;
		font-weight:600;
		border-radius:10px;
		text-align:center;
		background-color:<?php the_field('theme_color') ?>;
	}
	h2{
		font-size:1rem;
		display:block;
		padding-top:6px;
		padding-bottom:6px;
		padding-left:10px;
		padding-right:10px;
		border-left:6px solid <?php the_field('theme_color') ?>;
		border-bottom:1px solid #BBB;
		margin-top:16px;
		margin-bottom:12px;
		color:#222;
	}
	h3{
		background:#eeeeee;
		color:#90c848;
		padding:8px 4px;
		box-shadow:1px 1px #90c848;
		margin:16px 0 12px 0;
		
	}
	h3:before{
		content:"◎";
	}
	h4{
		display:inline-block;
		width:96px;
		min-width:96px;
		padding:4px;
		color:white;
		font-weight:600;
		background-color:<?php the_field('theme_color'); ?>;
	}
	
	
</style>
</body>
</html>
