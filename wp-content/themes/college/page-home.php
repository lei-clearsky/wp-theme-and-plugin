<?php
/**
 * Template Name: Homepage - CSE
 * The template for Home.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package College
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="container">

			<div class="sixteen columns">
				<!-- Slider -->
				<?php get_template_part('content', 'slider'); ?>
	    	</div>
	    <!-- Learn today, lead tomorrow -->
		<?php get_template_part( 'content', 'page' ); ?>

		<div class="container">
		    <div class="one-third column">
		    	<h2>Special Announcements</h2>
		    	<?php 
		    		$args = array( 'post_type' => 'announcement', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						the_content();
					endwhile;
		    	?>
		    </div>
			<div class="one-third column">
		    <!-- Upcoming Events -->
		    <?php get_template_part('content','events'); ?>

		  </div>
		  <div class="one-third column">
		  	<!-- Online College Services -->
		  	<?php get_template_part('content','services'); ?>
		    </div>
		  </div>

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
