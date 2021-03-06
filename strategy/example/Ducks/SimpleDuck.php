<?php

/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 25.02.2017
 * Time: 16:18
 */
class SimpleDuck extends DuckBase
{


    /**
     * SimpleDuck constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setFlyBehaviour(new FlyWithWings());
        $this->setQuackBehaviour(new SimpleQuack());
    }

    public function display()
    {
        echo 'Hi, I am simple Duck!<br>';
    }
}