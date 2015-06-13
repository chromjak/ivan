<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= esc_url(get_feed_link()); ?>">
    <?php wp_head(); ?>
    <style> [data-sr] { visibility: hidden; } </style>
  </head>
