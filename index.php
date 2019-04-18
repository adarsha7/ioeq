
<?php
function curl_get_contents($url)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
$url='http://exam.ioe.edu.np';

$string_file=curl_get_contents($url);
$ioe = array();
preg_match_all('!<a href="\/Images\/NotificationsFile\/(.*?)">.*?<\/a>!',$string_file,$match);
$ioe['link'] = $match[1];
preg_match_all('!<td><a href="\/Images\/NotificationsFile\/.*?">(.*?)<\/a><\/td>!',$string_file,$match);
$ioe['title'] = $match[1];
$y='http://exam.ioe.edu.np/Images/NotificationsFile/';
for ($i=0; $i <6 ; $i++) {
$ioe['link'][$i]=$y.($ioe['link'][$i]);
}
print_r(json_encode($ioe));

?>
