<?php use Roots\Sage\Nav\NavWalker; ?>
<nav id="offcanvas" class="navmenu navmenu-inverse navmenu-fixed-right offcanvas" role="navigation">
	<?php
	if (has_nav_menu('sidebar_navigation')) :
	wp_nav_menu(['theme_location' => 'sidebar_navigation', 'walker' => new NavWalker(), 'menu_class' => 'nav navmenu-nav']);
	endif;
	?>
	<?php if (is_user_logged_in()) { ?>
	    <ul class="nav navmenu-nav">
	      <li><a href="<?php echo admin_url(); ?>"><?php _e('Admin', 'pressapps' ); ?></a></li>
	      <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e('Logout', 'pressapps' ); ?></a></li>
	    </ul>
	<?php } else { ?>
	    <ul class="nav navmenu-nav">
	      <li class="has-button"><a href="<?php echo wp_login_url(get_permalink() ); ?>" title="Login" class="btn navmenu-btn"><?php _e('Login', 'pressapps' ); ?></a></li>
	    </ul>
    <?php } ?>
</nav>
