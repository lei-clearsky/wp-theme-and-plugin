<?php

/**
 * Plugin Name: Plugin Test
 * Plugin URI: None
 * Description: This is a test Plugin.
 * Version: 1.0
 * Author: Lei
 * License: GPL2
 */

/*
 * Assign global variables
 *
 */

//$plugin_url = WP_PLUGIN_URL . '/wpplugin-test';
$options = array();
$display_json = false;

/*
 * Add a link to our plugin in the admin menu
 * under 'Settings > Plugin Test'
 *
 */


function wpplugin_test_menu(){
	/* Use the add_options_page function 
	 * add_options_page($page_title, $menu_title, $capability, $menu-slug, $function) */

	add_options_page(
		'Plugin Test',
		'Plugin Test Menu',
		'manage_options',
		'wpplugin-text',
		'wpplugin_test_options_pages'
	);

}

add_action('admin_menu','wpplugin_test_menu');

function wpplugin_test_options_pages(){
	if(!current_user_can('manage_options')){
		wp_die('You do not have sufficient permission to access this page.');

	}

	//global $plugin_url;
	global $options;
	global $display_json;

	if(isset($_POST['wpplugin_form_submitted'])){
			$hidden_field = esc_html($_POST['wpplugin_form_submitted']);
			if($hidden_field=="Y"){
				$wpplugin_username = esc_html($_POST['wpplugin_username']);
				$wpplugin_tweets_count = esc_html($_POST['wpplugin_tweets_count']);
				$oauth_access_token = esc_html($_POST['oauth_access_token']);
				$oauth_access_token_secret= esc_html($_POST['oauth_access_token_secret']);
				$consumer_key = esc_html($_POST['consumer_key']);
				$consumer_secret = esc_html($_POST['consumer_secret']);


				$wpplugin_profile = wpplugin_test_get_profile( $wpplugin_username, $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret, $wpplugin_tweets_count);

				$options['wpplugin_username'] = $wpplugin_username;
				$options['wpplugin_tweets_count'] = $wpplugin_tweets_count;
				$options['oauth_access_token'] = $oauth_access_token;
				$options['oauth_access_token_secret'] = $oauth_access_token_secret;
				$options['consumer_key'] = $consumer_key;
				$options['consumer_secret'] = $consumer_secret;
				$options['wpplugin_profile']  = $wpplugin_profile;
				$options['last_updated']	  = time();

				update_option('wpplugin_tweets', $options);
				
			}
	}

	$options = get_option('wpplugin_tweets');

	if ($options !=''){
		$wpplugin_username = $options['wpplugin_username'];
		$wpplugin_profile = $options['wpplugin_profile'];

		$wpplugin_tweets_count = $options['wpplugin_tweets_count'];
		$oauth_access_token = $options['oauth_access_token'];
		$oauth_access_token_secret = $options['oauth_access_token_secret'];
		$consumer_key = $options['consumer_key'];
		$consumer_secret = $options['consumer_secret'];
	}

	require('inc/options-page-wrapper.php');
}

class Wpplugin_Twitter_Widget extends WP_Widget {

	function wpplugin_twitter_widget() {
		// Instantiate the parent object
		parent::__construct( false, 'Twitter User Timeline Widget' );
	}

