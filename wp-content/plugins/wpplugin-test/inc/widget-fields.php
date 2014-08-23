<p>

	<lable>Title</lable>
	<input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type ="text" value="<?php echo $title; ?>">

</p>
<p>
	<label>How many of your most recent tweets would ou like to display?</label>
	<input size="4" name="<?php echo $this->get_field_name('num_tweets'); ?>" type="text" value="<?php echo $num_tweets; ?>">
</p>

<p>
	<label>Twitter Username</label>
	<input name="<?php echo $this->get_field_name('wpplugin_username'); ?>" type="text" value="<?php echo $wpplugin_username; ?>">
</p>

<p>
	<label>Oauth Access Token</label>
	<input name="<?php echo $this->get_field_name('oauth_access_token'); ?>" type="text" value="<?php echo $oauth_access_token; ?>">
</p>
<p>
	<label>Oauth Access Token Secret</label>
	<input name="<?php echo $this->get_field_name('oauth_access_token_secret'); ?>" type="text" value="<?php echo $oauth_access_token_secret; ?>">
</p>
<p>
	<label>Consumer Key</label>
	<input name="<?php echo $this->get_field_name('consumer_key'); ?>" type="text" value="<?php echo $consumer_key; ?>">
</p>
<p>
	<label>Consumer Secret</label>
	<input name="<?php echo $this->get_field_name('consumer_secret'); ?>" type="text" value="<?php echo $consumer_secret; ?>">
</p>

