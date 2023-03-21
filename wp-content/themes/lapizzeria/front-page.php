<?php get_header(); ?>

		<?php while(have_posts()) : the_post() ?>

			<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"> <!-- DISPLAYING FEATURE IMAGE AS BACKGROUND -->
				<div class="hero-content">
					<div class="hero-text">
						<h2><?php echo esc_html(get_option('blogdescription')); ?></h2> <!-- DISPLAYING DESCRIPTION OF THE PAGE -->
						<p><?php the_content(); ?></p> <!-- DISPLAYING CONTENT OF THE PAGE -->
						<?php $url = get_page_by_title('About Us'); ?>
						<a class="button secondary" href="<?php echo get_permalink($url->ID); ?>">More Info</a>
					</div><!--.hero-text-->
				</div><!--.hero-content-->
			</div><!--.hero-->

		<?php endwhile;?>

		<div class="main-content container">
			<div class="container-grid clear">
				<h2 class="primary-text text-center">Our Specialties</h2>
				<?php 
					$args = array(
						'posts_per_page' => 3,
						'post_type' => 'specialties',
						'category_name' => 'pizza',
						'orderby' => 'rand'
					); 

					$specialties = new WP_Query($args);

					while($specialties->have_posts()): $specialties->the_post(); ?>
						<div class="specialty column1-3">
							<div class="specialty-content">
								<?php the_post_thumbnail('specialty-portrait'); ?> <!-- DISPLAYING IMAGE FROM THE CUSTOM FIELD -->
								<div class="information">
									<?php the_title('<h3>','</h3>')?> <!-- DISPLAYING TITLE FROM THE CUSTOM FIELD -->
									<?php the_content(); ?> <!-- DISPLAYING CONTENT FROM THE CUSTOM FIELD -->
									<p class="price"><?php the_field('price'); ?></p> <!-- DISPLAYING PRICE FROM THE CUSTOM FIELD -->
									<a class="button primary" href="<?php the_permalink(); ?>">Read More</a>
								</div><!--.information-->
							</div><!--.specialty-content-->
						</div><!--.specialty-->
					<?php endwhile; wp_reset_postdata(); 
				?>
			</div><!--.container-grid-->
		</div><!--.main-content-->

		<section class="ingrediants">
			<div class="container">
				<div class="container-grid">
					<?php while(have_posts()): the_post(); ?>
						<div class="column2-4">
							<h3><?php the_field('fresh_ingredients_title'); ?></h3> <!-- DISPLAYING TITLE FROM THE CUSTOM FIELD -->
							<?php the_field('fresh_ingredients_text'); ?> <!-- DISPLAYING CONTENT FROM THE CUSTOM FIELD -->
							<?php $url = get_page_by_title('About Us'); ?>
							<a class="button secondary" href="<?php echo get_permalink($url->ID); ?>">Read More</a>
						</div><!--.column2-4-->
						<div class="column2-4 image">
							<img src="<?php the_field('image'); ?>"> <!-- DISPLAYING IMAGE FROM THE CUSTOM FIELD -->
						</div><!--.column2-4-->			
					<?php endwhile; ?>
				</div><!--.container-grid-->
			</div><!--.container-->
		</section><!--.ingrediants-->

		<section class="container clear">
			<h2 class="primary-text text-center">Gallery</h2>
			<?php
				$url = get_page_by_title('Gallery');
				echo get_post_gallery($url->ID); 
			?>
		</section><!--.container-->

		<section class="location-reservation clear">
			<div class="container">
				<div class="container-grid">
					<div class="column2-4">
						<?php $location = get_field('location'); ?>
						<div class="location">
							<input type="hidden" id="lat" value="<?php echo $location['lat']; ?>">
							<input type="hidden" id="lng" value="<?php echo $location['lng']; ?>">
							<input type="hidden" id="address" value="<?php echo $location['address']; ?>">
							<div id="map"></div>
						</div><!--.location-->
					</div>
					<div class="column2-4">
						<?php get_template_part('templates/reservations','form'); ?>
					</div>	
				</div><!--.container-grid-->
			</div><!--.container-->
		</section><!--.location-reservation-->
		
	

<?php get_footer(); ?>
