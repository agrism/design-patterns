<?php

/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 25.02.2017
 * Time: 13:17
 */
class Pogramm
{

    public $listOfDucks;

    private $startTime;

    /**
     * Pogramm constructor.
     * @param $startTime
     */
    public function __construct()
    {
        $this->startTime = microtime(1);
    }

    function __destruct()
    {
        echo '<hr> Execution time:' . round((microtime(1) - $this->startTime), 5);
    }


    public function main()
    {

        $this->listOfDucks[] = new ExoticDuck();
        $this->listOfDucks[] = new SimpleDuck();
        $this->listOfDucks[] = new WoodenDuck();
        $this->listOfDucks[] = new RubberDuck();


        foreach ($this->listOfDucks as $duck) {
            $duck->display();
            $duck->swim();
            $duck->quack();
            $duck->fly();
            echo '<hr>';
        }

        $upgradableDuck = new UpgradableDuck();

        $upgradableDuck->setFlyBehaviour(new FlyWithWings());
        $upgradableDuck->setQuackBehaviour(new ExoticQuack());

        $upgradableDuck->display();
        $upgradableDuck->swim();
        $upgradableDuck->quack();
        $upgradableDuck->fly();


    }


}