<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class('generic-page container height-100 section-2'); ?>>
		<div class="grid_10 push_1">
			<div class="entry-header">
				<h1 class="entry-title headline"><?php the_title(); ?></h1>
			</div>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
		
	</article>
	
<?php endwhile; ?>

<?php get_footer(); ?>