<?php
 
function curl_download($Url){


    if (!function_exists('curl_init')){
        die('cURL is not installed. Install and try again.');
    }
  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
  
$start = strpos($output, '<h2 id="books-last1">Top 100 EBooks yesterday</h2>');
$end = strpos($output, '<p>', $start);
$length = $end-$start;
$output = substr($output, $start, $length);

    return $output;
}
 
print curl_download('http://www.gutenberg.org/browse/scores/top');
 
?>
