<?php
/**
 * The template for displaying search forms in _s
 *
 * @package College
 */
?>
	<form method="get" name="searchForm" id="searchForm" class="searchTop"  action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
      <input type="search" name="s" placeholder="Search CSE.edu" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', '_s' ); ?>" >
      <input type="submit" name="hidden search submit button" class="search-button" value="<?php echo esc_attr_x( 'Search', 'submit button', '_s' ); ?>">
    </form>



	