<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package College
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <style>
      .slider{
        width: 100%;
      }
      .flexslider{
        margin: 0 auto;
      }
      .headlineHP{
        line-height: 1;
      }
      .cbp-hrmenu .cbp-hrsub {
        z-index: 100;
      }
      .cbp-hrmenu > ul > li {
        margin-bottom: 0;
        font-family: 24px/1.22 "Open Sans Condensed", sans serif;
      }

    </style>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="containerWrap" style="background-color:#003366">
  <div class="container">
    <div class="container">
      <div class="eight columns">
        <div id="cseLogo"><a href=" <?php echo esc_url( home_url( '/' ) ); ?>" title="CSE Homepage"><img src="http://cmsdev2.cse.edu/global/images/home/CSE-Header-Logo.png" alt="CSE Homepage"></a></div>              
      </div>
      
      <div class="eight columns">           
        <div class="circleCenter">      
          <div class="circle"><div class="text"><a href="/alumni/">Give</a></div></div>
          <div class="circle"><div class="text"><a href="/wordpress-test/calendar/">Events</a></div></div>
          <div class="circle"><div class="text"><a href="/apply/">Apply</a></div></div>
        </div> 
        <!-- Search Form --> 
        <?php get_search_form(); ?> 
      </div>
    </div>
    <div class="container">
    <div class="main">
      <!-- HTML Mobile Menu -->
      <div class="showhide">
        <span class="icon"><em></em><em></em><em></em><em></em></span>
        <span class="searchIcon"><img src= "http://cmsdev2.cse.edu/responsive/img/searchIcon.png" alt="Search Icon for Mobile Devices"></span>
      </div>
      <!-- End Test HTML Mobile Menu -->
      <div class="sixteen columns">
        <!-- Search Form -->     
      </div>
      <div class="sixteen columns">
        <!-- Mega Menu -->
        <?php get_template_part('content','megamenu2'); ?>
        
        </div>
      </div>
    </div> 

  </div>  
</div>