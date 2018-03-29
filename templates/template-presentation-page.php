<?php /* Template Name: Presentation Page */ ?>
<?php get_header(); ?>

<div class="presentation-header">
  <h1 class="presentation-title"><?php the_title(); ?></h1>
  <div class="presentation-header-divider"></div>
  <span class="presentation-powered-label">Powered by</span>
  <div class="presentation-logo"></div>
</div>

<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class('generic-page presentation-page container height-100 section-2'); ?>>
		<div class="grid_10 push_1">
			
			<?php if(get_field('dropbox_file_url')){ ?>
			
  			  <div class="dropbox-pdf-outer-wrapper">
    	      <h2>Presentation</h2>
    	      <div class="dropbox-pdf-wrapper">
      	     <iframe src="<?php echo get_field('dropbox_file_url'); ?>" frameborder="0" allowfullscreen></iframe>
    	      </div>
    	      <div class="presentation-mobile text-center">
      	      <a class="black-button" href="<?php echo get_field('dropbox_file_url'); ?>" target="blank">Click here to view the presentation on mobile devices and tablets</a>
    	      </div>
    			<div class="clear"></div>
  			</div>
			
			<?php } ?>
			
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
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
		
	</article>
	
<?php endwhile; ?>

<div class="presentation-footer">&copy; 2018 | BingeGiving<sup>TM</sup></div>

<?php get_footer(); ?>