<?php 
  get_header(); 

  $photo_args = array(
    'tag' => 'photo',
    'numberposts' => -1
  );
  $photo_posts = get_posts($photo_args);
  $photo_posts_count = count($photo_posts);

  $video_args = array(
    'tag' => 'Video',
    'numberposts' => -1
  );
  $video_posts = get_posts($video_args);
  $video_posts_count = count($video_posts);
?>
<section class="fullscreen hero">
  <picture class="fullscreen__bg hero__bg">
    <?php 
      $image = get_theme_mod('index_desktop_bg');
      $image_m = get_theme_mod('index_mobile_bg') ?? $image;
    ?>
    <source media="(min-width: 1901px)" srcset="<?php echo get_image($image) . ', '. get_image($image, false, false, 2) ?> 2x" />
    <source media="(min-width: 1601px)" srcset="<?php echo get_image($image, 1900) . ', '. get_image($image, 1900, false, 2) ?> 2x" />
    <source media="(min-width: 1441px)" srcset="<?php echo get_image($image, 1600) . ', '. get_image($image, 1600, false, 2) ?> 2x" />
    <source media="(min-width: 1201px)" srcset="<?php echo get_image($image, 1440) . ', '. get_image($image, 1440, false, 2) ?> 2x" />
    <source media="(min-width: 992px)" srcset="<?php echo get_image($image, 1200) . ', '. get_image($image, 1200, false, 2) ?> 2x" />
    <source media="(min-width: 769px)" srcset="<?php echo get_image($image, 991) . ', '. get_image($image, 991, false, 2) ?> 2x" />
    <source media="(min-width: 481px)" srcset="<?php echo get_image($image_m, 768) . ', '. get_image($image_m, 768, false, 2) ?> 2x" />
    <source media="(min-width: 421px)" srcset="<?php echo get_image($image_m, 480) . ', '. get_image($image_m, 480, false, 2) ?> 2x" />
    <source media="(min-width: 376px)" srcset="<?php echo get_image($image_m, 420) . ', '. get_image($image_m, 420, false, 2) ?> 2x" />
    <source media="" srcset="<?php echo get_image($image_m, 375) . ', '. get_image($image_m, 375, false, 2) ?> 2x" />
    <img class="fullscreen__bg-image hero__bg-image" src="<?php echo get_image($image, 1440); ?>" srcset="<?php echo get_image($image, 1440, false, 2); ?> 2x" alt="Kyle Benson - banner of San Diego sunset" />
  </picture>

  <div class="fullscreen__content hero__content">
    <h1 class="hero__title">KYLE BENSON</h1>
    <h2 class="hero__subtitle h3">video editor <span class="text-divider">|</span> videographer <span class="text-divider">|</span> film photography</h2>
    <p class="hero__text"><a class="hero__link" href="mailto:bensonk108@gmail.com" title="email"><i class="fa fa-envelope"></i> email</a></p>
    <p class="hero__text"><a class="hero__link" href="https://www.instagram.com/bensonk_media/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i> bensonk_media</a></p>
  </div>
</section>

<section class="grid vis-nav">
  <button class="vis-nav__btn" type="button" data-scroll="photos" aria-label="Move to Photos">
    <div class="vis-nav__content vis-nav__content--shift-up-right">
      <?php 
        $tile_1_image = get_theme_mod('index_tile1_img');
        $tile_2_image = get_theme_mod('index_tile2_img');
      ?>
      <img class="photo-grid__image" 
        src="<?php echo get_image($tile_1_image, 680, 380); ?>" 
        srcset="<?php echo get_image($tile_1_image, 680, 380); ?>, <?php echo get_image($tile_1_image, 680, 380, 2); ?> 2x"
       />
       <h3 class="vis-nav__title h2"><?php echo get_theme_mod('index_tile1_label') ?></h3>
     </div>
  </button>
  <button class="vis-nav__btn" type="button" data-scroll="videos" aria-label="Move to Videos">
    <div class="vis-nav__content vis-nav__content--shift-down-left">
      <img class="photo-grid__image" 
        src="<?php echo get_image($tile_2_image, 680, 380); ?>" 
        srcset="<?php echo get_image($tile_2_image, 680, 380); ?>, <?php echo get_image($tile_2_image, 680, 380, 2); ?> 2x"
       />
       <h3 class="vis-nav__title h2"><?php echo get_theme_mod('index_tile2_label') ?></h3>
     </div>
  </button>
</section>

