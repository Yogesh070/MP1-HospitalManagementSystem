<?php
$url='https://newsapi.org/v2';
$api_key='2afb998ab8a948e38840400729c73838';
$collection_name='top-headlines?category=health&apiKey';
$request_url=$url.'/'.$collection_name.'='.$api_key;

$curl= curl_init($request_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'X-Api-Key: 2afb998ab8a948e38840400729c73838',
  'Content-Type: application/json'
]);
$response = curl_exec($curl);

$decodedData=json_decode($response,true);

curl_close($curl);
// echo $response . PHP_EOL;

// echo $decodedData['articles'][0]['title'];
// foreach ($decodedData['articles'] as $title) {
//     echo $title['title'];
// }
// String getTitle(){
//     foreach ($decodedData['articles'] as $title) {
//         return $title['title'];
//     }
// }
