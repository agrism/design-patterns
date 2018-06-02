<?php

interface Watch
{
    public function showTime();
}

interface WatchMaker
{
    public function createWatch();
}

class DigtalWatch implements Watch
{
    public function showTime()
    {
        echo (new DateTime())->format('Y-m-d');
    }
}

class RomanWatch implements Watch
{
    public function showTime()
    {
        echo 'XII-VI';
    }
}


class DigitalWatchMaker implements WatchMaker
{
    public function createWatch(): Watch
    {
        return new DigtalWatch();
    }
}

class RomanWatchMaker implements WatchMaker
{
    public function createWatch(): Watch
    {
        return new RomanWatch();
    }
}


//$watchMaker = new DigitalWatchMaker();
$watchMaker = new RomanWatchMaker();
$watch = $watchMaker->createWatch();
$watch->showTime();


//$myWatch = new RomanWatch();
//$myWatch = new DigtalWatch();
//$myWatch->showTime();




