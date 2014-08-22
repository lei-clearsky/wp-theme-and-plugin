<?php $menu_name = 'primary';
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
  
 <nav id="cbp-hrmenu" class="cbp-hrmenu">
	<ul>
		<?php
		$count = 0;
		$submenu = false;
		$submenu_num = 0; // Initialize a counter to collect numbers of submenu items with same parent id
		$submenu_title_counter = 0;
		$same_submenu_title = false;
		$submenu_parent_id = -1;


		foreach( $menuitems as $item ):
			// get page id from using menu item object id
			$id = get_post_meta( $item->ID, '_menu_item_object_id', true );
			// set up a page object to retrieve page data
			$page = get_page( $id );
			$link = get_page_link( $id );
  			
  			// If No Parent
			// Top Menu - Admissions
			// item does not have a parent so menu_item_parent equals 0 (false)
			if ( !$item->menu_item_parent ):
				// save this id for later comparison with sub-menu items
				$parent_id = $item->ID;
				if ( $menuitems[ $count + 1 ]->menu_item_parent):
		?>
				<li>
					<a class="dropdown" >
						<?php echo $page->post_title; ?>
					</a>
				<?php endif; ?>
				<?php
				if ( !($menuitems[ $count + 1 ]->menu_item_parent)): ?>
					<li>
					<a href="<?php echo $link; ?>">
						<?php echo $page->post_title; ?>
					</a>
				<?php endif; ?>
  
			<?php endif; ?>

			<?php 
			// If Has Parent
			// Add Submenu Dropdown Pannel
			if ( $item->menu_item_parent ):
				// Set Has Submenu to True
				if ( !$submenu ): $submenu = true; endif;
				// If Submenu Title and Same Parent ID
				// Increase Submenu Counter
				// Set Submenu Title ID
				if ( $parent_id == $item->menu_item_parent): 
					$submenu_title_counter++;
					// save this id for later comparison with sub-menu items
					$submenu_parent_id = $item->ID;

					// If Submenu counter equals 1
					if ($submenu_title_counter == 1):
						// Add Submenu Title Starter Markup
					?>	

						<div class="cbp-hrsub">
						<div class="cbp-hrsub-inner"> 				
							<div>				
								<h4>
									<a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
								</h4> 
								<ul>
					<?php endif; ?>		
					<?php 
					// If Submenu counter is more than 1
					if ($submenu_title_counter > 1 && $submenu_title_counter < 5): 
					// Close Previous Submenu Title and Add New Submenu Markup ?>
						</ul>
						</div>
						<div>
						<h4>
							<a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
						</h4> 
						<ul>
					<?php endif; ?>
				<?php 
				// End If Submenu Title and Same Parent ID			
				endif; ?>
			<?php 
				// End If Has Parent
				endif; ?>	


				<?php
				// If Submenu and Same Submenu Title ID
				// Add Submenu Markup
				if ( $submenu_parent_id == $item->menu_item_parent && $submenu ): ?> 
					<li>
						<a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
					</li>
				<?php endif; ?>	

				<?php
				// If Last Submenu Title or Last Submenu
				// Close Dropdown Pannel
				// Set Submenu counter back to 0
				if ( !($menuitems[ $count + 1 ]->menu_item_parent) && $submenu ): ?>
					</ul>
					</div>
					</div>
					</div>
				<?php 
				// assign submenu to false, close the if statement
				$submenu = false; $submenu_title_counter = 0; endif; ?>

			<?php 
			// close parent menu
			if ( !($menuitems[ $count + 1 ]->menu_item_parent)): ?>
				</li> 
			<?php $submenu = false; endif; ?>
  
		<?php $count++; endforeach; ?>
  
	</ul>
 </nav>