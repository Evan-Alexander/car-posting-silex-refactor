<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return '<!DOCTYPE html>
                <html>
                <head>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <link rel="stylesheet" href="css/styles.css" type="text/css">
                    <title>Find a Car</title>
                </head>
                <body>
                    <div class="container">
                        <h1>Find a Car!</h1>
                        <form action="/result">
                            <div class="form-group">
                                <label for="price">Enter Maximum Price:</label>
                                <input id="price" name="price" class="form-control" type="number">
                            </div>
                            <div class="form-group">
                                <label for="miles">Enter Maximum Mileage:</label>
                                <input id="miles" name="miles" class="form-control" type="number">
                            </div>
                            <button type="submit" class="btn-success">Submit</button>
                        </form>
                    </div>
                </body>
                </html>';
    });

    $app->get("/result", function() {
        $porche = new Car("2014 Porsche 911", 114991, 7864);
        $ford = new Car("2011 Ford F450", 55995, 14241);
        $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
        $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

        $cars = array($porche, $ford, $lexus, $mercedes);

        $cars_matching_search =array();
        foreach ($cars as $car)
        {
            if ($car->worthBuying($_GET["price"], $_GET["miles"]))
            {
                array_push($cars_matching_search, $car);
            }
        }
        $output = '';
        if (empty($cars_matching_search)) {
            $output .= '<li>There are no cars matching your search</li>';
        }
        else {
            foreach ($cars_matching_search as $car) {
                $price = $car->getPrice();
                $name = $car->getName();
                $total_mileage = $car->getMiles();
                $output .= '<img src="$car_picture" alt= "picture of $name"/>
                    <ul>
                        <li><em>name:</em> <strong> '. $name .'</strong> - <em>price:</em> <strong>'. $price. '</strong> - <em>mileage:</em> <strong>'. $total_mileage .'</strong></li>
                    </ul>';
            }
        }
        return "<!DOCTYPE html>
                <html>
                <head>
                    <title>Your Car Dealership's Homepage</title>
                    <link rel='stylesheet' href='css/styles.css' type='text/css'>
                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
                </head>
                <body>
                    <h1>Your Car Dealership</h1>
                    <ul> $output
                    </ul>
                </body>
                </html>";
                    });
    return   $app;
?>
