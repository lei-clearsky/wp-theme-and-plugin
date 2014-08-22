<?php
/**
 * The template used for displaying upcoming events content in page-home.php
 *
 * @package College
 */
?>

    <h2 class="title clearfix">
      <span>Upcoming Events</span>
    </h2>
    <?php if( dynamic_sidebar( 'home_upcoming_events' )): ?>

    <?php else: ?>
      <h3>Upcoming Events</h3>
      <p>Install Event Organizer Plugin.</p>
    <?php endif; ?>

    