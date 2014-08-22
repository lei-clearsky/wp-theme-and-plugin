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
  
 foreach( $menuitems as $item ):
 // get page id from using menu item object id
 $id = get_post_meta( $item->ID, '_menu_item_object_id', true );
 // set up a page object to retrieve page data
 $page = get_page( $id );
 $link = get_page_link( $id );
  
 // item does not have a parent so menu_item_parent equals 0 (false)
 if ( !$item->menu_item_parent ):
  
 // save this id for later comparison with sub-menu items
 $parent_id = $item->ID;
 ?>
  
 <li>
 <a class="dropdown" href>
 <?php echo $page->post_title; ?>
 </a>
  
 <?php endif; ?>
  
 <?php if ( $parent_id == $item->menu_item_parent ): ?>
  
 <?php if ( !$submenu ): $submenu = true; ?>
 <div class="cbp-hrsub">
 <div class="cbp-hrsub-inner"> 
 <div>
 <ul>
 <?php endif; ?>
  
 <li>
 <a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
  
 </li>
  
 <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
 </ul>
 </div>
 </div>
 </div>
 <?php $submenu = false; endif; ?>
  
 <?php endif; ?>
  
 <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
 </li> 
 <?php $submenu = false; endif; ?>
  
 <?php $count++; endforeach; ?>
  
 </ul>
 </nav>