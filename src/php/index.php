<?php get_header(); ?>
<main>
  <div class="site-header__spacer"></div>
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
          echo '<div class="photo-grid__photo photo-grid__photo--portrait" data-modal-open="photo-viewer" data-title="'.$portrait_posts[$i]->post_title.'" data-photo="'.get_the_post_thumbnail_url($id, 'full').'">
                  <img class="photo-grid__image" src="'.get_the_post_thumbnail_url($id, array(210, 316)).'" srcset="'.get_the_post_thumbnail_url($id, array(420, 632)).' 2x" />
                </div>';
          
        }
        if ($landscape_posts_count > $i) {
          $id = $landscape_posts[$i]->ID;
          echo '<div class="photo-grid__photo photo-grid__photo--landscape" data-modal-open="photo-viewer" data-title="'.$landscape_posts[$i]->post_title.'" data-photo="'.get_the_post_thumbnail_url($id, 'full').'">';
          echo '<img class="photo-grid__image" src="'.get_the_post_thumbnail_url($id, array(436, 300)).'" srcset="'.get_the_post_thumbnail_url($id, array(872, 600)).' 2x" />';
          echo '</div>';
          
        }
      }
    ?>
  </section>

  <section class="grid">
    <?php
      $video_args = array(
        'tag' => 'Video',
        'numberposts' => -1
      );
      $video_posts = get_posts($video_args);
      $video_posts_count = count($video_posts);
      for ($i = 0; $i < $video_posts_count; $i++) {
        $id = $video_posts[$i]->ID;
        echo '<div class="grid__item grid__item--full grid__item--video" data-title="'.htmlentities($video_posts[$i]->post_title).'" data-modal-open="video-player" data-video="'.get_post_meta($id, 'vimeo_id', true).'">';
        echo '<img class="grid__image" src="'.get_the_post_thumbnail_url($id, array(1356, 450)).'" srcset="'.get_the_post_thumbnail_url($id, array(2712, 900)).' 2x" />';
        echo '</div>';
      }
    ?>
  </section>

  <div class="overlay" data-overlay></div>
  <div class="modal modal--video-player" data-modal="video-player">
    <button class="modal__close" type="button" data-modal-close aria-label="Close Video Modal"><i class="fa fa-close"></i></button>
    <div class="modal__video" id="modal-video"></div>
  </div>
  <div class="modal modal--photo-viewer" data-modal="photo-viewer">
    <button class="modal__close" data-modal-close aria-label="Close Photo Modal"><i class="fa fa-close"></i></button>
    <picture class="modal__photo" id="modal-photo">
      <!-- <source media="" srcset="" />
      <img src="" srcset="" alt="" /> -->
    </picture>
  </div>
</main>
<?php get_footer(); ?>