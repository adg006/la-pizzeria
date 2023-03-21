<?php get_header(); ?>

	<?php while(have_posts()) : the_post() ?>

		<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"> <!-- DISPLAYING FEATURE IMAGE AS BACKGROUND -->
			<div class="hero-content">
				<div class="hero-text">
					<h2><?php the_title(); ?></h2> <!-- DISPLAYING TITLE OF THE PAGE -->
				</div><!--.hero-text-->
			</div><!--.hero-content-->
		</div><!--.hero-->

		<div class="main-content container">
			<div class="content-text">
				<p><?php the_content(); ?></p> <!-- DISPLAYING CONTENT OF THE PAGE -->
			</div><!--.content-text-->
		</div><!--.main-content-->

		<div class="box-information container clear">
			<div class="single-box">
				<div class="content-image">
					<img src="<?php echo get_field('image_1'); ?>">
				</div><!--.content-image-->
				<div class="content-box">
					<?php the_field('description_1'); ?>
				</div><!--.content-box-->
			</div><!--.single-box-->
			<div class="single-box">
				<div class="content-image">
					<img src="<?php echo get_field('image_2'); ?>">
				</div><!--.content-image-->
				<div class="content-box">
					<?php the_field('description_2'); ?>
				</div><!--.content-box-->
			</div><!--.single-box-->
			<div class="single-box">
				<div class="content-image">
					<img src="<?php echo get_field('image_3'); ?>">
				</div><!--.content-image-->
				<div class="content-box">
					<?php the_field('description_3'); ?>
				</div><!--.content-box-->
			</div><!--.single-box-->
		</div><!--.box-information-->
		
	<?php endwhile;?>

<?php get_footer(); ?>