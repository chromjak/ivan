<?php global $pa; ?>
<footer class="content-info" role="contentinfo">
  <?php if ( is_active_sidebar('sidebar-footer') ) { ?>
    <div class="sidebar-footer">
      <div class="container">
        <div class="row">
          <?php dynamic_sidebar('sidebar-footer'); ?>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="footer-bottom">
      <div class="row">
    		<div class="col-md-6 copyright"><?php echo $pa['footer_text']; ?></div>
        <div class="col-md-6">
          <?php
          if (has_nav_menu('footer_navigation')) :
            wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'navbar-footer', 'depth' => 1));
          endif;
          ?>
        </div>
      </div>
    </div>
</footer>

