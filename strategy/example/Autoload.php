<?php

/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 25.02.2017
 * Time: 14:09
 */

class Autoload
{
    private $ds = '\\';

    private $dirs = [];


    public function run()
    {
        $path = getcwd().'\..';

        $this->getSubDirectoryList($path);

        $this->includeFiles();
    }

    private function getSubDirectoryList($path)
    {
        $directories = scandir($path, 1);

        foreach ($directories as $subDir) {

            if ($this->isDirectory($subDir)) {

                $fullDir = $path . $this->ds . $subDir;

                $this->dirs[] = $fullDir;

                $this->getSubDirectoryList($fullDir);
            }
        }
    }

    public function isDirectory($string)
    {
        return strpos($string, '.') === false;
    }

    public function includeFiles(){
        spl_autoload_register(function ($class_name) {
            foreach($this->dirs as $path){
                if(file_exists($path.$this->ds.$class_name.'.php')){
                    include $path.$this->ds.$class_name.'.php';
                }
            }
        });
    }
}