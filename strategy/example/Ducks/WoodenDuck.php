<?php

/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 25.02.2017
 * Time: 16:32
 */
class WoodenDuck extends DuckBase
{


    /**
     * WoodenDuck constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setSwimBehaviour(new SimpleSwim());
    }

    public function display()
    {
       echo 'Hi, I ame an wooden duck!<br>';
    }


}