<?php
declare(strict_types=1);

class Building
{
    private string $name;
    private string $buildingType;
    private int $taxRate;

    //Передаем название здания, тип здания и налогуювую ставку
    public function __construct(string $newName, string $newBuildingType, int $newTaxRate)
    {
        $this->name = $newName;
        $this->buildingType = $newBuildingType;
        $this->taxRate = $newTaxRate;

    }

    //Расчитываем сумму налога для каждого владельца
    public function ownersTaxRate(Owner $owner)
    {
        return $owner->getIncome() * $this->taxRate / 100;
    }

}

class Owner
{
    private string $name;
    private int $income;

    //Передаем имя владельца и его доход
    public function __construct(string $newName, int $newIncome)
    {
        $this->name = $newName;
        $this->income = $newIncome;
    }

    //функция возвращает доход при вызове
    public function getIncome()
    {
        return $this->income;
    }

}

$owner1 = new Owner("Alex", 600);
$building = new Building("Trump Towers", "skyscrapers", 30);
echo "owners tax:" . " " . $building->ownersTaxRate($owner1) . "<br>";