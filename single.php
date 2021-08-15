<!DOCTYPE html>
<html lang="en">

<head>

<?php get_header(); ?>

</head>

<body>

  <?php get_template_part('includes/header'); ?>

  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

      <!-- Page Header -->
      <?php
      if (has_post_thumbnail()):
        $id = get_post_thumbnail_id(); //投稿のアイキャッチ画像が設定されている場合はアイキャッチ画像のIDを返す
        $img = wp_get_attachment_image_src($id, 'large'); //wp_get_attachment_image_src 添付された画像を取り出す
      else:
        $img = array(get_template_directory_uri(). '/img/post-bg.jpg');
      endif;
      ?>
      <header class="masthead" style="background-image: url('<?php echo $img[0]; //配列[0]で画像のpathだけを取り出す ?>')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-heading">
                <h1><?php the_title(); ?></h1>
                <span class="meta">Posted by
                  <?php the_author(); ?>
                  on <?php the_date(); //<?php the_time(get_option('date_format'));でも良いが投稿が一件のみなので ?></span>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Post Content -->
      <article>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </article>

      <hr>

    <?php endwhile; ?>
  <?php endif; //バグの回避のためなのでelse文は省略 ?>

  <?php get_template_part('includes/footer'); ?>

  <?php get_footer(); ?>

</body>

</html>
