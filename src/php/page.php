<?php get_header(); ?>

<section id="page-<?php the_ID(); ?>" class="<?php echo join(' ', get_post_class('page')); ?>">

  <section class="page__header hero">
    <picture class="hero__bg">
      <?php 
        $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))
      ?>
      <source media="(min-width: 1901px)" srcset="<?php echo get_image($image) . ', '. get_image($image, false, false, 2) ?> 2x" />
      <source media="(min-width: 1601px)" srcset="<?php echo get_image($image, 1900) . ', '. get_image($image, 1900, false, 2) ?> 2x" />
      <source media="(min-width: 1441px)" srcset="<?php echo get_image($image, 1600) . ', '. get_image($image, 1600, false, 2) ?> 2x" />
      <source media="(min-width: 1201px)" srcset="<?php echo get_image($image, 1440) . ', '. get_image($image, 1440, false, 2) ?> 2x" />
      <source media="(min-width: 992px)" srcset="<?php echo get_image($image, 1200) . ', '. get_image($image, 1200, false, 2) ?> 2x" />
      <source media="(min-width: 769px)" srcset="<?php echo get_image($image, 991) . ', '. get_image($image, 991, false, 2) ?> 2x" />
      <source media="(min-width: 481px)" srcset="<?php echo get_image($image, 768) . ', '. get_image($image, 768, false, 2) ?> 2x" />
      <source media="(min-width: 421px)" srcset="<?php echo get_image($image, 480) . ', '. get_image($image, 480, false, 2) ?> 2x" />
      <source media="(min-width: 376px)" srcset="<?php echo get_image($image, 420) . ', '. get_image($image, 420, false, 2) ?> 2x" />
      <source media="" srcset="<?php echo get_image($image, 375) . ', '. get_image($image, 375, false, 2) ?> 2x" />
      <img class="hero__bg-image" src="<?php echo get_image($image, 1440); ?>" srcset="<?php echo get_image($image, 1440, false, 2); ?> 2x" alt="Kyle Benson - About me - photo" />
    </picture>
    <div class="hero__content hero__content--large">
      <h1 class="page__title hero__title"><?php the_title(); ?></h1>  
    </div>
  </section>

  <section class="page__section container--md container--pad-side-md rte">
    <?php
    if ( have_posts() ) { 
      while ( have_posts() ) : the_post();
        the_content();
      endwhile;
    }
    ?>
  </section>
</section>

<?php get_footer(); ?>