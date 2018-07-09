<?php

// Bridge pattern

/**
 * Interface Developer
 */
interface Developer
{
    public function writeCode();
}

/**
 * Class JavaDeveloper
 */
class JavaDeveloper implements Developer
{
    public function writeCode()
    {
        echo 'Java developer writes java code...';
    }
}

/**
 * Class CppDeveloper
 */
class CppDeveloper implements Developer
{
    public function writeCode()
    {
        echo 'C++ developer writes C++ code...';
    }
}

/**
 * Class Program
 */
abstract class Program
{
    /**
     * @var Developer
     */
    protected $developer;

    /**
     * Programm constructor.
     * @param $developer
     */
    public function __construct(Developer $developer)
    {
        $this->developer = $developer;
    }

    protected function __destruct()
    {
        echo $this->developer->writeCode();
    }

    public abstract function developProgram();

}

/**
 * Class BankSystem
 */
class BankSystem extends Program
{

    public function developProgram()
    {
        echo "Bank system develop in progress...";
    }
}

/**
 * Class StockExchange
 */
class StockExchange extends Program
{

    public function developProgram()
    {
        echo "Stock Exchange develop in progress...";
    }
}




(new StockExchange(new JavaDeveloper))->developProgram();
echo '<br>';
(new StockExchange(new CppDeveloper()))->developProgram();
echo '<br>';
(new BankSystem(new CppDeveloper()))->developProgram();
echo '<br>';
(new BankSystem(new JavaDeveloper()))->developProgram();




