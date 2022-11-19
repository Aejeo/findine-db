<?php 
require_once __DIR__ . "/vendor/autoload.php";
// connect to mongodb
$client = new MongoDB\Client('mongodb+srv://DhanaBermudez:Dhanabermudez20@cluster0.sqbjxh9.mongodb.net/test');
$db = $client->sample_restaurants;
$collection = $db->restaurants;

$filter = [];
$options = ['sort' => ['cuisine' => 1], 'limit'=>5];
$cursor = $collection->find($filter, $options);
?>