<?php

/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 25.02.2017
 * Time: 16:18
 */
class ExoticDuck extends DuckBase
{

    /**
     * ExoticDuck constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setFlyBehaviour(new FlyWithWings());
        $this->setQuackBehaviour(new ExoticQuack());
    }



    /**
     * ExoticDuck constructor.
     */


    public function display()
    {
        echo 'Hi, I am exotic Duck!<br>';
    }

}