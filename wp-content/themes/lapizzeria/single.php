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
				<div class="entry-information clear">
					<div class="date">
						<time>
							<?php echo the_time('d'); ?> <!-- DISPLAYING DATE OF THE BLOG POSTS -->
							<span><?php echo the_time('M'); ?></span> <!-- DISPLAYING MONTH OF THE BLOG POSTS -->
						</time>
					</div><!--.date-->
					<p class="author">
						<i class="fa fa-user"></i>
						<?php the_author(); ?> <!-- DISPLAYING AUTHOR OF THE BLOG POSTS -->
					</p><!--.author-->
				</div>
				<p><?php the_content(); ?></p> <!-- DISPLAYING CONTENT OF THE PAGE -->
			</div><!--.content-text-->
		</div><!--.main-content-->
		<div class="container comments">
			<?php comment_form(); ?>
		</div><!--.comments-->
		<div class="container comment-list">
			<ol class="commentlist">
				<?php 
					$comments = get_comments(array(
						'post_id' => $post->ID,
						'status' => 'approve'
					));
					wp_list_comments(array(
						'per_page' => 10,
						'reverse_top_level' => false
					), $comments);
				?>
			</ol>
		</div><!--.comment-list-->
		
	<?php endwhile;?>

<?php get_footer(); ?>