<section class="photo-grid" id="photos">
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

    // for ($i = 0; $i < $max_post_count; $i++) {
    //   if ($portrait_posts_count > $i) {
    //     $id = $portrait_posts[$i]->ID;
    //     echo '<div class="photo-grid__photo photo-grid__photo--portrait" data-modal-open="photo-viewer" data-title="'.$portrait_posts[$i]->post_title.'" data-photo="'.get_the_post_thumbnail_url($id, 'full').'">';
    //     echo '<img class="photo-grid__image" src="'.get_the_post_thumbnail_url($id, 'portrait-1x').'" srcset="'.get_the_post_thumbnail_url($id, 'portrait-1x').', '.get_the_post_thumbnail_url($id, 'portrait-2x').' 2x" />';
    //     echo '</div>';
        
    //   }
    //   if ($landscape_posts_count > $i) {
    //     $id = $landscape_posts[$i]->ID;
    //     echo '<div class="photo-grid__photo photo-grid__photo--landscape" data-modal-open="photo-viewer" data-title="'.$landscape_posts[$i]->post_title.'" data-photo="'.get_the_post_thumbnail_url($id, 'full').'">';
    //     echo '<img class="photo-grid__image" src="'.get_the_post_thumbnail_url($id, 'landscape-1x').'" srcset="'.get_the_post_thumbnail_url($id, 'landscape-1x').', '.get_the_post_thumbnail_url($id, 'landscape-2x').' 2x" />';
    //     echo '</div>';
    //   }
    // }

    
    for ($i = 0; $i < $photo_posts_count; $i++) {
      $id = $photo_posts[$i]->ID;
      $tags = wp_get_post_tags($id);
      $mod_class = '';
      $thumbnail_size_1x = '';
      $thumbnail_size_2x = '';
      if (has_tag('portrait', $id)) {
        $mod_class = 'portrait';
        $thumbnail_size_1x = 'portrait-1x';
        $thumbnail_size_2x = 'portrait-2x';
      } else if (has_tag('landscape', $id)) {
        $mod_class = 'landscape';
        $thumbnail_size_1x = 'landscape-1x';
        $thumbnail_size_2x = 'landscape-2x';
      }

      echo '<div class="photo-grid__photo photo-grid__photo--'.$mod_class.'" data-modal-open="photo-viewer" data-title="'.$photo_posts[$i]->post_title.'" data-photo="'.get_the_post_thumbnail_url($id, 'full').'" data-photo-index="'.$i.'">';
      echo '<img class="photo-grid__image" src="'.get_the_post_thumbnail_url($id, $thumbnail_size_1x).'" srcset="'.get_the_post_thumbnail_url($id, $thumbnail_size_1x).', '.get_the_post_thumbnail_url($id, $thumbnail_size_2x).' 2x" />';
      echo '</div>';
    }
  ?>
</section>

<section class="grid" id="videos">
  <?php
    for ($i = 0; $i < $video_posts_count; $i++) {
      $id = $video_posts[$i]->ID;
      echo '<div class="grid__item grid__item--full grid__item--video" data-title="'.htmlentities($video_posts[$i]->post_title).'" data-modal-open="video-player" data-video="'.get_post_meta($id, 'vimeo_id', true).'">';
      echo '<img class="grid__image" src="'.get_the_post_thumbnail_url($id, array(1356, 450)).'" srcset="'.get_the_post_thumbnail_url($id, array(2712, 900)).' 2x" />';
      echo '</div>';
    }
  ?>
</section>

<div class="overlay" data-overlay></div>
<div class="modal modal--video-player" data-modal="video-player" id="modal-video-player">
  <button class="modal__close" type="button" data-modal-close aria-label="Close Video Modal"><i class="fa fa-close"></i></button>
  <div class="modal__video" id="modal-video"></div>
</div>
<div class="modal modal--photo-viewer" data-modal="photo-viewer" id="modal-photo-viewer">
  <button class="modal__close" data-modal-close aria-label="Close Photo Modal"><i class="fa fa-close"></i></button>
  <button class="modal__nav-arrow modal__nav-arrow--prev" data-photo-viewer-nav data-nav-dir="-1" type="button" aria-label="Prev Image"><i class="fa fa-chevron-left"></i></button>
  <button class="modal__nav-arrow modal__nav-arrow--next" data-photo-viewer-nav data-nav-dir="1" type="button" aria-label="Next Image"><i class="fa fa-chevron-right"></i></button>
  <picture class="modal__photo" id="modal-photo">
    <!-- <source media="" srcset="" />
    <img src="" srcset="" alt="" /> -->
  </picture>
</div>
<?php get_footer(); ?>