<?php

interface CarService
{
    public function getPrice();

    public function getServiceName();
}

class CarInspection implements CarService
{
    public function getPrice()
    {
        return 10;
    }

    public function getServiceName()
    {
        return 'Car inspection; ';
    }
}


class OilChange implements CarService
{
    private $selfService = 30;
    private $service;

    public function __construct(CarService $service)
    {
        $this->service = $service;
    }

    public function getServiceName()
    {
        return $this->service->getServiceName() .' '.'Oil Change; ';
    }

    public function getPrice()
    {
        return ($this->service->getPrice() + $this->selfService);
    }
}

class CarWash implements CarService
{
    private $selfService = 5;
    private $service;

    public function __construct(CarService $service)
    {
        $this->service = $service;
    }
    public function getServiceName()
    {
        return $this->service->getServiceName() .' '.'Car Wash; ';
    }

    public function getPrice()
    {
        return ($this->service->getPrice() + $this->selfService);
    }
}

$service = (new OilChange(new CarInspection));

echo 'Inspection + OilChange =' . $service->getPrice();
echo '<br>';
echo 'Inspection + OilChange =' . $service->getServiceName();
echo '<br>';


$service = (new CarWash (new OilChange(new CarInspection)) );

echo 'Inspection + OilChange +CarWash =' .
    $service->getPrice();
echo '<br>';
echo 'Inspection + OilChange +CarWash =' .
    $service->getServiceName();