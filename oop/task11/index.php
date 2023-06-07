<?php
declare(strict_types=1);

class Mother
{
    private Work $mothersWork;
    public function __construct(Work $mothersWork)
    {
        $this->mothersWork =$mothersWork;
    }

    protected function getSalary($percent): float
    {
        if(isset($this->mothersWork)){
            return $this->mothersWork->getSalary() * $percent;
        }
        return throw new Exception("Введите параметр работа");
    }
}

class Work
{
    private float $preTaxSalary;
    private float $incomeTax;
    private float $socialInsurance;
    private string $profession;

    public function __construct(string $profession, float $preTaxSalary, float $incomeTax, float $socialInsurance)
    {
        $this->preTaxSalary = $preTaxSalary;
        $this->incomeTax = $incomeTax/100;
        $this->socialInsurance = $socialInsurance/100;
        $this->profession = $profession;
    }

    public function getSalary()
    {
        return $this->preTaxSalary*(1 - $this->incomeTax - $this->socialInsurance);
    }
}

class Student extends Mother
{
    private University $university;
    private string $name;

    public function __construct(string $name,University $university,Work $mothersWork)
    {
        parent::__construct($mothersWork);
        $this->university=$university;
        $this->name=$name;
    }

    public function getSalary($percent): float
    {
        $percent/=100;
        return parent::getSalary($percent) + $this->university->getGrant();
    }


}

class University
{
    private string $name;
    private array $lessons;
    private Lesson $lesson;

    public function setLessons(array $lessons): void
    {
        $this->lessons = $lessons;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getGrant()
    {
        if ($this->AverageValue() >= 4 && $this->AverageValue() < 5) {
            return 200;
        } elseif ($this->AverageValue() >= 5 && $this->AverageValue() < 7) {
            return 500;
        } elseif ($this->AverageValue() >= 7 && $this->AverageValue() < 10) {
            return 1000;
        }
    }

    private function AverageValue(): float
    {
        $sumValueFromLessons = 0;
        foreach ($this->lessons as $lesson) {
            $this->lesson = $lesson;
            $sumValueFromLessons += $this->lesson->mark;
        }
        return $sumValueFromLessons / sizeof($this->lessons);
    }
}

class Lesson
{
    public string $name;
    public int $mark;
}

$mothersWork = new Work("doctor", 2500, 13, 23);

$disciplines = [
    "biology",
    "math",
    "economy",
    "hydromechanics",
    "physics"
];
$marks = [6, 8, 10, 5, 7, 3, 4];
$lessons = [];
foreach ($disciplines as $discipline) {
    $lesson = new Lesson;
    $lesson->name = $discipline;
    $lesson->mark = $marks[array_rand($marks)];
    $lessons[] = $lesson;
}

$university = new University;
$university->setName("GSU");
$university->setLessons($lessons);
$student = new Student("Jafar", $university,$mothersWork );
echo "мамины расходы на студента " . $student->getSalary(10) . "<br>";
echo "стипендия студеента: " . $university->getGrant() . "<br>";
var_dump($lessons);