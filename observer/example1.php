<?php

interface SubjectInerface
{
    public function attach(ObserverInterface $observer);

    public function detach(ObserverInterface $observer);

    public function notify();
}

interface ObserverInterface
{
    public function update();
}


class Observer implements ObserverInterface
{
    private $name = '';

    public function update()
    {
        echo 'Subject is updated, Observer '. $this->getName().' knows about it!<br>';
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}

class Subject implements SubjectInerface
{
    private $observers = [];

    public function attach(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
        return $this;
    }

    public function detach(ObserverInterface $observer)
    {
        $key = array_search($observer, $this->observers);
        unset($this->observers[$key]);
        return $this;
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}



$subject = new Subject();

$observer1 = new Observer();
$observer1->setName('Observer1');

$observer2 = new Observer();
$observer2->setName('Observer2');

$observer3 = new Observer();
$observer3->setName('Observer3');

$subject->attach($observer1)->attach($observer2)->attach($observer3)->detach($observer2);


$subject->notify();