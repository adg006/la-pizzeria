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
		
	<?php endwhile;?>

	<div class="container our-specialties">
		<h3 class="primary-text"> Pizzas </h3>
		<div class="container-grid">
			<?php 
				$args = array(
					'post_type' => 'specialties',
					'post_per_page' => 10,
					'orderby' => 'title',
					'order' => 'ASC',
					'category_name' => 'pizza'
				); 
				$pizzas = new WP_Query($args);
				while($pizzas->have_posts()) : $pizzas->the_post(); ?>
					<div class="column2-4 specialty-content">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
							<h4><?php the_title(); ?><span><?php the_field('price'); ?></span></h4>
							<?php the_content(); ?>
						</a>
					</div><!--.specialty-content-->			
				
				<?php endwhile; wp_reset_postdata(); ?>
		</div><!--.container-grid-->
		<h3 class="primary-text"> Others </h3>
		<div class="container-grid">
			<?php 
				$args = array(
					'post_type' => 'specialties',
					'posts_per_page' => 10,
					'orderby' => 'title',
					'order' => 'ASC',
					'category_name' => 'others'
				); 
				$others = new WP_Query($args);
				while($others->have_posts()) : $others->the_post(); ?>
					<div class="column2-4 specialty-content">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
							<h4><?php the_title(); ?><span><?php the_field('price'); ?></span></h4>
							<?php the_content(); ?>
						</a>
					</div><!--.specialty-content-->			
				
				<?php endwhile; wp_reset_postdata(); ?>
		</div><!--.container-grid-->
	</div><!--.our-specialties-->

<?php get_footer(); ?>