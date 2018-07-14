<?php

class Cms
{
    public static $types = [
        'Wordpress' => 'Wordpress',
        'October' => 'OctoberCMS'
    ];
}


class Website
{
    private $name;
    private $cms;
    private $price;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $cms
     */
    public function setCms($cms)
    {
        $this->cms = $cms;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getWebsite(){
        return $this;
    }

}

abstract class WebsiteBuilder
{
    protected $website;

    public function createWebsite()
    {
        $this->website = new Website();
    }

    public abstract function buildName();

    public abstract function buildCms();

    public abstract function buildPrice();

    public function getWebsite()
    {
        return $this->website;
    }
}

class Director
{
    private $builder;

    public function setBuilder(WebsiteBuilder $builder)
    {
        $this->builder = $builder;
        return $this;
    }

    public function buildWebsite()
    {
        $this->builder->createWebsite();
        $this->builder->buildName();
        $this->builder->buildCms();
        $this->builder->buildPrice();

        return $this->builder->getWebsite();
    }
}



class EnterpriseWebsite extends WebsiteBuilder
{
    public function buildName()
    {
        $this->website->setName('Corp. website');
    }

    public function buildCms()
    {
        $this->website->setCms(Cms::$types['October']);
    }

    public function buildPrice()
    {
        $this->website->setPrice(10000);
    }
}

class VisitCardWebsite extends WebsiteBuilder
{
    public function buildName()
    {
        $this->website->setName('VisitCard website');
    }

    public function buildCms()
    {
        $this->website->setCms(Cms::$types['Wordpress']);
    }

    public function buildPrice()
    {
        $this->website->setPrice(500);
    }
}


$w = (new Director())->setBuilder(new EnterpriseWebsite())->buildWebsite();

echo '<pre>';
print_r($w);
echo '</pre>';


$w2 = (new Director())->setBuilder(new VisitCardWebsite())->buildWebsite();

echo '<pre>';
print_r($w2);
echo '</pre>';


