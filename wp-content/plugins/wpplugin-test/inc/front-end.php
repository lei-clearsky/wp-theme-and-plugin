<?php

	echo $before_widget;

	echo $before_title . $title . $after_title;


	if($wpplugin_profile["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$wpplugin_profile[errors][0]["message"]."</em></p>";exit();}
		
		echo "<p>" . $wpplugin_username . "</p>";

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

						

	echo $after_widget;

?>