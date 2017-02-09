<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    session_start();

    if (empty($_SESSION['car_results'])) {
        $_SESSION['car_results'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app['debug'] = true;

    $app->get("/", function()  use ($app) {
        return $app['twig']->render('home.html.twig', array('cars' => Car::getAll()));
    });

    $app->post("/create_car", function() use ($app) {

        $cars = new Car($_POST['name'], $_POST['price'], $_POST['miles'], $_POST['image']);
        $cars->save();
        return $app['twig']->render('create_car.html.twig', array('cars' => Car::getAll()));

        // $porche = new Car("2014 Porsche 911", 114991, 7864);
        // $ford = new Car("2011 Ford F450", 55995, 14241);
        // $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
        // $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);
        //
        // $cars = array($porche, $ford, $lexus, $mercedes);

        $cars_matching_search =array();

    });

    $app->post('/delete_cars', function() use ($app) {
        Car::deleteAll();
        return $app['twig']->render('delete_cars.html.twig');
    });
        // foreach ($cars as $car)
        // {
        //     if ($car->worthBuying($_GET["price"], $_GET["miles"]))
        //     {
        //         array_push($cars_matching_search, $car);
        //     }
        // }
        // $output = '';
        // if (empty($cars_matching_search)) {
        //     $output .= '<li>There are no cars matching your search</li>';
        // }
        // else {
        //     foreach ($cars_matching_search as $car) {
        //         $price = $car->getPrice();
        //         $name = $car->getName();
        //         $total_mileage = $car->getMiles();
        //         $output .= '<img src="$car_picture" alt= "picture of $name"/>
        //             <ul>
        //                 <li><em>name:</em> <strong> '. $name .'</strong> - <em>price:</em> <strong>'. $price. '</strong> - <em>mileage:</em> <strong>'. $total_mileage .'</strong></li>
        //             </ul>';
        //     }
        // }
        // return $app['twig']->render('result.html.twig', array('cars' => Car::getAll()));

    return   $app;
?>
