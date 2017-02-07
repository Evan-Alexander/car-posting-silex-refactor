<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;

        function __construct($car_name, $car_price, $car_miles)
        {
            $this->make_model = $car_name;
            $this->price = $car_price;
            $this->miles = $car_miles;

        }
    }
?>
