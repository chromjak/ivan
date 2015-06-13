<div class="featured featured-wrapper container-wide">
	<div class="featured-wrapper-inner">
		<?php get_template_part('templates/page', 'header'); ?>
	</div>
</div>
<div class="wrap container" role="document">
  <div class="content row">
    <main class="main" role="main">

		<?php if (!have_posts()) : ?>
		  <div class="alert alert-warning">
		    <?php _e('Sorry, no results were found.', 'sage'); ?>
		  </div>
		  <?php get_search_form(); ?>
		<?php endif; ?>

		<?php while (have_posts()) : the_post(); ?>
		  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

    </main><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->
