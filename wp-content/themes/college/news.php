<?php
/**
 * Template Name: News
 * The template for displaying all News.
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
    <div class="sixteen columns" style="margin-top:20px;">
       
    </div>

      <?php
        $args = array(
          'post_type' => 'news',
          'meta_key' => 'date',
          'orderby' => 'meta_value_num',
          'order' => 'DESC'
        );
        $the_query = new WP_Query( $args );
      ?>
      <div class="twelve columns">
        <div class="twelve clearfix">
          <?php the_title( '<h2>', '</h2>' ); ?>
		  <?php if (have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>       
      
        <div class="four columns alpha">
          <img src="<?php the_field( 'image' ); ?>" class="scale-with-grid">
        </div>
        <div class="eight columns omega">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php the_field( 'summary' ); ?> <a href="<?php the_permalink(); ?>">Read More</a></p>
          
        </div>
        <hr />
		<?php endwhile; else: ?>
      <p>There are no news here</p>
    <?php endif; ?>
      </div>
      </div>

      <div class="four columns">
        <h2>Categories</h2>
        <?php
          $newsCategories = get_object_taxonomies('news');

            if(count($newsCategories) > 0)
            {
               foreach($newsCategories as $newsCategory)
               {
                 $args = array(
                      'orderby' => 'ID',
                      'show_count' => 0,
                      'pad_counts' => 0,
                      'hierarchical' => 1,
                      'taxonomy' => $newsCategory,
                      'title_li' => '',
                      'exclude' => '1'
                    );

                 wp_list_categories( $args );
               }
            }
        ?>
      </div>

  </div>
	</div><!-- .container-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
