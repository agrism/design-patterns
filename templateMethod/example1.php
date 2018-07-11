<?php


abstract class C
{
    public abstract function differ();

    public abstract function differ2();

    public final function renderTemplate()
    {
        echo '1';
        $this->differ();
        echo '3';
        $this->differ2();
    }
}


class A extends C
{
    public function differ()
    {
        echo '2';
    }

    public function differ2()
    {
        echo '5';
    }
}

class B extends C
{
    public function differ()
    {
        echo '4';
    }

    public function differ2()
    {

    }
}

(new A())->renderTemplate();

echo '<br>';

(new B())->renderTemplate();