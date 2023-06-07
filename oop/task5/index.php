<?php
declare(strict_types=1);
class Building
{
    private string $name;
    private string $buildingType;
    private array $taxRates=[
        "apartments" =>50,
        "skyscrapers" =>40,
        "house" => 30
    ];

    //Передаем название здания, тип здания и налогуювую ставку
    public function __construct(string $newName,string $newBuildingType)
    {
        $this->name=$newName;
        $this->buildingType=$newBuildingType;

    }

    //Расчитываем сумму налога для каждого владельца в зависимости типа здания
    public function ownersTaxRate(Owner $owner)
    {
        foreach ($this->taxRates as $buildingType => $taxRate){
            if ($buildingType==$this->buildingType){
                return $owner->getIncome()*$taxRate/100;
            }
        }


    }

}
class Owner
{
    private string $name;
    private int $income;

    //Передаем имя владельца и его доход
    public function __construct(string $newName,int $newIncome){
        $this->name=$newName;
        $this->income=$newIncome;
    }
    //функция возвращает доход при вызове
    public function getIncome(){
        return $this->income;
    }

}
$owner1=new Owner("Alex",600);
$building=new Building("Trump Towers","skyscrapers",30);
echo "owners tax:" . " " . $building->ownersTaxRate($owner1) . "<br>";