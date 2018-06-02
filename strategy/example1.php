<?php

interface IFly
{
    public function fly();
}

interface IQuack
{
    public function quack();
}

class FlyWithWings implements IFly
{
    public function fly()
    {
        echo 'Fly with wings!';
    }
}

class NoFly implements IFly
{
    public function fly()
    {
        echo 'No fly!';
    }
}

class RegularQuack implements IQuack
{
    public function quack()
    {
        echo 'quack, quack!';
    }
}

class NoQuack implements IQuack
{
    public function quack()
    {
        echo 'no quack!';
    }
}

class ExoticQuack implements IQuack
{
    public function quack()
    {
        echo 'muhahaa muhahaa!';
    }
}

abstract class DuckBase
{
    public $flyBehavior;
    public $quackBehavior;
    public $prop = 1;

    public function __construct()
    {
        $this->flyBehavior = new NoFly();
        $this->prop = 22;
        $this->quackBehavior = new NoQuack;
    }

    public function swim()
    {
        echo 'I swim!';
    }

    public function fly()
    {
        echo $this->flyBehavior->fly();
    }

    public function quack()
    {
        echo $this->quackBehavior->quack();
    }
}

class SimpleDuck extends DuckBase
{
    public function __construct()
    {
        parent::__construct();
        $this->flyBehavior = new FlyWithWings();
        $this->quackBehavior = new ExoticQuack;
    }

    public function display()
    {
        echo 'I am Simple duck';
    }
}

$duck = new SimpleDuck();
$duck->display();
echo '<br>';
$duck->swim();
echo '<br>';
$duck->fly();
echo '<br>';
$duck->quack();