	function widget( $args, $instance ) {
		// Widget output

		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		//$num_tweets = $instance['num_tweets'];

		$wpplugin_username = esc_html($instance['wpplugin_username']);
		$wpplugin_tweets_count = esc_html($instance['num_tweets']);
		$oauth_access_token = esc_html($instance['oauth_access_token']);
		$oauth_access_token_secret= esc_html($instance['oauth_access_token_secret']);
		$consumer_key = esc_html($instance['consumer_key']);
		$consumer_secret = esc_html($instance['consumer_secret']);


		$wpplugin_profile = wpplugin_test_get_profile( $wpplugin_username, $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret, $wpplugin_tweets_count);

		$options['wpplugin_username'] = $wpplugin_username;
		$options['wpplugin_tweets_count'] = $wpplugin_tweets_count;
		$options['oauth_access_token'] = $oauth_access_token;
		$options['oauth_access_token_secret'] = $oauth_access_token_secret;
		$options['consumer_key'] = $consumer_key;
		$options['consumer_secret'] = $consumer_secret;
		$options['wpplugin_profile']  = $wpplugin_profile;
		$options['last_updated']	  = time();

		update_option('wpplugin_tweets', $options);

		$options = get_option('wpplugin_tweets');
		$wpplugin_profile = $options['wpplugin_profile'];

		require('inc/front-end.php');
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['num_tweets'] = strip_tags($new_instance['num_tweets']);

		$instance['wpplugin_username'] = strip_tags($new_instance['wpplugin_username']);
		$instance['oauth_access_token'] = strip_tags($new_instance['oauth_access_token']);
		$instance['oauth_access_token_secret'] = strip_tags($new_instance['oauth_access_token_secret']);
		$instance['consumer_key'] = strip_tags($new_instance['consumer_key']);
		$instance['consumer_secret'] = strip_tags($new_instance['consumer_secret']);

		return $instance;

	}

	function form( $instance ) {
		// Output admin widget options form

		$title = esc_attr($instance['title']);
		$num_tweets = esc_attr($instance['num_tweets']);

		//$options = get_option('wpplugin_tweets');
		//$wpplugin_profile = $options['wpplugin_profile'];

		$wpplugin_username = esc_html($instance['wpplugin_username']);
		$oauth_access_token = esc_attr($instance['oauth_access_token']);
		$oauth_access_token_secret = esc_attr($instance['oauth_access_token_secret']);
		$consumer_key = esc_attr($instance['consumer_key']);
		$consumer_secret = esc_attr($instance['consumer_secret']);

		$options = get_option('wpplugin_tweets');
		$wpplugin_profile = $options['wpplugin_profile'];

		require('inc/widget-fields.php');
	}
}

function wpplugin_twitter_register_widgets() {
	register_widget( 'Wpplugin_Twitter_Widget' );
}

add_action( 'widgets_init', 'wpplugin_twitter_register_widgets' );


// wpplugin_test_get_profile function
function wpplugin_test_get_profile( $wpplugin_username, $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret, $wpplugin_tweets_count ){

	require_once('TwitterAPIExchange.php');
	$settings = array(
		'oauth_access_token' => $oauth_access_token,
		'oauth_access_token_secret' => $oauth_access_token_secret,
		'consumer_key' => $consumer_key,
		'consumer_secret' => $consumer_secret
	);

	$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
	$requestMethod = "GET";
	//if (isset($_GET[$wpplugin_username]))  {$user = $_GET[$wpplugin_username];}  else {$user  = "";}
	//if (isset($_GET[$wpplugin_tweets_count])) {$user = $_GET[$wpplugin_tweets_count];} else {$count = 20;}
	$user = $wpplugin_username;
	$count = $wpplugin_tweets_count;
	$getfield = "?screen_name=$user&count=$count";
	$twitter = new TwitterAPIExchange($settings);
	$string = json_decode($twitter->setGetfield($getfield)
	->buildOauth($url, $requestMethod)
	->performRequest(),$assoc = TRUE);

	return $string;

	//$json_feed_url = 'https://github.com/' . $wpplugin_username . '.json';
	//$args = array('timeout' => 120);

	//$json_feed = wp_remote_get($json_feed_url, $args);
	//$wpplugin_profile = json_decode($json_feed['body']);

	//return $wpplugin_profile;

}

/*function wpplugin_test_styles(){
	wp_enqueue_style('wpplugin_test_styles', plugin_url('wpplugin-test/wpplugin-test.css'));
}

add_action('admin_head', 'wpplugin_test_styles');*/







?>