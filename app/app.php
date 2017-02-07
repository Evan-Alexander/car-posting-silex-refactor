<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();


    $app->get("/", function() {
        return "works"
    });
?>

<!-- $output = "";
foreach($cars as $car) {
    $output = $output . "<div class='row'>
        <div class='col-md-6'>
            <img src= " . $ -->
