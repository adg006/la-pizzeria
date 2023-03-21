<?php get_header(); ?>

	<?php 
		$blog_page = get_option('page_for_posts');
		$image = get_post_thumbnail_id($blog_page);
		$image = wp_get_attachment_image_src($image, 'full');
	?>

	<div class="hero" style="background-image: url(<?php echo $image[0]; ?>);"> <!-- DISPLAYING FEATURE IMAGE AS BACKGROUND -->
		<div class="hero-content">
			<div class="hero-text">
				<h2><?php echo get_the_title($blog_page); ?></h2> <!-- DISPLAYING TITLE OF THE PAGES -->
			</div><!--.hero-text-->
		</div><!--.hero-content-->
	</div><!--.hero-->

	<div class="main-content container">
		<div class="container-grid">
			<div class="content-text column2-3">
				<?php while(have_posts()) : the_post() ?>
					<article class="entry">
						<a href="<?php the_permalink(); ?>"> <!-- FOR LINK THE BLOG POSTS TO ANOTHER PAGE -->
							<?php the_post_thumbnail(); ?> <!-- DISPLAYING IMAGE OF THE BLOG POSTS -->
						</a>
						<header class="entry-header">
							<div class="date">
								<time>
									<?php echo the_time('d'); ?> <!-- DISPLAYING DATE OF THE BLOG POSTS -->
									<span><?php echo the_time('M'); ?></span> <!-- DISPLAYING MONTH OF THE BLOG POSTS -->
								</time>
							</div><!--.date-->
							<div class="entry-title">
								<?php the_title('<h2>','</h2>'); ?> <!-- DISPLAYING TITLE OF THE BLOG POSTS -->
								<p class="author">
									<i class="fa fa-user"></i>
									<?php the_author(); ?> <!-- DISPLAYING AUTHOR OF THE BLOG POSTS -->
								</p><!--.author-->
							</div><!--.entry-title-->
						</header><!--.entry-header-->
						<div class="entry-content clear">
							<?php the_excerpt(); ?> <!-- DISPLAYING CONTENT OF THE BLOG POSTS WITH SHORTER FORMAT -->
							<a href="<?php the_permalink(); ?>" class="button primary">Read More</a> <!-- FOR LINK THE BLOG POSTS TO ANOTHER PAGE -->
						</div><!--.entry-content-->	
					</article><!--.entry-->
				<?php endwhile; ?>
			</div><!--.content-text-->
			<?php get_sidebar(); ?>
		</div><!--.container-grid-->
	</div><!--.main-content-->
		
<?php get_footer(); ?>