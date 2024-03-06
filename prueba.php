<?php
$url_servicio = "http://zoologico.laravel/rest";
$curl = curl_init($url_servicio);

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta_curl = curl_exec($curl);
curl_close($curl);

$respuesta_decodificada = json_decode($respuesta_curl);
