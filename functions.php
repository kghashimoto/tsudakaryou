<?php remove_filter( 'the_content', 'wpautop' ); 

function menu_setup(){
 register_nav_menu('pc-navi','パソコン用のメニュー');

}

add_action( 'after_setup_theme', 'menu_setup' );


function edit_menu_link( $atts, $item) {
  // メニュー項目が「説明」を持っている場合
  if(!empty( $item->description )){
    // リンクにdata-desc属性を追加する
    $atts['data-desc'] = $item->description;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'edit_menu_link', 10, 2 );

function twpp_setup_theme() {
  add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'twpp_setup_theme' );