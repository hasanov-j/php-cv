<?php

declare(strict_types=1);

//abstract class Transport
//{
//    public abstract function move(): void;
//
//    public abstract function getPrice(): int;
//
//}


interface Transport
{
      function move(): void;

      function getPrice(): int;
}


final class Car implements Transport
{
    public function move(): void
    {
        var_dump("Еду по дороге");
    }

    private int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}


final class Airplane implements Transport
{
    public function move(): void
    {
        var_dump("Летаю в воздухе");
    }

    private int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

final class Train implements Transport
{
    public function move(): void
    {
        var_dump("По жд");
    }

    private int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}


class Boat implements Transport
{
    private int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function move(): void
    {
        var_dump("По воде");
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}


$train = new Train(100);
$car = new Car(200);
$ariplane = new Airplane(300);
$boat = new Boat(1000);


class Trip
{
    public function movingWay(Transport $transport)
    {
        $transport->move() . '<br>';
        echo $transport->getPrice();
    }
}

$europe = new Trip();
$europe->movingWay(new Train(500));

die;




















abstract class Animal
{

    private string $name;

    private string $poroda;

    public function golos()
    {
        echo "Hello from Dog>" . $this->name . "</br>";
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setPoroda(string $poroda)
    {
        if (is_numeric($poroda)) {
            throw new Exception("Порода должна содержать только буквы");
        }

        $this->poroda = $poroda;
    }

    public function getName(): string
    {
        return trim($this->name);
    }
}


class Cat extends Animal
{
    public function climb()
    {
        echo "Лажу по дереву";
    }
}


class Dog extends Animal
{

}


$dog1 = new Dog("Pyatnok     ");
$dog1->setPoroda("ываываы");
//$dog1->name = "Pyatnok";
//$dog1->golos();

echo $dog1->getName();
die;


$dog2 = new Dog("Tuzik");

//$dog2->name = "Tuzik";
$dog2->golos();


$dog2 = new Dog("2345");
//$dog2->name = ;
$dog2->golos();