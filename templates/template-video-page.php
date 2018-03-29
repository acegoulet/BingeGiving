<?php /* Template Name: Video Page */ ?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class('generic-page video-page container height-100 section-2'); ?>>
		<div class="grid_10 push_1">
			<div class="entry-header">
				<h1 class="entry-title headline"><?php the_title(); ?></h1>
			</div>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
			<?php if(get_field('videos')){ ?>
			
  			<div class="videos-wrapper">
    			
    			<?php 
      			foreach(get_field('videos') as $video) {
      			  if(!empty($video['youtube_id'])){ 
      		?>
        	      <div class="video-wrapper">
          	      <?php if(!empty($video['title'])){ ?><h2><?php echo $video['title']; ?></h2><?php } ?>
          	      <div class="youtube-wrapper">
            	      <iframe src="https://www.youtube-nocookie.com/embed/<?php echo $video['youtube_id']; ?>?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;feature=oembed?amp;vq=hd720" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          	      </div>
        	      </div>
        	      <div class="clear"></div>
        	<?php
      			  }
      			
    			  }
    			?>
    			<div class="clear"></div>
  			</div>
			
			<?php } ?>
			
			
		</div>
		
	</article>
	
<?php endwhile; ?>

<?php get_footer(); ?>