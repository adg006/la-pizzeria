<?php get_header(); ?>

	<?php while(have_posts()) : the_post() ?>

		<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"> <!-- DISPLAYING FEATURE IMAGE AS BACKGROUND -->
			<div class="hero-content">
				<div class="hero-text">
					<h2><?php the_title(); ?></h2> <!-- DISPLAYING TITLE OF THE MENU -->
				</div><!--.hero-text-->
			</div><!--.hero-content-->
		</div><!--.hero-->

		<div class="main-content container">
			<div class="content-text">
				<p class="ingredients"> Ingredients: </p>
				<p><?php the_content(); ?></p> <!-- DISPLAYING CONTENT OF THE MENU -->
				<p class="price">Price: <span><?php the_field('price'); ?></span></p>
			</div><!--.content-text-->
		</div><!--.main-content-->
		
	<?php endwhile;?>

<?php get_footer(); ?>
