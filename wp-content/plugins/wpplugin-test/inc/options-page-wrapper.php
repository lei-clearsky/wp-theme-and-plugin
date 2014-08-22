<div class="wrap">
	
	<div id="icon-options-general" class="icon32"></div>
	<h2>Plugin Test</h2>
	
	<div id="poststuff">
	
		<div id="post-body" class="metabox-holder columns-2">
		
			<!-- main content -->
			<div id="post-body-content">
				
				<div class="meta-box-sortables ui-sortable">

					<?php if(!isset($wpplugin_username) || $wpplugin_username == ''): ?>
					
					<div class="postbox">
					
						<h3><span>Let's Get Started!</span></h3>
						<div class="inside">
							<form name="wpplugin_username_form" method="post" action="">
								<input type="hidden" name="wpplugin_form_submitted" value="Y" />
								<table class="form-table">
									<tr>
										<td><label for="wpplugin_username">Username</td>
										<td>
											<input name="wpplugin_username" id="wpplugin_username" type="text" value="" class="regular-text" />
										</td>
									</tr>
									<tr>
										<td><label for="wpplugin_tweets_count">Count</td>
										<td>
											<input name="wpplugin_tweets_count" id="wpplugin_tweets_count" type="text" value="" class="regular-text" />
										</td>
									</tr>
									<tr>
										<td><label for="oauth_access_token">Oauth Access Token</td>
										<td>
											<input name="oauth_access_token" id="oauth_access_token" type="text" value="" class="regular-text" />
										</td>
									</tr>
									<tr>
										<td><label for="oauth_access_token_secret">Oauth Access Token Secret</td>
										<td>
											<input name="oauth_access_token_secret" id="oauth_access_token_secret" type="text" value="" class="regular-text" />
										</td>
									</tr>
									<tr>
										<td><label for="consumer_key">Consumer Key</td>
										<td>
											<input name="consumer_key" id="consumer_key" type="text" value="" class="regular-text" />
										</td>
									</tr>
									<tr>
										<td><label for="consumer_secret">Consumer Secret</td>
										<td>
											<input name="consumer_secret" id="consumer_secret" type="text" value="" class="regular-text" />
										</td>
									</tr>
									
								</table>
								<p><input class="button-primary" type="submit" name="wpplugin_username_submit" value="Save" /></p>
							</form>
						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->

				<?php else: ?>

					<div class="postbox">
					
						<h3><span>Most Recent Tweets</span></h3>
						<div class="inside">
							<?php
							/*
							foreach($wpplugin_profile as $repository){
								echo '<p>' . $repository->{'created_at'} . '</p>';
								echo '<p><a href = ' . $repository->{'repository'}->{'html_url'} . '>'. $repository->{'repository'}->{'name'} . '</a></p>';
							}
							*/
							if($wpplugin_profile["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$wpplugin_profile[errors][0]["message"]."</em></p>";exit();}
								foreach($wpplugin_profile as $items)
								    {
								        echo "Time and Date of Tweet: ".$items['created_at']."<br />";
								        echo "Tweet: ". $items['text']."<br />";
								        echo "Tweeted by: ". $items['user']['name']."<br />";
								        echo "Screen name: ". $items['user']['screen_name']."<br />";
								        echo "Followers: ". $items['user']['followers_count']."<br />";
								        echo "Friends: ". $items['user']['friends_count']."<br />";
								        echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
								    }
							?>
							<!--
							<p>
								<?php // echo $wpplugin_profile[0]->{'created_at'} ?>
							</p>
							-->
							<?php if ($display_json == true): ?>
							<pre><code>
								<?php var_dump($wpplugin_profile); ?>
							</code></pre>
							<?php endif; ?>
						</div>
					</div> <!-- .postbox -->

				<? endif; ?>
					
				</div> <!-- .meta-box-sortables .ui-sortable -->
				
			</div> <!-- post-body-content -->
			
			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">
				
				<div class="meta-box-sortables">
					
					<?php if(isset($wpplugin_username) && $wpplugin_username != ''): ?>
					
					<div class="postbox">
					
						<h3><span>User Profile</span></h3>
						<div class="inside">
							<p><img class="wpplugin-gravatarr" src="<?php echo $wpplugin_profile[0]['user']['profile_image_url'] ?>" /></p>
							<p class="wpplugin-test-name">
								<?php echo "Tweets: " . $wpplugin_profile[0]['user']['statuses_count'] ?>
							</p>
							<p class="wpplugin-test-name">
								<?php echo "Followers: ". $wpplugin_profile[0]['user']['followers_count'] ?>
							</p>

							<form name="wpplugin_username_form" method="post" action="">
								<input type="hidden" name="wpplugin_form_submitted" value="Y" />
								<p><label for="wpplugin_username">Username</p>
									<input name="wpplugin_username" id="wpplugin_username" type="text" value="<?php echo $wpplugin_username; ?>" />
								<p><label for="wpplugin_tweets_count">Count</p>
									<input name="wpplugin_tweets_count" id="wpplugin_tweets_count" type="text" value="<?php echo $wpplugin_tweets_count; ?>" />
								<p><label for="oauth_access_token">Oauth Access Token</p>
									<input name="oauth_access_token" id="oauth_access_token" type="text" value="<?php echo $oauth_access_token; ?>" />
								<p><label for="oauth_access_token_secret">Oauth Access Token Secret</p>
									<input name="oauth_access_token_secret" id="oauth_access_token_secret" type="text" value="<?php echo $oauth_access_token_secret; ?>" />
								<p><label for="consumer_key">Consumer Key</p>
									<input name="consumer_key" id="consumer_key" type="text" value="<?php echo $consumer_key; ?>" />
								<p><label for="consumer_secret">Consumer Secret</p>
									<input name="consumer_secret" id="consumer_secret" type="text" value="<?php echo $consumer_secret; ?>" />
								<p>
									<input class="button-primary" type="submit" name="wpplugin_username_submit" value="Update" />
								</p>	
							</form>

						</div> <!-- .inside -->


						
					</div> <!-- .postbox -->
					<?php endif ?>
				</div> <!-- .meta-box-sortables -->
				
			</div> <!-- #postbox-container-1 .postbox-container -->
			
		</div> <!-- #post-body .metabox-holder .columns-2 -->
		
		<br class="clear">
	</div> <!-- #poststuff -->
	
</div> <!-- .wrap -->