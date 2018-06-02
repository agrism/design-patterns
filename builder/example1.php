<?php

abstract class HauseBuilder
{

    public function build()
    {
        echo $this->putBasement()->putWall()->putRoof();
    }

    public function putBasement()
    {
        echo 'Put basement; ';
        return $this;
    }

    public abstract function putWall();

    public function putRoof()
    {
        echo 'Put roof; ';
    }
}

class WoodenHause extends HauseBuilder{

    public function putWall()
    {
        echo 'Put wooden wall; ';
        return $this;
    }
}

class StoneHause extends HauseBuilder{

    public function putWall()
    {
        echo 'Put Stone wall; ';
        return $this;
    }
}

(new WoodenHause())->build() ;
echo '<br>';
(new StoneHause())->build() ;