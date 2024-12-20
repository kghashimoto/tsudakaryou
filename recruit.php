<?php
/*
Template Name: 求人
 */
?>
<?php
get_header();
the_content();

// カスタム投稿タイプとタクソノミーのスラッグ
$custom_post_type = 'recruit';
$taxonomy = 'recruit_category';

// タクソノミーの全タームを取得
$terms = get_terms( array(
    'taxonomy' => $taxonomy,
    'hide_empty' => true, // 投稿が紐付いているタームのみ取得
    'orderby' => 'name',  // タームを名前順に並べる
) );

if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    echo '<div class="recruit_category_box">';
    // ターム一覧を表示
    $flag =1;
    foreach ( $terms as $term ) {
		?>
<div id="button_<?php echo esc_html($term->slug); ?>" class="button_recruit <?php if($flag==1){echo 'active'; $flag=0;} ?>">
<?php echo esc_html($term->name); ?>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('button_<?php echo esc_html($term->slug); ?>');
    button.addEventListener('click', function() {
        // 全ての要素を非表示
        const allCategories = document.querySelectorAll('.recruit_category');
        allCategories.forEach(function(category) {
            category.style.display = 'none';
        });

        // 特定のクラスを持つ要素を表示
        const specificCategories = document.querySelectorAll('.<?php echo esc_html($term->slug); ?>');
        specificCategories.forEach(function(category) {
            category.style.display = 'block';
        });
		
		const deActiveButtons = document.querySelectorAll('.button_recruit');
		deActiveButtons.forEach(function(button){
			
			button.classList.remove("active");
		})
		
		const activeButton = document.getElementById('button_<?php echo esc_html($term->slug); ?>');
		activeButton.classList.add("active");
    });
});
</script>


<?php
    }
    echo '</div>';

	
	$flag =1;
	$flag_content='';
    // 各タームに紐づく投稿を表示
    foreach ( $terms as $term ) {
		if($flag==1){
			$flag=0;
			$flag_content = '';	
		}else{
			$flag_content='display:none';
		}
echo '<div class="anchor_links recruit_category '.esc_html( $term->slug ).'" style="'.$flag_content.'">'; // カテゴリー名を表示

        // タームに紐づく投稿を取得
        $query = new WP_Query( array(
            'post_type' => $custom_post_type,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
),
            ),
            'posts_per_page' => -1, // 全ての投稿を取得

        ) );

        if ( $query->have_posts() ) {
			
            echo '<ul>';
            while ( $query->have_posts() ) {
                $query->the_post();
?>
<a href="#<?php global $post; echo $post->post_name; ?>" class="anchor_link"><?php the_title(); ?></a>



<?php  }
            echo '</ul></div>';
        } else {
            echo '<p>このカテゴリーに紐づく投稿はありません。</p></div>';
        }

        // 投稿データをリセット
        wp_reset_postdata();
    }	
	
	
	
	
	$flag =1;
	$flag_content='';
    // 各タームに紐づく投稿を表示
    foreach ( $terms as $term ) {
		if($flag==1){
			$flag=0;
			$flag_content = '';	
		}else{
			$flag_content='display:none';
		}
echo '<div class="recruit_category ', esc_html( $term->slug ) ,'" style="'.$flag_content.'">'; // カテゴリー名を表示

        // タームに紐づく投稿を取得
        $query = new WP_Query( array(
            'post_type' => $custom_post_type,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ),
            ),
            'posts_per_page' => -1, // 全ての投稿を取得
        ) );

        if ( $query->have_posts() ) {
			
            echo '<ul>';
            while ( $query->have_posts() ) {
                $query->the_post();
?>
<h2 id="<?php global $post; echo $post->post_name; ?>"><?php the_title(); ?></h2><table border="0" cellspacing="0" cellpadding="0">
<tr><th>仕事内容</th>
<td colspan="3"><?php the_field('仕事内容'); ?></td>
</tr>
	<tr>
<th>雇用形態</th>
<td><?php the_field('雇用形態'); ?></td>
<th>雇用期間</th>
<td><?php the_field('雇用期間'); ?></td>
</tr>
<tr>
<th>必要な免許・資格</th>
<td colspan="3"><?php the_field('必要な免許・資格'); ?></td>
</tr>
<tr>
<th>給与</th>
<td><?php the_field('給与'); ?></td>
<th>通勤手当</th>
<td><?php the_field('通勤手当') ?></td>
</tr>
<tr>
<th>昇給</th>
<td><?php the_field('昇給'); ?></td>
<th>賞与</th>
<td><?php the_field('賞与'); ?></td>
</tr>
<tr>
<th>加入保険等</th>
<td colspan="3"><?php the_field('加入保険等') ?></td>
</tr>
<tr>
<th>就業期間</th>
<td><?php the_field('就業期間'); ?></td>
<th>休日</th>
<td><?php the_field('休日'); ?></td>
</tr>
<?php if(mb_strlen(get_field('特記事項'))>1){ ?>
<tr>
<th>特記事項</th>
<td colspan="3"><?php the_field('特記事項'); ?></td>
</tr>
<?php } ?>

</table>




<?php  }
            echo '</ul></div>';
        } else {
            echo '<p>このカテゴリーに紐づく投稿はありません。</p></div>';
        }

        // 投稿データをリセット
        wp_reset_postdata();
    }
} else {
    echo '<p>カテゴリーが見つかりませんでした。</p>';
}
?>
<br><br><br><br>
<?php
get_footer();
?>
<style>
	.recruit_category_box{
		display:flex;
		
	}
	.recruit_category_box > div{
		flex:1;
		text-align:center;
		padding:10px;
		color:#8cc63e;
		border:solid 1px rgba(0,0,0,0.2);
		border-radius:8px 8px 0 0;
		font-weight:600;
		cursor:pointer;
		
	}
	.recruit_category_box > .active{
		background:#8cc63e;
		color:white;
	}

	.anchor_link{
		display:inline-block;
		margin-right:12px;
		position:relative;
	}
	.anchor_link:before{
		content:"ｖ";
		display:inline-block;
		color:#8cc63e;
		font-weight:600;
		padding:2px;
		transform:scaleX(1.5);
		text-decoration:none;
		margin-right:-1px;
	}
	
	h2{
		border:none;
		margin:0;
		padding:4px;
		font-size:1rem;
	}


	table{
border-spacing: 2px;
    border-collapse: collapse;
		border:none;

	}
	td,th{
		border:1px solid #8cc63e;
		padding:4px;
		font-size:0.875rem;
	}
	table th{
		width:140px;
		background:#ebf6dc;
		color:#679429;
	}

</style>
