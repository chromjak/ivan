<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="featured featured-wrapper container-wide">
      <div class="featured-wrapper-inner">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main" role="main">
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
          <footer>
            <?php get_template_part('templates/entry-meta'); ?>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
          </footer>
          <?php comments_template('/templates/comments.php'); ?>
        </main><!-- /.main -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
  </article>
<?php endwhile; ?>



