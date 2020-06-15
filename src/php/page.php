<?php get_header(); ?>

<section id="page-<?php the_ID(); ?>" class="container--md container--pad-side-md <?php echo join(' ', get_post_class('page')); ?>">

  <header class="page__header">
    <h1 class="page__title"><?php the_title(); ?></h1>
  </header>

  <section class="page__section">
    <?php
    if ( have_posts() ) { 
      while ( have_posts() ) : the_post();
        the_content();
      endwhile;
    }
    ?>
  </section>

  <footer class="page__footer"></footer>
</section>

<?php get_footer(); ?>