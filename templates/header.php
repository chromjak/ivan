<?php global $pa; ?>
<?php use Roots\Sage\Nav\NavWalker; ?>

<?php if ($pa['header_color'] != 0) { ?>
  <header class="banner navbar navbar-default navbar-static-top1" role="banner" data-sr="enter top move 50px wait 0.3s">
    <div class="container-fluid">
      <div class="navbar-header">
        <?php if ($pa['header_color'] == 2) { ?>
          <?php if ($pa['logo_light']['url']) { ?>
            <a class="navbar-brand-img" title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>"><img src="<?php echo $pa['logo_light']['url']; ?>" alt="<?php bloginfo('name'); ?>"/></a>
          <?php } else { ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
          <?php } ?>
        <?php } elseif ($pa['header_color'] == 1) { ?>
          <?php if ($pa['logo_dark']['url']) { ?>
            <a class="navbar-brand-img" title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>"><img src="<?php echo $pa['logo_dark']['url']; ?>" alt="<?php bloginfo('name'); ?>"/></a>
          <?php } else { ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
          <?php } ?>
        <?php } ?>
      </div>

      <nav class="collapse navbar-collapse" role="navigation">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new NavWalker(), 'menu_class' => 'nav nav-justified2 navbar-nav']);
        endif;
        ?>
      </nav>

      <button type="button" class="navbar-toggle masthead-toggle" data-recalc="false" data-toggle="offcanvas" data-target="#offcanvas" data-canvas="body">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>


    </div>
  </header>
<?php } ?>