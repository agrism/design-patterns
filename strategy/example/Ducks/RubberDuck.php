<?php

/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 25.02.2017
 * Time: 16:34
 */
class RubberDuck extends DuckBase
{


    /**
     * RubberDuck constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setQuackBehaviour(new SimpleQuack());
    }

    public function display()
    {
        echo 'Hi, I am and rubber Duck<br>';
    }

}