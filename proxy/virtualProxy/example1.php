<?php


/**
 * Virtual PROXY
 */

/**
 * Interface IImage
 */
interface IImage
{
    public function display();
}

class Image implements IImage
{

    private $file;

    public function __construct(string $file)
    {
        $this->file = $file;
        $this->load();
    }

    public function load()
    {
        echo 'File loading: ' . $this->file . '<br>';
    }

    public function display()
    {
        echo 'Render ' . $this->file . '<br>';
    }
}

class ProxyImage implements IImage
{

    private $file;

    private $image;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function display()
    {
        if (!$this->image) {
            $this->image = new Image($this->file);
        }

        $this->image->display();
    }
}


echo "1. Without proxy (file is loading on Image initialization):<br>";
echo "1.1. File init:<br>";
$image = new Image('file.txt');
echo "1.2. File display<br>";
$image->display();

echo '<hr>';

echo "2. With proxy (file not loading before display is triggered): <br>";
echo "2.1. File init:<br>";
$image = new ProxyImage('file.txt');
echo "2.2. File display<br>";
$image->display();