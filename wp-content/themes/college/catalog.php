<?php
/**
 * Template Name: Catalog
 * The template for displaying all catalog items.
 *
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

      <?php
        $args = array(
          'post_type' => 'catalog-program',
          'orderby' => 'title',
          'order' => 'DESC'
        );
        $the_query = new WP_Query( $args );
      ?>
      <div class="sixteen columns">
        <?php the_title( '<h2>', '</h2>' ); ?>
        <div id="buttons"></div>
        <div id="catalog-programs">
		      <?php if (have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>  

            <div class="catalog-program <?php the_field( 'program_class' ); ?>" data-tags="<?php the_field( 'degree_type' ); ?>" >
              <a href="<?php the_field( 'program_detail_url' ); ?>" data-description="<?php the_field( 'program_summary' ); ?>" data-title="<?php the_field( 'program_name' ); ?>">
                <h3><?php the_field( 'program_name' ); ?></h3>
                <h4><?php the_field( 'degree_type' ); ?></h4>
              </a>
            </div>

          <?php endwhile; endif; ?>

        </div>
      </div>

	</div><!-- .container-->


<?php get_footer(); ?>
