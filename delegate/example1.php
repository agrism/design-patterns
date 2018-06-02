<?php

// sulainim, pasūtam picu un prasam picu no sulaņa. ēs pat nezinam, ka sulainis prasa picu no picu pavāra ,
// kas viņam atgriež picu!


interface Graphics{
    public function draw();
}

class Square implements Graphics
{
    public function draw()
    {
        echo "drw square";
    }
}

class Triangle implements Graphics{
    public function draw()
    {
        echo 'draw triangle';
    }
}

class Circle implements Graphics{
    public function draw()
    {
        echo 'draw circle!';
    }
}

class Painter implements Graphics {
    public $graphics;
    public function setGraphics(Graphics $gr){
        $this->graphics = $gr;
    }
    public function draw(){
        $this->graphics->draw();
    }
}


$picaso = new Painter();
$picaso->setGraphics(new Square());
$picaso->draw();

?>