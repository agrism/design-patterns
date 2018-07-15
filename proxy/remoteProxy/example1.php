<?php

namespace Proxy\RemoteProxy;

interface IImage{
    public function displayImage();
}

class RealImage implements IImage{

    private $fileName = null;

    /**
     * realImage constructor.
     * @param null $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        $this->loadImageFromDisk();
    }


    public function displayImage()
    {
        echo 'Display: '.$this->fileName.'<br>';
    }

    private function loadImageFromDisk(){

        echo 'Loading: '.$this->fileName.'<br>';
    }
}

class ProxyImage implements IImage{

    private $image = null;
    private $fileName = null;

    /**
     * ProxyImage constructor.
     * @param null $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }


    public function displayImage()
    {
        if(!$this->image){
            $this->image  = new RealImage($this->fileName);
        }

        $this->image->displayImage();
    }

}

$image1 = new ProxyImage('file1');
$image2 = new ProxyImage('file2');
$image3 = new ProxyImage('file3');

$image1->displayImage();
echo '<hr>';
$image2->displayImage();
$image2->displayImage();

echo '<hr>';
$image3->displayImage();
$image3->displayImage();
$image3->displayImage();
