<?php 
     require_once __DIR__ . "/vendor/autoload.php";
     $items = (new MongoDB\Client)->online_store->store;
     $vendors = (new MongoDB\Client)->online_store->vendors;
?>