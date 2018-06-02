<?php

/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 25.02.2017
 * Time: 18:17
 */
class SimpleQuack implements IQuackable
{

    public function quack()
    {
        echo 'Quack, Quack!<br>';
    }
}