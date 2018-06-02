<?php

class Izejviela{


    public $price = 1;
    public $izejviela;

    public function __construct(Izejviela $obj = null){
        if($obj){
            $this->price += $obj->getPrice();
            $this->izejviela = $obj;
        }
    }

    public function display(){
        echo '-';
    }

    public function getPrice(){
        return $this->price;
    }
}


class Sugar extends Izejviela{

    public function display(){
        return $this->izejviela->display().' sugar';
    }

    public function getPrice(){
        return $this->izejviela->getPrice() + 5;
    }
}

class Milk extends Izejviela{
    public function display(){
        return $this->izejviela->display().' milk';
    }
    public function getPrice(){
        return $this->izejviela->getPrice() + 100;
    }
}


class Tea extends Izejviela{
    public function display(){
        return ' tea';
    }
}



$tea = new Milk(new Sugar(new Tea));


echo  $tea->display().' '. $tea->getPrice();
echo '<br>';

$teaWithoutSugar = new Milk(new Tea);
echo $teaWithoutSugar->display(). ' '. $teaWithoutSugar->getPrice();

?>