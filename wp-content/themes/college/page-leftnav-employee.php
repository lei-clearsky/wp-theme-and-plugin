<?php
/**
 * Template Name: Left Navigation Employee Template
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

	<div class="headerWrap2" style = "background-color: #6394bf; padding: 10px;">
    <div class="container">
      <div class="sixteen columns">
        <?php the_title( '<h3>', '</h3>' ); ?>  
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="four columns">
      <div class="showhideSub">
        <span class="title">Additional Menu</span>
        <span class="icon"><em></em><em></em><em></em><em></em></span>
      </div>
    <div class="side-nav">
      <!--Left Side Menu-->
      <?php get_template_part('content', 'leftSideMenu')?>   	
	 </div>
  	<div class="leftCol">
    <div class="admissions-side-nav">
    	<!--Admission Promo-->
      	<?php get_template_part('content', 'admissionspromo')?>

    <!--Contact Info-->
    <!--Contact Info - If department name is not set, do not display contact box-->
	<?php while ( have_posts()&& !empty(get_field('department')) ) : the_post(); ?>       
      <div class="contact-box">
        <h2>Contact Information</h2>
        <h3><?php the_field( 'department' ); ?></h3>
          <p>
          	<?php the_field( 'location' ); ?>   
          </p>
          <p>
            <strong>Phone: </strong><?php the_field( 'phone' ); ?><br/>         
            <a href="mailto: <?php the_field( 'email' ); ?>"><?php the_field( 'email' ); ?></a> <br/>    
          </p>
          <p><strong>Office Hours:</strong><br/>
            <?php the_field( 'office_hour' ); ?>   
          </p>
      </div><!--End Contact Info-->

    <?php endwhile; ?>   
      </div>
    </div> 
    <!--Page Content-->   
    <div class="twelve columns" style="margin-top:10px;">
      <ul>

      <?php 

        $cat_names = get_the_terms($post->ID, 'academics');
        if ($cat_names && ! is_wp_error($cat_names)):
            $cat_array = array();
            foreach ( $cat_names as $cat_name ){
              $cat_array[] = $cat_name->name;
            }
            $cat = join(', ', $cat_array);
        endif;
        //var_dump($cat_name[0]['name']);
        //$value = get_query_var($wp_query->query_vars['academics']);
        //echo get_term_by('slug',$value,$wp_query->query_vars['academics']);

        $args = array(
          'academics'        => $cat,
          'orderby'          => 'post_date',
          'order'            => 'DESC',
          'post_type'        => 'employee'
        );
        $the_query = new WP_Query( $args );
        if (have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>       

        <li>
          <?php the_field('employee_name'); ?><br />
          <?php the_field('title'); ?><br />
          <?php the_field('department'); ?><br />
          <?php the_field('phone'); ?><br />
          <?php the_field('email'); ?><br />
          <?php the_field('office'); ?><br />
        </li>
        <?php endwhile; else: ?>
          <p>There are no employees here</p>
        <?php endif; ?>
      </ul>

	</div>
	</div><!-- .container-->


<?php get_footer(); ?>
