<?php get_header(); ?>

	<div class="headerWrap2" style = "background-color: #6394bf; padding: 10px;">
    <div class="container">
      <div class="sixteen columns">
        <?php the_title( '<h3>', '</h3>' ); ?>  
      </div>
    </div>
  </div>

  <div class="container">
    <div class="sixteen clearfix" style="margin-top:20px;">
      <div class="twelve columns alpha">

		<?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>

        <h2><?php the_title(); ?></h2>
        <?php echo do_shortcode( '[csbshare]' ) ?>
        <p><?php the_field( 'article' ); ?></p>
		<?php endwhile; else: ?>
      <p>There are no news here</p>
    <?php endif; ?>

      </div>
      <div class="four columns omega">
        <?php get_sidebar() ?>
      </div>
    
  </div>
	</div><!-- .container-->


<?php get_footer(); ?>