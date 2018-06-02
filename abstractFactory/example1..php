<?php

// izmanto varākas Faktorymethod patternus

interface Keyboard {
    public function print();
    public function printLn();
}

interface TouchPad{
    public function track(int $deltaX, int  $deltaY);
}

interface Mouse{
    public function click();
    public function dblClick();
    public function scroll(int $direction);
}

interface DeviceFactory{
    public function getKeyboard(): Keyboard;
    public function getMouse(): Mouse;
    public function getTouchPad(): TouchPad;
}

class RuMouse implements Mouse {

    public function click()
    {
        echo 'ru mouse click!';
    }
    public function dblClick()
    {
        echo 'ru mouse dbl click!';
    }

    public function scroll(int $direction)
    {
        echo 'ru ouse scroll';
    }
}

class RuTouchPad implements TouchPad{
    public function track(int $deltaX, int $deltaY)
    {
        echo 'ru touchpad truck';
    }
}

class RuKeyboard implements Keyboard{
    public function print()
    {
        echo 'ŗu keyboard print';
    }

    public function printLn()
    {
        echo 'ru keyboard printLn';
    }

}

class EnMouse implements Mouse {

    public function click()
    {
        echo 'en mouse click!';
    }
    public function dblClick()
    {
        echo 'en mouse dbl click!';
    }

    public function scroll(int $direction)
    {
        echo 'en ouse scroll\n';
    }
}

class EnTouchPagd implements TouchPad{
    public function track(int $deltaX, int $deltaY)
    {
        echo 'en touchpad truck';
    }

}

class EnKeyboard implements Keyboard{
    public function print()
    {
        echo 'en keyboard print';
    }

    public function printLn()
    {
        echo 'en keyboard printLn';
    }

}

class RuDeviceFactory implements DeviceFactory{
    public function getKeyboard(): Keyboard
    {
        return new RuKeyboard();
    }

    public function getMouse(): Mouse
    {
        return new RuMouse();
    }

    public function getTouchPad(): TouchPad
    {
        return new RuTouchPad();
    }

}

class EnDeviceFactory implements DeviceFactory{
    public function getKeyboard(): Keyboard
    {
        return new EnKeyboard();
    }

    public function getMouse(): Mouse
    {
        return new EnMouse();
    }

    public function getTouchPad(): TouchPad
    {
        return new EnTouchPagd();
    }

}

// main

$factory = new EnDeviceFactory();
$mouse = $factory->getMouse();
$keyboard = $factory->getKeyboard();
$touchpad = $factory->getTouchPad();

$mouse->click();
$mouse->dblClick();
$keyboard->print();
$touchpad->track(1,2);