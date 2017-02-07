<?php
    $app = new Silex\Application();


    $app->get("/", function() {
        $porche = new Car("2014 Porsche 911", 114991, 7864);
        $ford = new Car("2011 Ford F450", 55995, 14241);
        $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
        $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);


        $cars = array($porche, $ford, $lexus, $mercedes);




    });
?>
