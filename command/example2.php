<?php

interface IElectronicDevice
{
    public function on();

    public function off();

    public function volumeUp();

    public function volumeDown();
}

//Receiver
class Television implements IElectronicDevice
{
    private $volume = 0;

    public function on()
    {
        echo 'TV is ON<br>';
    }

    public function off()
    {
        echo 'TV is OFF<br>';
    }

    public function volumeUp()
    {
        $this->volume++;
        echo 'TV volume ' . $this->volume . '<br>';
    }

    public function volumeDown()
    {
        $this->volume--;
        echo 'TV volume ' . $this->volume . '<br>';
    }
}

interface ICommandd
{
    public function execute();

    public function undo();
}

class TurnTVOn implements ICommandd
{
    private $device;

    public function __construct(IElectronicDevice $device)
    {
        $this->device = $device;
    }

    public function execute()
    {
        $this->device->on();
    }

    public function undo()
    {
        $this->device->off();
    }
}

class TurnTVOff implements ICommandd
{
    private $device;

    public function __construct(IElectronicDevice $device)
    {
        $this->device = $device;
    }

    public function execute()
    {
        $this->device->off();
    }

    public function undo()
    {
        $this->device->on();
    }
}

class TurnTVUp implements ICommandd
{
    private $device;

    public function __construct(IElectronicDevice $device)
    {
        $this->device = $device;
    }

    public function execute()
    {
        $this->device->volumeUp();
    }

    public function undo()
    {
        $this->device->volumeDown();
    }
}

class TurnTVDown implements ICommandd
{
    private $device;

    public function __construct(IElectronicDevice $device)
    {
        $this->device = $device;
    }

    public function execute()
    {
        $this->device->volumeDown();
    }

    public function undo()
    {
        $this->device->volumeUp();
    }
}


class DeviceButton
{
    public $command;

    public function __construct(ICommandd $command)
    {
        $this->command = $command;
    }

    public function press()
    {
        $this->command->execute();
    }

    public function pressUndo()
    {
        $this->command->undo();
    }

}

class Radio implements IElectronicDevice
{

    private $volume = 0;

    public function on()
    {
        echo 'RADIO is ON<br>';
    }

    public function off()
    {
        echo 'RADIO is OFF<br>';
    }

    public function volumeUp()
    {
        $this->volume++;
        echo 'RADIO volume ' . $this->volume . '<br>';
    }

    public function volumeDown()
    {
        $this->volume--;
        echo 'RADIO volume ' . $this->volume . '<br>';
    }
}

class TurnAllOff implements ICommandd
{

    private $deviceList = [];

    public function __construct(array $deviceList)
    {
        $this->deviceList = $deviceList;
    }

    public function execute()
    {
        array_walk($this->deviceList, function ($device) {
            $device->off();
        });
    }

    public function undo()
    {
        array_walk($this->deviceList, function ($device) {
            $device->on();
        });
    }
}

class  TVRemote
{
    public static function getDevice(): IElectronicDevice
    {
        return new Television();
    }
}


$commandList = [];


$myDevice = TVRemote::getDevice();
$onCommand = new TurnTVOn($myDevice);


$onPressed = new DeviceButton($onCommand);

array_unshift($commandList, $onPressed);
$commandList[0]->press();

$offCommand = new TurnTVOff($myDevice);
$onPressed = new DeviceButton($offCommand);
array_unshift($commandList, $onPressed);
$commandList[0]->press();


$upCommand = new TurnTVUp($myDevice);
$onPressed = new DeviceButton($upCommand);
array_unshift($commandList, $onPressed);
$commandList[0]->press();
array_unshift($commandList, $onPressed);
$commandList[0]->press();


$downCommand = new TurnTVDown($myDevice);
$onPressed = new DeviceButton($downCommand);
array_unshift($commandList, $onPressed);
$commandList[0]->press();

$theTV = new Television();
$theRadio = new Radio();

$turnAllOff = new TurnAllOff([$theTV, $theRadio]);
$onPressed = new DeviceButton($turnAllOff);
array_unshift($commandList, $onPressed);
$commandList[0]->press();


echo '--------------------------------------<br>';


// undo all commands
array_walk($commandList, function ($command) {
    $command->pressUndo();
});