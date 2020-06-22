<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
  <link rel="stylesheet" href="https://use.typekit.net/diu7vwg.css">
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/theme.js" defer="defer"></script>
</head>
<body <?php body_class(); ?>>
  <header class="site-header" id="header">
    <nav class="nav">
      <div class="menu-toggle">
        <button class="menu-toggle__btn" id="mobile-menu-toggle">
          <div class="menu-toggle__lines">
            <div class="menu-toggle__line menu-toggle__line--1"></div>
            <div class="menu-toggle__line menu-toggle__line--2"></div>
            <div class="menu-toggle__line menu-toggle__line--3"></div>
          </div>
        </button>
      </div>

      <div class="logo__container">
        <a class="logo__link" href="/">
          <p class="logo h2"><span class="tablet-down">KB</span><span class="tablet-up">KYLE BENSON</span></p>
        </a>
      </div>

      <div class="social">
        <ul class="social__items">
          <li class="social__item">
            <a class="social__link" href="https://www.instagram.com/bensonk_media" target="_blank" title="Instagram">
              <i class="social__icon fa fa-instagram"></i>
            </a>
          </li>
          <li class="social__item">
            <a class="social__link" href="https://vimeo.com/bensonkmedia" target="_blank" title="Vimeo">
              <i class="social__icon fa fa-vimeo"></i>
            </a>
          </li>
          <li class="social__item">
            <a class="social__link" href="https://www.linkedin.com/in/bensonk108" target="_blank" title="LinkedIn">
              <i class="social__icon fa fa-linkedin"></i>
            </a>
          </li>
        </ul>
      </div>

      <ul class="menu" id="menu">
        <li class="menu__item menu__item--home">
        <a class="menu__link" href="/"><span>HOME</span></a>
        </li>
        <li class="menu__item">
          <?php if (get_template_name() === 'index.php') { ?>
          <a class="menu__link" data-scroll="photos" href><span>PHOTOS</span></a>
          <?php } else { ?>
          <a class="menu__link" href="/#photos"><span>PHOTOS</span></a>
          <?php } ?>
        </li>
        <li class="menu__item">
          <?php if (get_template_name() === 'index.php') { ?>
          <a class="menu__link" data-scroll="videos" href><span>VIDEOS</span></a>
          <?php } else { ?>
          <a class="menu__link" href="/#videos"><span>VIDEOS</span></a>
          <?php } ?>
        </li>
        <li class="menu__item">
          <a class="menu__link" href="/about"><span>ABOUT</span></a>
        </li>
        <li class="menu__item">
          <a class="menu__link" href="/contact"><span>CONTACT</span></a>
        </li>
      </ul>
    </nav>
  </header>

  <main>