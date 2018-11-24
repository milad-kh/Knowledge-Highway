<?php
$handle = curl_init();
$url = "https://www.googleapis.com/youtube/v3/search?q=kaveh+afagh&maxResults=25&part=snippet&key=AIzaSyC1VMwaeV9ds1vaGsnayvuBxhtgs0V6NkM";
// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($handle);
curl_close($handle);
$output = json_decode($output);
// print_r($output->items);
foreach ($output->items as $key => $value) {
	$videoUrl = "https://www.youtube.com/embed/" . $value->id->videoId;
	?>
	<iframe width="560" height="315" src="<?php echo($videoUrl); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<?php
}