<?php


abstract class AbstractLogger
{
    private $actions = [];

    public abstract function openLogObject();

    public abstract function closeLogObject();

    private function writeLogs()
    {
        return 'writing logs';
    }

    public final function log()
    {
        $this->actions[] = $this->openLogObject();

        $this->actions[] = $this->writeLogs();

        $this->actions[] = $this->closeLogObject();

        echo implode(', ', $this->actions);
    }
}


class DbLogger extends AbstractLogger
{
    public function openLogObject()
    {
        return 'Open connection to DB';
    }

    public function closeLogObject()
    {
        return 'Close DB connection';
    }
}

class FileLogger extends AbstractLogger
{
    public function openLogObject()
    {
        return 'Open file';
    }

    public function closeLogObject()
    {
        return 'Close file';
    }
}

(new DbLogger())->log();

echo '<br></br>';

(new FileLogger())->log();