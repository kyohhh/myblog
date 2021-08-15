<?php
add_action('init', function(){
  add_theme_support('post-thumbnails');
}); //アイキャッチ画像のサポート追加

/* アイキャッチ画像がなければ、標準画像を取得する */
function get_eyecatch_with_defult() {
  if (has_post_thumbnail()):
    $id = get_post_thumbnail_id(); //投稿のアイキャッチ画像が設定されている場合はアイキャッチ画像のIDを返す
    $img = wp_get_attachment_image_src($id, 'large'); //wp_get_attachment_image_src 添付された画像を取り出す
  else:
    $img = array(get_template_directory_uri(). '/img/post-bg.jpg');
  endif;

  return $img;
}