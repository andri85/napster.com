<?php
$token = "";
	
$code="";
if ($_GET['code'] != null && $_GET['code'] != ""){
	$code = $_GET['code'];
}

$type="json";
if ($_GET['type'] != null && $_GET['type'] != ""){
	$type = $_GET['type'];
}

$url="https://uptobox.com/api/link?token=".$token."&id=".$code;
$return = file_get_contents($url);

$jsonData = json_decode($return, true);
$esito = $jsonData['statusCode'];
$link = "";
$message = "";
if ($esito=="0"){
	$data = $jsonData['data'];
	$link = $data['dlLink'];
	$jsData = explode("/", $link);
	$name = urldecode(end($jsData));
}else{
	$message = $jsonData['message'];
}

$toRet = ;
if ($link == ""){
	$link = "";
	$name = $message;
}
if ($type == "json"){
	$toRet = '{"link": "'.$link.'", "name": "'.$name.'"}';
}
if ($type == "html"){
	$toRet = '<a href="'.$link.'">'.$name.'</a>';
}
if ($type == "m3u"){
	$toRet = "#EXTM3U\n\n#EXTINF:-1,".$name."\n".$link;
	header ("Content-type: application/x-mpegURL");
	header ('Content-Disposition: attachment; filename="MovieUpt.m3u"');
	header ("Pragma: no-cache");
	header ("Expires: 0");
}
echo $toRet;
?>
