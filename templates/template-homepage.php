<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<div class="landing-wrapper page-active page">
	    <div class="landing-container">
	        <div class="landing-content">
	            <div class="logo-holder">
	                <img class="intro-logo hidden" src="<?php echo gsdu(); ?>/img/heart-logo-white.svg" alt="BingeGiving">
	                <img class="intro-logotype hidden" src="<?php echo gsdu(); ?>/img/bingegiving_logotype_tm.svg" alt="BingeGiving">
	            </div>
	            <div class="tagline">
	                <div class="intro-tagline-wrapper">
	                    <p class="hidden intro-tagline-1 headline">Giving is Good.</p>
	                    <P class="hidden intro-tagline-2 headline"><strong>BingeGiving<sup>TM</sup> <span class="mobile-show"></span>is Better.</strong></P>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<section id="section-1" data-section="home" class="bg-blue-medium section-1 vert-center hero">
		<div class="container">
			<div class="section-1-text grid_12 text-center fade-in-load">
				<div class="section-text-inner-padding border-white headline bold"><?php the_field('section_1_text'); ?></div>
			</div>
		</div>
	</section>
	
	<section id="section-2" data-section="<?php echo sluggify(get_field('section_2_menu_label')); ?>" class="bg-blue-light section-2 height-100">
		<div class="container">
			<div class="section-2-text grid_6 vert-center float-right vert-center height-100 title section-padding fade-in-out-scroll-right-alt"><?php the_field('section_2_text'); ?></div>
			<div class="section-2-image-wrapper grid_6 image-wrapper height-100 fade-in-out-scroll-left-alt">
				<?php if(get_field('section_2_image')){ ?>
					<img src="<?php echo get_image_url(get_field('section_2_image'), 'full'); ?>" alt="<?php bloginfo('name'); ?>" />
				<?php } ?>
			</div>
		</div>
	</section>
	
	<section id="section-3" data-section="<?php echo sluggify(get_field('section_3_menu_label')); ?>" class="bg-blue-medium section-3 section-padding height-100">
		<div class="container">
			<div class="section-3-wrapper">
				<div class="section-3-title grid_6 text-right border-bottom fade-in-out-scroll-left">
					<h2 class="headline"><?php the_field('section_3_title'); ?></h2>
				</div>
				<div class="clear"></div>
				<div class="section-3-copy grid_6 push_6 large-copy fade-in-out-scroll-right"><?php the_field('section_3_copy'); ?></div>
			</div>
		</div>
	</section>
	
	<section id="section-4" data-section="<?php echo sluggify(get_field('section_4_menu_label')); ?>" class="section-4 section-padding height-100">
		<div class="container height-100">
			<div class="section-4-text-wrapper grid_10 push_1">
				<h2 class="headline fade-in-out-scroll-left"><?php the_field('section_4_title'); ?></h2>
				<div class="section-4-list">
					<ul>
						<?php 
							$section_4_list = get_field('section_4_list'); 
							foreach($section_4_list as $section_4_list_item){
								echo '<li class="vert-center fade-in-out-scroll-left"><span class="list-number montserrat">'.$section_4_list_item['number'].'</span><span class="list-text list-title">'.$section_4_list_item['list_item_text'].'</span></li>';
							}
						?>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</section>
	
	<section id="section-5" data-section="<?php echo sluggify(get_field('section_5_menu_label')); ?>" class="bg-blue-light section-5 section-padding height-100">
		<div class="container">
			<div class="grid_12 fade-in-out-scroll-left"><h2 class="headline"><?php the_field('section_5_title'); ?></h2></div>
			<div class="clear"></div>
			<?php 
				
				$pattern = array(3, 3, 3, 3, 5, 3, 4, 3, 3, 3, 3, 5, 4, 3);
				$box_index = 0;
				$section_5_list = get_field('section_5_list');
				foreach($section_5_list as $section_5_list_item){
					echo '<div class="list-box border-white text-center quicksand vert-center list-title fade-in-out-scroll grid_'.$pattern[$box_index].'">'.$section_5_list_item['list_item_text'].'</div>';
					$box_index++;
					if($box_index == 14){
						$box_index = 0;
					}
				}
			?>
			<div class="clear"></div>
		</div>
	</section>
	
	<section id="section-6" data-section="<?php echo sluggify(get_field('section_6_menu_label')); ?>" class="bg-grey-light section-6 section-padding height-100" style="background-image: url(<?php echo get_image_url(get_field('section_6_background_image'), 'full'); ?>);">
		<div class="container">
			<div class="section-6-title grid_12 fade-in-out-scroll-left"><h2 class="headline"><?php the_field('section_6_title'); ?></h2></div>
			<div class="clear"></div>
			<div class="section-6-boxes">
				<?php 
					$section_6_boxes = get_field('section_6_boxes');
					foreach($section_6_boxes as $section_6_boxes_item){
						echo '<div class="list-box-cta grid_4 section-padding fade-in-out-scroll"><h3 class="title">'.$section_6_boxes_item['box_title'].' ';
						if($section_6_boxes_item['box_title_line_2']){
							echo '<br class="mobile-hide" />'.$section_6_boxes_item['box_title_line_2'];
						}
						echo '</h3><p class="dark-grey medium-copy">'.$section_6_boxes_item['box_text'].'</p></div>';
					}
				?>
				<div class="clear"></div>
			</div>
		</div>
	</section>
	
	<section id="section-7" data-section="" class="bg-blue-light section-7 bg-cover hero" style="background-image: url(<?php echo get_image_url(get_field('section_7_image'), 'full'); ?>);">
		<div class="section-7-text headline fade-in-out-scroll-right"><?php the_field('section_7_text'); ?></div>
	</section>
	
	<section id="section-team" data-section="<?php echo sluggify(get_field('team_section_menu_label')); ?>" class="section-team section-padding height-100">
		<div class="container">
			<div class="team-section-title-wrapper bg-blue-medium grid_7 fade-in-out-scroll">
				<h2 class="headline"><?php the_field('team_section_title'); ?></h2>
			</div>
			<div class="clear"></div>
			<div class="team-members fade-in-out-scroll">
				<?php
					$team_members = get_field('team_members');
					$bio_count = 0;
					foreach($team_members as $team_member){
						echo '<div class="team-member bg-white" data-bio="'.$bio_count.'"><div class="team-image" style="background-image: url('.get_image_url($team_member['image'], 'full').');"></div><div class="team-meta"><h4 class="team-name dark-grey bio-title">'.$team_member['name'].'</h4><h5 class="team-title dark-grey bio-copy"><strong>'.$team_member['title'].'</strong></h4><p class="bio-copy dark-grey">'.$team_member['short_bio'].' <strong>read more...</strong></p></div></div>';
						$bio_count++;
					}
				?>
			</div>
		</div>
		<?php
			$team_member_bios = get_field('team_members');
			$bio_count = 0;
			foreach($team_member_bios as $team_member_bio){
				echo '<div style="display: none;" class="team-member-long-bio" data-bio="'.$bio_count.'"><div class="long-bio-inner bg-white bio-copy dark-grey"><div class="team-image long-bio-image" style="background-image: url('.get_image_url($team_member_bio['image'], 'full').');"></div><div class="bio-wrapper"><strong>'.$team_member_bio['name'].' - '.$team_member_bio['title'].'</strong>'.$team_member_bio['long_bio'].'</div></div></div>';
				$bio_count++;
			}
		?>
	</section>
	
	<section id="section-contact" data-section="<?php echo sluggify(get_field('contact_section_menu_label')); ?>" class="bg-grey-light section-contact text-center section-padding height-100">
		<div class="container">
			<div class="grid_12">
				<h2 class="contact-title headline fade-in-out-scroll"><?php the_field('contact_section_title'); ?></h2>
				<div class="contact-section-1 large-copy fade-in-out-scroll"><?php the_field('contact_section_content'); ?></div>
				<div class="blue-contact-heart fade-in-out-scroll"></div>
				<div class="contact-section-2 title fade-in-out-scroll"><?php the_field('contact_section_content_2'); ?></div>
			</div>
			<div class="clear"></div>
		</div>
	</section>
	
<?php endwhile; ?>

<?php get_footer(); ?>