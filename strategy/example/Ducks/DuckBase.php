<?php

/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 25.02.2017
 * Time: 13:28
 */
abstract class DuckBase
{

    protected $flyBehaviour;
    protected $quackBehaviour;
    protected $swimBehaviour;

    /**
     * DuckBase constructor.
     */
    public function __construct()
    {
        $this->setFlyBehaviour(new NoFly());
        $this->setQuackBehaviour(new NoQuack());
        $this->setSwimBehaviour(new NoSwim());
    }

    /**
     * @param IFlyable $flyBehaviour
     */
    public function setFlyBehaviour(IFlyable $flyBehaviour)
    {
        $this->flyBehaviour = $flyBehaviour;
    }

    /**
     * @param IQuackable $quackBehaviour
     */
    public function setQuackBehaviour(IQuackable $quackBehaviour)
    {
        $this->quackBehaviour = $quackBehaviour;
    }

    /**
     * @param ISwimable $swimBehaviour
     */
    public function setSwimBehaviour(ISwimable $swimBehaviour)
    {
        $this->swimBehaviour = $swimBehaviour;
    }


    public function swim()
    {
        $this->swimBehaviour->swim();
    }

    public function quack()
    {
        $this->quackBehaviour->quack();
    }

    public function fly()
    {
        $this->flyBehaviour->fly();
    }



    public abstract function display();
}