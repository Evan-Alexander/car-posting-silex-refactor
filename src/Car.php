<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        private $image;

        function __construct($car_name, $car_price, $car_miles, $car_image)
        {
            $this->make_model = $car_name;
            $this->price = $car_price;
            $this->miles = $car_miles;
            $this->image = $car_image;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setPrice($new_price)
        {
            $this->price = $new_price;
        }

        function setMiles($new_miles)
        {
            $this->miles = $new_miles;
        }

        function setImage($new_image)
        {
            $this->image = $new_image;
        }

        function getName()
        {
            return $this->name;
        }

        function getPrice()
        {
            return $this->price;
        }
        function getMiles()
        {
            return $this->miles;
        }
        function getImage()
        {
            return $this->image;
        }
        function worthBuying($max_price, $max_miles)
        {
            if($max_price >= $this->price && $max_miles >= $this->miles)
            {
            return $this->price && $this->miles;
            }
        }
    }
?>
