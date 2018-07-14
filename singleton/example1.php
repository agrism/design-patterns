<?php


class Db
{
    private static $connection;

    private function __construct()
    {
        echo 'Db connection initialization!<br>';
    }

    public static function getConnection()
    {
        if(!self::$connection){
            self::$connection = new self();
        }

        return self::$connection;
    }

    public function insertData($data){
        echo 'Data: '.$data.' is inserted in DB. <br>';
    }
}

$a = Db::getConnection();
$a->insertData('Long data A1');
$a->insertData('Long data A2');

$b = Db::getConnection();
$a->insertData('Long data B1');

var_dump($a);
echo '<br>';
var_dump($b);
echo '<br>';

var_dump($a===$b);
echo '<br>';

