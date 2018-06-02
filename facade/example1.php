<?php


class Power
{
    public function on()
    {
        echo 'power is on!';
    }

    public function off()
    {
        echo 'power is off!';
    }
}

class DVDRom
{
    public $isCdLoaded = false;

    public function load()
    {
        $this->isCdLoaded = true;
    }

    public function unLoad()
    {
        $this->isCdLoaded = false;
    }
}

class HDD
{
    public function copyDataFromDVD(DVDRom $DVDRom)
    {
        if ($DVDRom->isCdLoaded == true) {
            echo 'Copying data from DVD to HDD';
        } else {
            echo 'Put DVD in rom';
        }
    }
}

/*
$power = new Power();
$DVDRom = new DVDRom();
$DVDRom->load();
$DVDRom->unLoad();
$hdd = new HDD();
$hdd->copyDataFromDVD($DVDRom);
*/

class Computer
{
    private $power;
    private $DVDRom;
    private $hdd;

    public function copy(){
        $this->power = new Power();
        $this->DVDRom = new DVDRom();
        $this->DVDRom->load();
        $this->hdd = new HDD();
        $this->hdd->copyDataFromDVD($this->DVDRom);
    }
}

$computer = new Computer();
$computer->copy();



