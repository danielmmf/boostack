<?php

$url = 'http://localhost/api/books';
$fields = array ('name' =>'teste',
'description' => 'teste',
'mail' => 'teste');
$fields_string="";
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

$ch = curl_init();
$header = array();
//$header[] = 'Content-length: 0';
$header[] = 'Content-type: application/x-www-form-urlencoded';
$header[] = 'Authorization: Token aRIc450qMmmGrLTbEWYZarkXiEuBzsZJ:DGJNqjAAY905r0QHgZtfgZVDK40zbIc2';
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
$result = curl_exec($ch);
curl_close($ch);
//check the result
var_dump($result);