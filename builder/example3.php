<?php

interface BuilderIterface{
    public function setName($name);
    public function setSpeed($speed);
    public function setColor($coloer);
    public function getName();
    public function getSpeed();
    public function getColor();
}


class Car{

    private $carName;
    private $carColor;
    private $carSpeed;

    public function __construct(CarBuilder $carBuilder)
    {
        $this->carName = $carBuilder->getName();
        $this->carSpeed = $carBuilder->getSpeed();
        $this->carColor = $carBuilder->getColor();
    }
}


class CarBuilder implements  BuilderIterface {

    private $name = 'Lada';
    private $color = 'grey';
    private $speed = 120;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }


    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function build(){
        return new Car($this);
    }


}


$car = (new CarBuilder)->setColor('reeeeeeeeeeeeed')
//    ->setSpeed(280)
    ->setName('Ferrari');


echo '<pre>';
//var_dump($car);
var_dump($car->build());
echo '</pre>';