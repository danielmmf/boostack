<?php

$url = 'http://localhost/api/books/1';


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Token aRIc450qMmmGrLTbEWYZarkXiEuBzsZJ:DGJNqjAAY905r0QHgZtfgZVDK40zbIc2",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$livro = $resp;



$url = 'http://localhost/api/books';
$livro = json_decode($livro, true);
$fields = array ('name' =>$livro['name'],
'description' => $livro['description'],
'mail' => 'teste');

$fields_string="";
foreach($fields as $key=>$value) { 
   $fields_string .= $key.'='.$value.'&'; }
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

