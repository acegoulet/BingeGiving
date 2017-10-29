<nav class="main-nav">
	<ul>
		<?php 
			
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
			if(get_field($key)){
				$nav_label = get_field($key);
				$nav_anchor = sluggify(get_field($key));
				echo '<li><a class="nav-link" data-section="'.$nav_anchor.'" href="'.get_site_url().'#'.$nav_anchor.'">'.$nav_label.'</a></li>';
			}
		}
			
		?>
	</ul>
</nav>