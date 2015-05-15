<?php
function printImages($userID){
		$url = 'https://api.instagram.com/v1/users/'.$userID.'/media/recent?client_id='.clientID.'&count=5';
		$instagramInfo = connectToInstagram($url);
		$results = json_decode($instagramInfo, true);
		//Parse through the info one by one
		foreach ($results['data'] as $items) {
			$image_url  = $items['images']['low_resolution']['url'];//going through all of my results and give myself back 
			//the url of those pictures because we want to save it in the php Server
			echo '<img src=" '.$image_url.' "/><br/>';
			//calling function to save $image_url 
			savePictures($image_url);		
		}
	}
		printImages($userID);
	?>