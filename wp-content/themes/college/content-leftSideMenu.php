<ul>
      <?php 
      // If No Parent
      
      if(!$post->post_parent){


        $current_page = get_post($post->ID);
        $current_url = get_permalink($current_page);
        $current_title = $current_page->post_title;
        
        
        echo '<li><a href="'.$current_url.'">'.$current_title.'</a></li>';
        $pages = get_pages(array('child_of'=>$post->ID, 'parent'=>$post->ID));
        foreach($pages as $page){
          $list = $page->post_title;
          $url = get_permalink($page->ID);
          // List all menus
          if($post->ID == $page->ID){
            echo '<li class="current_page_item"><a href="'.$url.'">'.$list.'</a>';
          }else{
            echo '<li><a href="'.$url.'">'.$list.'</a>';
          }
                   
          echo '</li>';
        }
      //If Has Parent
      }else{

      
        $parent_page = get_post($post->post_parent);
        $parent_url = get_permalink($parent_page);
        $parent_title = $parent_page->post_title;
        
        
        echo '<li><a href="'.$parent_url.'">'.$parent_title.'</a></li>';
        $pages = get_pages(array('child_of'=>$post->post_parent, 'parent'=>$post->post_parent));
        foreach($pages as $page){
          $list = $page->post_title;
          $url = get_permalink($page->ID);
          // List all menus
          if($post->ID == $page->ID){
            echo '<li class="current_page_item"><a href="'.$url.'">'.$list.'</a>';
          }else{
            echo '<li><a href="'.$url.'">'.$list.'</a>';
          }
          
          // If the menu has child and this menu is the current page
          // List child menus below the menu
          $child_pages = get_pages(array('child_of'=>$page->ID));
          if(count($child_pages) != 0 && $post->ID == $page->ID){
            
            echo "<ul>";
            foreach($child_pages as $child_page){
              $child_list = $child_page->post_title;
              $child_url = get_permalink($child_page->ID);
              echo '<li><a href="'.$child_url.'">'.$child_list.'</a></li>';
            }
            echo "</ul>";
          }
          
          echo '</li>';
        }
      }
      ?>
      </ul>