<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package College
 */
?>

<div class="footerWrapper">    
    <div class="container">
    <!--Sponsorship-->
      <div class="four columns footer-left">
        <?php if( dynamic_sidebar( 'footer_left' )): ?>

        <?php else: ?>
          <h3>About Us</h3>
          <p>Add About Us Text widget</p>
        <?php endif; ?>

      </div>
    <!--Twitter-->
    <div class="eight columns footer-middle">
      <?php if( dynamic_sidebar( 'footer_middle' )): ?>

      <?php else: ?>
        <h3>Twitter</h3>
        <p>Install the TwiGet Plugin and place the widget in the middle footer area.</p>
      <?php endif; ?>

    </div>
    <!--Connect-->
    <div class="four columns footer-right">
      <h3>Connect with CSE</h3>
      <?php if( dynamic_sidebar( 'footer_right' )): ?>

      <?php else: ?>
        <h3>Connect</h3>
        <p>Install the Social Media Plugin and place the widget in the middle footer area.</p>
      <?php endif; ?>

    </div>

  </div>

  <div class="footerWrapper">  
    <div class="container">
    <div class="footerDivider"></div>
      <div class="six columns">
        College of Saint Elizabeth <br/>
        2 Convent Road <br/>
        Morristown, NJ 07960-6989 <br/>
        973-290-4000 <br/><br/>
              
        &copy; 2014 College of Saint Elizabeth
      </div>
      <div class="ten columns">
        <div class="link">
          <a href="/home/contact-us.dot">Contact</a>
          <a href="/dept/human-resources">Employment</a>
          <a href="/directory">Directory</a>
          <a href="/about-cse/maps-and-directions/">Maps</a>
          <a href="/home/sitemap.dot" class="last">Site Index</a>  
        </div>

      </div>
    </div>
  </div>
    <a id="goTop">TOP</a>
  </div>
<?php wp_footer(); ?>

</body>
</html>
