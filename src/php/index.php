<?php get_header(); ?>
<main>

  <section class="fullscreen">
    <picture class="fullscreen__bg">
      <img class="fullscreen__bg-image" src="<?php echo get_theme_mod('index_desktop_bg'); ?>">
    </picture>

    <div class="fullscreen__content">
      <h1>KYLE BENSON</h1>
      <h2>video editor | videographer | film photography</h2>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <p><a href="mailto:kyle@bensonkmedia.com" title="email">Email</a></p>
      <p><a href="tel:8185234412" title="Phone">Phone</a></p>
      <p><a href="https://www.instagram.com/bensonk_media/" target="_blank" title="Instagram">bensonk_media</a></p>
    </div>
  </section>

  <section class="photo-grid">
    <?php
      $portrait_args = array(
        'tag' => 'portrait',
        'numberposts' => -1
      );
      $portrait_posts = get_posts($portrait_args);
      
      $landscape_args = array(
        'tag' => 'landscape',
        'numberposts' => -1
      );
      $landscape_posts = get_posts($landscape_args);
      
      $portrait_posts_count = count($portrait_posts);
      $landscape_posts_count = count($landscape_posts);
      $max_post_count = ($portrait_posts_count <= $landscape_posts_count) ? $landscape_posts_count : $portrait_posts_count;

      for ($i = 0; $i < $max_post_count; $i++) {
        if ($portrait_posts_count > $i) {
          $id = $portrait_posts[$i]->ID;
          echo '<div data-title="'.$portrait_posts[$i]->post_title.'">
                  <img src="'.get_the_post_thumbnail_url($id, array(210, 316)).'" srcset="'.get_the_post_thumbnail_url($id, array(420, 632)).' 2x" />
                </div>';
          
        }
        if ($landscape_posts_count > $i) {
          $id = $landscape_posts[$i]->ID;
          echo '<div data-title="'.$landscape_posts[$i]->post_title.'">';
          echo '<img src="'.get_the_post_thumbnail_url($id, array(436, 300)).'" srcset="'.get_the_post_thumbnail_url($id, array(872, 600)).' 2x" />';
          echo '</div>';
          
        }
      }
    ?>
  </section>
</main>
<?php get_footer(); ?>