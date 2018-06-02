<?php

class Car
{
    public $make;
    public $transmission;
    public $maxSpeed;

    public function buildMake(String $make)
    {
        $this->make = $make;
    }

    public function buildTransmission($transmission)
    {
        $this->transmission = $transmission;
    }

    public function buildMaxSpeed(int $maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;
    }
}

abstract class CarBuilder
{
    public $car;

    public function createCar()
    {
        $this->car = new Car();
    }

    public abstract function buildMake();

    public abstract function buildTransmission();

    public abstract function buildMaxSpeed();

    public function getCar(): Car
    {
        return $this->car;
    }
}

class FordMondeoBuilder extends CarBuilder
{

    public function buildMake()
    {
        $this->car->buildMake("Ford Mondeo");
    }

    public function buildTransmission()
    {
        $this->car->buildTransmission("Auto");
    }

    public function buildMaxSpeed()
    {
        $this->car->buildMaxSpeed(160);
    }
}

class SubaruBuilder extends CarBuilder
{
    public function buildMake()
    {
        $this->car->buildMake("Subaru");
    }

    public function buildTransmission()
    {
        $this->car->buildTransmission("Manual");
    }

    public function buildMaxSpeed()
    {
        $this->car->buildMaxSpeed(320);
    }
}


class Director
{
    public $builder;
    public $car;

    public function setBuilder(CarBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildCar(): Car
    {
        $this->builder->createCar();
        $this->builder->buildMake();
        $this->builder->buildTransmission();
        $this->builder->buildMaxSpeed();
        $this->car = $this->builder->getCar();
        return $this->car;
    }
}


// Main
$director = new Director();
//$director->setBuilder(new FordMondeoBuilder);
$director->setBuilder(new SubaruBuilder);
$director->buildCar();

print_r($director);