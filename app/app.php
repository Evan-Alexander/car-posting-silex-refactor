<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return
    });

    $app->get("/result", function() {
        return "<!DOCTYPE html>
                <html>
                <head>
                    <title>Your Car Dealership's Homepage</title>
                    <link rel='stylesheet' href='css/styles.css' type='text/css'>
                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
                </head>
                <body>
                    <h1>Your Car Dealership</h1>
                    <ul>" .
                            if (empty($cars_matching_search)) {
                                echo '<li>There are no cars matching your search</li>';
                            }
                            else {
                                foreach ($cars_matching_search as $car) {
                                    $price = $car->getPrice();
                                    $name = $car->getMakeModel();
                                    $total_mileage = $car->getMiles();
                                    $car_style = $car->getStyle();
                                    $car_picture = $car->getPicture();
                                    echo '<img src="$car_picture" alt= "picture of $name"/>
                                        <ul>
                                            <li><em>name:</em> <strong>$name</strong>($car_style) - <em>price:</em> <strong>$price</strong> - <em>mileage:</em> <strong>$total_mileage</strong></li>
                                        </ul>';
                                }
                            } .
                    "</ul>
                </body>
                </html>";
                    });
?>

<!-- $output = "";
foreach($cars as $car) {
    $output = $output . "<div class='row'>
        <div class='col-md-6'>
            <img src= " . $ -->
