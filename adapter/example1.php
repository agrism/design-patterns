<?php

interface WorkerInterface
{
    public function doWork();

    public function getMoney();
}


class Worker implements WorkerInterface
{

    public function doWork(){
        echo 'I do work; ';
    }

    public function getMoney(){
        echo 'I get money; ';
    }
}


class Teacher{
    public function teachChildren(){
        return 'I teach Children; ';
    }

    public function goToAccountantAndGetSalary(){
        return 'Go to accountant once a month and get salary; ';
    }
}

class TeacherAdapter implements WorkerInterface{
    private $teacher;
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function doWork()
    {
        return $this->teacher->teachChildren();
    }

    public function getMoney()
    {
        return $this->teacher->goToAccountantAndGetSalary();
    }

}

class Businessman{
    public function hirePeople(){
        return 'I hire people; ';
    }

    public function sellEmployeesWork(){
        return 'I sell employees; ';
    }

    public function gettingMoneyFromCustomer(){
        return " getting money from Custmers; ";
    }
}

class BusinessmanAdapter implements WorkerInterface{

    private $doer;

    /**
     * BusinessmanAdapter constructor.
     * @param $doer
     */
    public function __construct(Businessman $doer)
    {
        $this->doer = $doer;
    }

    public function doWork()
    {
        return $this->doer->hirePeople() . $this->doer->sellEmployeesWork();
    }

    public function getMoney()
    {
        return $this->doer->gettingMoneyFromCustomer();
    }
}


class Person{

    /**
     * Person constructor.
     */
    public function __construct(WorkerInterface $worker)
    {
        echo $worker->doWork();
        echo $worker->getMoney();
    }
}



new Person( new Worker());
echo '<br>';
new Person( new TeacherAdapter(new Teacher()) );
echo '<br>';
new Person( new BusinessmanAdapter(new Businessman()) );