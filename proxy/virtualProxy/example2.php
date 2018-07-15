<?php

abstract class ITorrent{
    protected abstract function open();
}

class Torrent extends ITorrent{

    protected $host = 'some-torrent.com';

    public function __construct()
    {
        echo 'real Torrent init<br>';
    }

    // do not have access to open without proxy!
    protected function open()
    {
        echo 'opening '.$this->host;
    }
}

class Proxy extends ITorrent{

    private $torrent;

    protected function open()
    {
        $this->torrent = new Torrent();
        $this->torrent->open();
    }

    public function openUrl(){
        $this->open();
    }
}


echo '1. Without proxy:<br>';
echo '1.1. Init Torrent:<br>';
$torrent = new Torrent();
echo '1.2. No possibility to open<br>';



echo '<hr>';


echo '2. With proxy:<br>';
echo '2.1. Init Proxy:<br>';
$torrent = new Proxy();
echo '2.2. Open proxy<br>';
$torrent->openUrl();