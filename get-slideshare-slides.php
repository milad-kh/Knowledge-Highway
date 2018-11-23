<?php
//user provided settings
$apikey = '4pvJYcWA';
$secret = 'Jcs0grSE';
$ts = time(); //unix timestamp
$hash = sha1($secret.$ts); //SHA1 (sharedsecret + timestamp)
$postdata = '&api_key='.$apikey.'&ts='.$ts.'&hash='.$hash.'&q=php'.'&items_per_page=1&page=1';
//cURL POST call with SSL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.slideshare.net/api/2/search_slideshows");
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
//execute
$output = curl_exec($ch);
 
if ($output === FALSE) {
  echo "cURL Error: " . curl_error($ch);
} else {
	print_r($output);
}
 
curl_close($ch);
?>