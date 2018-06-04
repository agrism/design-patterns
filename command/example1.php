<?php

class Invoker
{
    private $on;
    private $off;

    public function __construct(ICommand $on, ICommand $off)
    {
        $this->on = $on;
        $this->off = $off;
    }

    public function clickOn()
    {
        $this->on->execute();
    }

    public function clickOff()
    {
        $this->off->execute();
    }
}

interface ICommand
{
    public function execute();

    public function unExecute();
}


class Light
{
    public function lightOn()
    {
        echo 'light on<br>';
    }

    public function lightOff()
    {
        echo 'light off<br>';
    }
}

class LightOnCommand implements ICommand
{
    private $instance;

    public function __construct($instance)
    {
        $this->instance = $instance;
    }

    public function execute()
    {
        echo $this->instance->lightOn();
    }

    public function unExecute()
    {
        echo $this->instance->lightOff();
    }
}

class LightOffCommand implements ICommand
{
    private $instance;

    public function __construct($instance)
    {
        $this->instance = $instance;
    }

    public function execute()
    {
        $this->instance->lightOff();
    }

    public function unExecute()
    {
        $this->instance->lightOn();
    }
}


$invoker = new Invoker(new LightOnCommand(new Light()), new LightOffCommand(new Light()));

$invoker->clickOn();
$invoker->clickOff();