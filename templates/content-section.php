<?php
global $pa;
$section_layout = $pa['section_layout'];

$style = '';
$class_img = '';
$class_section = '';
$style_overlay = '';

if ( isset( $pa['section_bg']['background-color'] ) && $pa['section_bg']['background-color'] != '' ) {
	$style .= 'background-color: '      . $pa['section_bg']['background-color'] . ';';
}
if ( isset( $pa['section_bg']['background-image'] ) && $pa['section_bg']['background-image'] != '' ) {
	$style .= 'background-image: url('      . $pa['section_bg']['background-image'] . '); ';
	$style .= 'background-repeat: '     . $pa['section_bg']['background-repeat'] . ';';
	$style .= 'background-position: '   . $pa['section_bg']['background-position'] . ';';
	$style .= 'background-size: '       . $pa['section_bg']['background-size'] . ';';
	$style .= 'background-attachment: ' . $pa['section_bg']['background-attachment'] . ';';
}
$style .= 'padding-top: '       . $pa['section_padding']['padding-top'] . ';';
$style .= 'padding-bottom: '    . $pa['section_padding']['padding-bottom'] . ';';

if ( isset( $pa['section_text_color'] ) && $pa['section_text_color'] != '' ) {
	$style .= 'color: '       . $pa['section_text_color'] . ';';
}

if ( $pa['section_height'] ) {
	$class_section = ' cover';
}

// Img padding
if ( $section_layout != 2 && $pa['section_img_padding'] ) {
	$class_img = ' img-padding';
}

// Overlay
if ( !empty($pa['section_bg_overlay']) ) {
    $style_overlay .= 'background-color: ' . $pa['section_bg_overlay']['rgba'] . '; }';
}

?>

<?php if ( $section_layout == 1 ) { ?>
	<section style="<?php echo $style; ?>" class="wrapper-table left<?php echo $class_section; ?>" data-sr="move 5px">
		<div class="section-overlay" style="<?php echo $style_overlay; ?>"></div>
		<div class="wrapper-text">
			<?php if ( $pa['section_title'] != 0 || !empty( $pa['section_subtitle'] ) ) { ?>
				<header>
					<?php } ?>
						<?php if ( $pa['section_title'] == 1 ) { ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php } elseif ( $pa['section_title'] == 2 ) { ?>
							<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php } elseif ( $pa['section_title'] == 3 ) { ?>
							<h3 class="entry-title"><?php the_title(); ?></h3>
						<?php } ?>
						<?php if ( !empty( $pa['section_subtitle'] ) ) { ?>
							<p class="subtitle"><?php echo $pa['section_subtitle']; ?></p>
						<?php } ?>
					<?php if ( $pa['section_title'] != 0 || !empty( $pa['section_subtitle'] ) ) { ?>
				</header>
			<?php } ?>
			<?php if( $post->post_content != "" ) { ?>
				<div class="entry-content">
				  <?php the_content(); ?>
				</div>
			<?php } ?>
		</div>
		<div class="wrapper-img<?php echo $class_img; ?>">
			<?php if ($pa['section_img']['url']) { ?>
				<img src="<?php echo $pa['section_img']['url']; ?>">
			<?php } ?>
		</div>
	</section>
<?php } elseif ( $section_layout == 3 ) { ?>
	<section style="<?php echo $style; ?>" class="wrapper-table right<?php echo $class_section; ?>" data-sr="move 5px">
		<div class="section-overlay" style="<?php echo $style_overlay; ?>"></div>
		<div class="wrapper-img<?php echo $class_img; ?>">
			<?php if ($pa['section_img']['url']) { ?>
				<img src="<?php echo $pa['section_img']['url']; ?>">
			<?php } ?>
		</div>
		<div class="wrapper-text">
			<?php if ( $pa['section_title'] != 0 || !empty( $pa['section_subtitle'] ) ) { ?>
				<header>
					<?php } ?>
						<?php if ( $pa['section_title'] == 1 ) { ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php } elseif ( $pa['section_title'] == 2 ) { ?>
							<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php } elseif ( $pa['section_title'] == 3 ) { ?>
							<h3 class="entry-title"><?php the_title(); ?></h3>
						<?php } ?>
						<?php if ( !empty( $pa['section_subtitle'] ) ) { ?>
							<p class="subtitle"><?php echo $pa['section_subtitle']; ?></p>
						<?php } ?>
					<?php if ( $pa['section_title'] != 0 || !empty( $pa['section_subtitle'] ) ) { ?>
				</header>
			<?php } ?>
			<?php if( $post->post_content != "" ) { ?>
				<div class="entry-content">
				  <?php the_content(); ?>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } elseif ( $section_layout == 2 ) { ?>
	<section style="<?php echo $style; ?>" class="wrapper-table center<?php echo $class_section; ?>" data-sr="move 5px">
		<div class="section-overlay" style="<?php echo $style_overlay; ?>"></div>
		<div class="wrapper-center text-center">
			<?php if ( $pa['section_title'] != 0 || !empty( $pa['section_subtitle'] ) ) { ?>
				<header>
					<?php } ?>
						<?php if ( $pa['section_title'] == 1 ) { ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php } elseif ( $pa['section_title'] == 2 ) { ?>
							<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php } elseif ( $pa['section_title'] == 3 ) { ?>
							<h3 class="entry-title"><?php the_title(); ?></h3>
						<?php } ?>
						<?php if ( !empty( $pa['section_subtitle'] ) ) { ?>
							<p class="subtitle"><?php echo $pa['section_subtitle']; ?></p>
						<?php } ?>
					<?php if ( $pa['section_title'] != 0 || !empty( $pa['section_subtitle'] ) ) { ?>
				</header>
			<?php } ?>
			<?php if( $post->post_content != "" ) { ?>
				<div class="entry-content">
				  <?php the_content(); ?>
				</div>
			<?php } ?>
			<?php if ($pa['section_img']['url']) { ?>
				<img src="<?php echo $pa['section_img']['url']; ?>">
			<?php } ?>
		</div>
	</section>
<?php } ?>
