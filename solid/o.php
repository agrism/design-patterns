<?php

interface Color
{
    const RED = 'red';
    const GREEN = 'green';
    const BLUE = 'blue';
}

interface Size
{
    const SMALL = 'small';
    const MEDIUM = 'medium';
    const LARGE = 'large';
}

interface Specification
{
    /**
     * @param Product $item
     * @return bool
     */
    public function isSatisfied(Product $item): bool;
}

class Product
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $color;
    /**
     * @var string
     */
    public $size;

    /**
     * Product constructor.
     * @param $name
     * @param $color
     * @param $size
     */
    public function __construct(string $name, string $color, string $size)
    {
        $this->name = $name;
        $this->color = $color;
        $this->size = $size;
    }
}

class ColorSpecification implements Specification
{
    /**
     * @var string
     */
    private $color;

    /**
     * ColorSpecification constructor.
     * @param string $color
     */
    public function __construct(string $color)
    {
        $this->color = $color;
    }

    /**
     * @param Product $item
     * @return bool
     */
    public function isSatisfied(Product $item): bool
    {
        return $item->color === $this->color;
    }
}

class SizeSpecification implements Specification
{
    /**
     * @var string
     */
    private $size;

    /**
     * SizeSpecification constructor.
     * @param string $size
     */
    public function __construct(string $size)
    {
        $this->size = $size;
    }

    /**
     * @param Product $item
     * @return bool
     */
    public function isSatisfied(Product $item): bool
    {
        return $item->size === $this->size;
    }
}

class OrSpecifications implements Specification
{

    /**
     * @var array|Specification[]
     */
    public $orSpecifications = [];

    /**
     * AndSpecifications constructor.
     * @param $orSpecifications Specification[]
     */
    public function __construct(array $orSpecifications)
    {
        $this->orSpecifications = $orSpecifications;
    }

    /**
     * @param Product $item
     * @return bool
     */
    public function isSatisfied(Product $item): bool
    {
        return (bool)array_filter($this->orSpecifications, function ($specification) use ($item) {
            /* @var $specification Specification */
            return $specification->isSatisfied($item);
        });
    }
}

class AndSpecifications implements Specification
{

    /**
     * @var array|Specification[]
     */
    public $andSpecifications = [];

    /**
     * AndSpecifications constructor.
     * @param $andSpecifications Specification[]
     */
    public function __construct(array $andSpecifications)
    {
        $this->andSpecifications = $andSpecifications;
    }

    public function isSatisfied(Product $item): bool
    {
        $isSatisfied = true;

        foreach ($this->andSpecifications as $specification) {
            if (!$isSatisfied = (bool)$specification->isSatisfied($item)) {
                break;
            }
        }

        return $isSatisfied;
    }
}

class Filterer
{
    /**
     * @param Product[] $items
     * @param Specification $specification
     * @return Product[]
     */
    public function filter(array $items, Specification $specification): array
    {
        return array_filter($items, function ($item) use ($specification) {
            return $specification->isSatisfied($item);
        });
    }
}


$filter = new Filterer();
$items = [];
$items[] = new Product('Car', Color::BLUE, Size::MEDIUM);
$items[] = new Product('Pen', Color::BLUE, Size::LARGE);
$items[] = new Product('Book', Color::GREEN, Size::LARGE);
$items[] = new Product('Shelp', Color::RED, Size::SMALL);

echo 'Blue products: ' . PHP_EOL;
foreach ($filter->filter($items, new ColorSpecification(Color::BLUE)) as $item) {
    /* @var $item Product */
    echo $item->name . ' are blue' . PHP_EOL;
}

echo PHP_EOL . 'Blue OR Large products:' . PHP_EOL;
foreach ($filter->filter($items, new OrSpecifications([new ColorSpecification(Color::BLUE), new SizeSpecification(Size::LARGE
)])) as $item) {
    /* @var $item Product */
    echo $item->name . PHP_EOL;
}


echo PHP_EOL . 'Blue AND Large products:' . PHP_EOL;
foreach ($filter->filter($items, new AndSpecifications([new ColorSpecification(Color::BLUE), new SizeSpecification(Size::LARGE
)])) as $item) {
    /* @var $item Product */
    echo $item->name . PHP_EOL;
}





