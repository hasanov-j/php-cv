<?php
declare(strict_types=1);
srand(time());
class Country
{
    private string $name;
    private array $population;
    private Human $human;

    public function __construct(string $name, array $population)
    {
        $this->name = $name;
        $this->population = $population;
    }

    public function getPopulation(): int
    {
        return sizeof($this->population);
    }

    public function getAverageAge(): float
    {
       $sumAges = 0;
        foreach ($this->population as $human) {
            $this->human = $human;
            $sumAges+=$this->human->getAge();
        }
        return $sumAges/$this->getPopulation();
    }

}

class Human
{
    private string $name;
    private int $age;

    public function setName(array $names): void
    {
        $newName=$names[array_rand($names)];
        if (is_string($newName) && $this->checkName($newName)) {
            $this->name = $newName;
        } else {
           throw new Exception("please, input a correct name");
        }
    }

    public function setAge(array $ages): void
    {

        if (is_numeric($ages[array_rand($ages)]) && $this->checkAge($ages[array_rand($ages)])) {
            $this->age = $ages[array_rand($ages)];
        } else {
            throw new Exception("please, input a correct age");
        }

    }

    public function getAge()
    {
        return $this->age;
    }

    private function checkName(string $name) : bool
    {
        return (bool) preg_match("/^([A-Za-z]){2,}\s{0,1}([A-Za-z])*$/u", $name);
    }
    private function checkAge(int $age)
    {
        //preg_match("/^(?:110|10[0-9]|[1-9]{1,2}$/", $age)
        if ($age>0 && $age<=110) {
            return true;
        } else {
            return false;
        }
    }
}
$people=[
    'Ivan',
    'Igor',
    'Arkady',
    'Michael',
    'Artem',
    'Alex'
];

$ages=[23,42,48,56,19,38];

$populations=[];
for($humanNumber=0, $count=5;$humanNumber<=$count;$humanNumber++)
{
    $human=new Human;
    $human->setName($people);
    $human->setAge($ages);
    $populations[]=$human;
}
$country=new Country("Germany",$populations);

var_dump($country);
echo "количество населения: " . $country->getPopulation() . "<br>";
echo "средний возраст насления: " . $country->getAverageAge() . "<br>";