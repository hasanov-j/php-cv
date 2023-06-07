<?php
declare(strict_types=1);

class Spacecraft
{
    private string $spacecraftName;
    private float $rate;
    private Planet $planet;
    public function __construct(string $spacecraftName,Planet $planet,float  $rate)
    {
        $this->spacecraftName=$spacecraftName;
        $this->planet=$planet;
        $this->rate = $rate;
    }
    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }
    public function setPlanet(Planet $planet): void
    {
        $this->planet = $planet;
    }
    public function getTimeToTravel()
    {
        $timeToPlanet=$this->planet->getDistanceToEarth()/(3600*$this->rate);
        return $timeToPlanet;
    }

    public function getSpacecraftName(): string
    {
        return $this->spacecraftName;
    }
    public function getRate(): float
    {
        return $this->rate;
    }
}
class Planet
{
    private string $planetName;
    private int $distanceToEarth;

    public function __construct(string $planetName,int $distanceToEarth)
    {
        $this->planetName=$planetName;
        $this->distanceToEarth=$distanceToEarth;
    }

    public function setPlanetName(string $planetName): void
    {
        $this->planetName = $planetName;
    }

    public function setDistanceToEarth(int $distanceToEarth): void
    {
        $this->distanceToEarth = $distanceToEarth;
    }

    public function getDistanceToEarth(): int
    {
        return $this->distanceToEarth;
    }
    public function getPlanetName(): string
    {
        return $this->planetName;
    }
}

$planet= new Planet("Moon",384400);
$spacecraft= new Spacecraft("Starship",$planet,11.2);

echo "название планеты на которую летим: " . $planet->getPlanetName() . "<br>";
echo "дистанцию от земли до той планеты на которую летим: " . $planet->getDistanceToEarth() . " км" . "<br>";
echo "название нашего корабля: " . $spacecraft->getSpacecraftName() . "<br>";
echo "скорость космического корабля: " . $spacecraft->getRate() . " км/с". "<br>";
echo "длительность путешествия: " . $spacecraft->getTimeToTravel() . " часов" . "<br>";