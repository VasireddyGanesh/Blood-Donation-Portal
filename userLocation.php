<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

$data = [
"text" => "666 Fifth Ave",
"size" => "5",
];

curl_setopt($ch, CURLOPT_URL, "https://app.geocodeapi.io/api/v1/autocomplete?" . http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
"Content-Type: application/json",
"apikey: d237f260-4886-11ec-87ce-4157241fd43c",
));

$response = curl_exec($ch);
curl_close($ch);

$json = json_decode($response);

var_dump($json);

?>
<!-- 
print_r($json); -->