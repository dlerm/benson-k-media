<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php // Favicon Generics ?>
  <!-- <link rel="icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=32" sizes="32x32">
  <link rel="icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=57" sizes="57x57">
  <link rel="icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=76" sizes="76x76">
  <link rel="icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=96" sizes="96x96">
  <link rel="icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=128" sizes="128x128">
  <link rel="icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=192" sizes="192x192">
  <link rel="icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=228" sizes="228x228"> -->
  <?php // Favicon Android ?>
  <!-- <link rel="shortcut icon" sizes="196x196" href=“https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg196.png"> -->
  <?php // Favicon iOS ?>
  <!-- <link rel="apple-touch-icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=120" sizes="120x120">
  <link rel="apple-touch-icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=152" sizes="152x152">
  <link rel="apple-touch-icon" href="https://i0.wp.com/mikelermanmusic.com/wp-content/uploads/favicon-ml.jpg?w=180" sizes="180x180"> -->

  <?php wp_head(); ?>
  <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/theme.js" defer="defer"></script>
</head>
<body <?php body_class(); ?>>