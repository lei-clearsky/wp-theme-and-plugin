<?php $menu_name = 'test_menu_1';
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
		$same_submenu_title = false;
		$submenu_parent_id = -1;
		foreach( $menuitems as $item ):
			// get page id from using menu item object id
			$id = get_post_meta( $item->ID, '_menu_item_object_id', true );
			// set up a page object to retrieve page data
			$page = get_page( $id );
			$link = get_page_link( $id );
  
			// Top Menu - Admissions
			// item does not have a parent so menu_item_parent equals 0 (false)
			if ( !$item->menu_item_parent ):
  
				// save this id for later comparison with sub-menu items
				$parent_id = $item->ID;
		?>
				<li>
					<a href="<?php echo $link; ?>">
						<?php echo $page->post_title; ?>
					</a>
  
			<?php endif; ?>

			<?php 
			
			// item has parent and if the child items parent id is this same parent
			if ( $parent_id == $item->menu_item_parent): 
				$submenu_parent_id = $item->ID;
				$same_submenu_title = true;
			?> 
				<?php 
				// Submenu Title - ADMISSIONS
				// if submenu is false, asign submenu to true; add submenu classes
				if ( !$submenu ): $submenu = true; ?>
					<div class="cbp-hrsub">
						<div class="cbp-hrsub-inner"> 				
							<div>				
								<h3>
									<a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
								</h3> 
								<ul>
				<?php endif; ?>								 
			<?php endif; ?>
			<?php 
				// Submenus - Apply Now
				// if next menu item's parent is not the same parent and submenu_parent_id is it's parent
 
				if ( $parent_id != $item->menu_item_parent && $submenu_parent_id == $item->menu_item_parent && $submenu ): ?> 
					<li>
						<a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
					</li>
			<?php endif; ?>	
			<?php 
				if ( $menuitems[ $count + 1 ]->menu_item_parent = $parent_id && $submenu ): 
				$same_submenu_title = false;
				$previous_submenu_parent_id = $submenu_parent_id;
			?> 				
			<?php endif; ?>	
			<?php 
				if ( $parent_id == $item->menu_item_parent && $submenu && !($submenu_parent_id == $previous_submenu_parent_id) ): 
				$same_submenu_title = false;
			?> 				
			<?php endif; ?>	
			<?php 
				// Close one Submenus, start new one in the same top menu parent ID
				if (!$same_submenu_title && $submenu_parent_id != $item->menu_item_parent && $parent_id == $item->menu_item_parent): 	
				?>
					</ul>
					</div>
					<div>
					<h3>
						<a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
					</h3> 
					<ul>
			<?php endif; ?>

			<?php 
				// if next menu item's parent is not the same parent and if submenu is true
				// close the submenu
				if ( !($menuitems[ $count + 1 ]->menu_item_parent) && $submenu ): ?>
					</ul>
					</div>
					</div>
					</div>
				<?php 
				// assign submenu to false, close the if statement
				$submenu = false; $submenu_num = 0; endif; ?>
			<?php 
			// close parent menu
			if ( !$menuitems[ $count + 1 ]->menu_item_parent) ?>
				</li> 
			<?php $submenu = false; endif; ?>
  
		<?php $count++; endforeach; ?>
  
	</ul>
 </nav>