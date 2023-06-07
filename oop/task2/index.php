<?php
declare(strict_types=1);

class Car
{
    private string $name;
    private Engine $engine; // количество топлива

// Команда ехать:
    public function __construct(string $name, Engine $initialEngine)
    {
        $this->engine = $initialEngine;
        $this->name = $name;
    }

    public function move()
    {
        if ($this->engine->getFuel() > 0) {
            $this->engine->burnFuel();
            echo "машина проехала 1 км <br>";
        } else {
            echo "бензин закончился, пополните бак <br>";
        }
    }
    public function fillTheCarWithFuel($fillFuel){
        $this->engine->setFillFuel($fillFuel);
    }
}

class Engine
{
    private $fuel;

    public function __construct($fuel)
    {
        $this->fuel = $fuel;
    }

    public function setFillFuel($fillFuel)
    {
        $this->fuel += $fillFuel;
    }

    public function burnFuel()
    {
        $this->fuel--;
    }

    public function getFuel()
    {
        return $this->fuel;
    }
}

$bestCar = new Car("BMW", new Engine(5));
$bestCar->move();
$bestCar->move();
$bestCar->move();
$bestCar->move();
$bestCar->move();
$bestCar->move();
$bestCar->fillTheCarWithFuel(2);
$bestCar->move();
$bestCar->move();
$bestCar->move();