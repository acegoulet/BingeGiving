		<footer class="bg-blue-medium text-center" style="background-image: url(<?php echo get_image_url(get_field('footer_background_image','option'), 'full'); ?>);">
			<div class="container">
				<div class="grid_12">
					<a href="<?php echo get_site_url(); ?>#home" class="logo footer-logo"><?php bloginfo('name'); ?></a>
					<?php set_query_var('menu_context', 'footer'); ?>
					<?php get_template_part('templates/partials/menu'); ?>
					<nav class="social-nav large-copy">
						<ul>
							<?php if(get_field('facebook_url', 'option')){ ?>
								<li><a href="<?php the_field('facebook_url', 'option'); ?>" target="_blank" class="facebook-icon fa fa-facebook"></a></li>
							<?php } ?>
							<?php if(get_field('instagram_url', 'option')){ ?>
								<li><a href="<?php the_field('instagram_url', 'option'); ?>" target="_blank" class="instagram-icon fa fa-instagram"></a></li>
							<?php } ?>
							<?php if(get_field('twitter_url', 'option')){ ?>
								<li><a href="<?php the_field('twitter_url', 'option'); ?>" target="_blank" class="twitter-icon fa fa-twitter"></a></li>
							<?php } ?>
						</ul>
					</nav>
					</div>
				<div class="clear"></div>
			</div>
		</footer>
	</div> <!-- close #wrapper -->
	<?php 
		wp_footer(); 
	?>	
</body>
	
</html>
