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
        if ($this->engine->getFuel() > 0 && $this->engine->getSpeed() > 0) {
            $this->engine->burnFuel();
            echo "машина едет <br>";
            echo "обьем оставшего бензина: " . $this->engine->getFuel() . "л" . "<br>";
            echo "текущая скорость: " . $this->engine->getSpeed() . "км/час" . "<br>";
            echo "_________________" . "<br>";
        } else {
            echo "бензин заглохла <br>";
        }
    }

    public function moveFaster(int $newSpeed)
    {
        if ($newSpeed > $this->engine->getSpeed()) {
            $this->engine->setSpeed($newSpeed);
            $this->engine->speedUp();
            $this->move();
        } else {
            throw new Exception("please, input correct value");
        }

    }

    public function moveSlower(int $newSpeed)
    {
        if ($newSpeed < $this->engine->getSpeed()) {
            $this->engine->setSpeed($newSpeed);
            $this->engine->speedDown();
            $this->move();
        } else {
            throw new Exception("please, input correct value");
        }

    }


    public function fillTheCarWithFuel($fillFuel)
    {
        $this->engine->setFillFuel($fillFuel);
        echo "машина заправлена: " . $fillFuel . "л" . "<br>";
        echo "_________________" . "<br>";
    }
}

class Engine
{
    private float $fuel;
    private int $speedIncrease;
    private int $speedDecrease;
    private float $consumptionFuel = 1;
    private int $speed;

    public function __construct(int $fuel, int $speed)
    {
        $this->fuel = $fuel;
        $this->speed = $speed;
    }

    public function setSpeed(int $newSpeed)
    {
        if ($newSpeed >= $this->speed) {
            $this->speedIncrease = $newSpeed - $this->speed;
        } else {
            $this->speedDecrease = $this->speed - $newSpeed;
        }
        $this->speed = $newSpeed;
    }


    public function setFillFuel(int $fillFuel)
    {
        $this->fuel += $fillFuel;
    }

    public function burnFuel()
    {
        $this->fuel -= $this->consumptionFuel;

    }

    public function speedUp()
    {
        if ($this->speedIncrease >= 5 && $this->speedIncrease % 5 == 0) {
            $this->consumptionFuel = pow(2, $this->speedIncrease / 5);
        }
    }

    public function speedDown()
    {
        if ($this->speedDecrease >= 5 && $this->speedDecrease % 5 == 0) {
            $this->consumptionFuel = 1. / pow(2, $this->speedIncrease / 5);
        }
    }

    public function getFuel()
    {
        return $this->fuel;
    }

    public function getSpeed()
    {
        return $this->speed;
    }
}

$bestCar = new Car("BMW", new Engine(5, 40));
$bestCar->move();
$bestCar->moveFaster(50);
$bestCar->fillTheCarWithFuel(10);
$bestCar->moveSlower(45);

