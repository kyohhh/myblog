<!DOCTYPE html>

<html <?php language_attributes(); //html要素のlang属性を出力
        ?>>

<head>

<?php get_header(); ?>

</head>

<body <?php body_class(); //bodyにclassを付与 ?>>

  <!-- Navigation -->
  <?php get_template_part('includes/header'); ?>

  <!-- Page Header -->
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
      <?php
        $eyecatch = get_eyecatch_with_defult();
      ?>
      <header class="masthead" style="background-image: url('<?php echo $eyecatch[0]; //配列[0]で画像のpathだけを取り出す ?>')">
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
