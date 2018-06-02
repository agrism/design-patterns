<?php

interface LoggerInterface{
    public function log($data);
}

class LogToFile implements LoggerInterface{
    public function log($data)
    {
        echo 'log the data to a file '.$data;
    }
}


class LogToDatabase implements LoggerInterface{
    public function log($data)
    {
        echo 'log the data to a DB '.$data;
    }
}

class LogToWebServoce implements LoggerInterface{
    public function log($data)
    {
        echo 'log the data to a WS: '.$data;
    }
}


class App{

    public function log($data, LoggerInterface $logger = null)
    {
        $logger = $logger ?: new LogToFile();
        echo $logger->log($data);
    }


}

$log= new App;

$log->log('some text', new LogToFile());
echo '<br>';
$log->log('some text', new LogToDatabase());
echo '<br>';
$log->log('some text', new LogToWebServoce());
echo '<br>';
$log->log('some text');