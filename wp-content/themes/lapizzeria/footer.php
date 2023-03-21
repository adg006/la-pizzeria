	<footer>
		<?php wp_nav_menu($args = array(
				'theme_location' => 'header-menu',
				'container' => 'nav',
				'link_after' => '<span class="separator"> | </span>'
			));
		?>
		<div class="location">
			<p><?php echo esc_html(get_option('lapizzeria_locations'))?></p>
			<p>Phone Number: <?php echo esc_html(get_option('lapizzeria_phone'))?></p>
		</div><!--.location-->
		<p class="copyright">All Rights Reserved <?php echo date('Y'); ?></p>
	</footer>
<?php wp_footer(); ?>
</body>
</html>