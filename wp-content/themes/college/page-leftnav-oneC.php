<?php
/**
 * Template Name: Left Navigation One Column
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
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div>
	</div><!-- .container-->


<?php get_footer(); ?>
