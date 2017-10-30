<nav class="main-nav">
	<ul>
		<?php 
		$homepage_id = get_option( 'page_on_front' );
		$menu_keys = array(
			'section_2_menu_label', 
			'section_3_menu_label', 
			'section_4_menu_label', 
			'section_5_menu_label', 
			'section_6_menu_label',
			'team_section_menu_label',
			'contact_section_menu_label'
		);
		if($menu_context == 'footer'){
			echo '<li><a class="nav-link" data-section="home" href="'.get_site_url().'#home">Home</a></li>';
		}
		foreach($menu_keys as $key){
			if(get_field($key, $homepage_id)){
				$nav_label = get_field($key, $homepage_id);
				$nav_anchor = sluggify(get_field($key, $homepage_id));
				echo '<li><a class="nav-link" data-section="'.$nav_anchor.'" href="'.get_site_url().'#'.$nav_anchor.'">'.$nav_label.'</a></li>';
			}
		}
			
		?>
	</ul>
</nav>