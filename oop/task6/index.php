<?php
declare(strict_types=1);
srand(time());
class Student
{
    private string $name;
    private string $surname;
    private University $university;

    public function __construct(string $name, string $surname, University $university)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->university = $university;
    }
    public function getInfo()
    {
        echo "Имя студента: " . $this->name . "<br>";
        echo "Фамилия студента: " . $this->surname . "<br>";
        echo "Университет студента: " . $this->university->getName() . "<br>";
        echo "Факультет студента: " . $this->university->getFac() . "<br>";
        echo "Средний балл за предметы: " . $this->university->getAverageValueOfLessons() . "<br>";
        echo "предметы: " . "<br>";
        var_dump($this->university->getLessons());
    }
}

class University
{
    private string $name;
    private string $fac;
    private array $lessons;
    private Lesson $lesson;

    public function __construct(string $name, string $fac, array $lessons)
    {
        $this->name = $name;
        $this->fac = $fac;
        $this->lessons = $lessons;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getFac()
    {
        return $this->fac;
    }
    public function getAverageValueOfLessons()
    {
        return $this->AverageValueOfLessons();
    }
    public function getLessons()
    {
        return $this->lessons;
    }


    private function AverageValueOfLessons()
    {
        $sumValue=0;
        foreach ($this->lessons as $lesson)
        {
            $this->lesson=$lesson;
            $sumValue+=$this->lesson->getMark();
        }
        $averageValue=$sumValue/sizeof($this->lessons);
        return $averageValue;
    }

}

class Lesson
{
   private string $name;
   private int $mark;
   public function __construct(string $name,int $mark)
   {
       $this->name=$name;
       $this->mark=$mark;
   }
   public function getName(): string
   {
       return $this->name;
   }
    public function getMark(): int
    {
        return $this->mark;
    }
}
function fillsLessonsWithRandomMarks(array $lessons, array $marks):array
{
    $arrayLessons=[];
    foreach ($lessons as $lesson)
    {
        $randomMark=$marks[array_rand($marks)];
        $arrayLessons[]= new Lesson($lesson,$randomMark);
    }
    return $arrayLessons;
}

function fillsUniversityWithRandomFacAndName(array $fac,array $uni,array $lessons): University
{
    return new University($uni[array_rand($uni)],$fac[array_rand($fac)],$lessons);

}
function fillsStudentWithRandomValues(array $names,array $lastNames,University $university): Student
{
    return new Student($names[array_rand($names)],$lastNames[array_rand($lastNames)],$university);

}
$lessons=[
    "Физика",
    "Химия",
    "Математика",
    "Биология",
    "Физкультура"
];

$marks=[1, 2, 3, 5, 9, 10];

$fac = [
    "Экономический",
    "Физический",
    "Юридический",
    "Химический",
    "Биологический"
];

$uni = ["БГТУ", "БГМУ", "БНТУ", "БГАТУ"];


$names = ["Рома", "Нина", "Лена", "Миша", "Дима"];
$lastNames = ["Зеленский", "Пупкина", "Лукашенко", "Ельцин", "Путин"];

$students=[];
for($number=1,$count=5;$number<=$count;$number++){
    $lessonsWithRandomMarks=fillsLessonsWithRandomMarks($lessons,$marks);
    $randomUniversity=fillsUniversityWithRandomFacAndName($fac,$uni,$lessonsWithRandomMarks);
    $student=fillsStudentWithRandomValues($names,$lastNames,$randomUniversity);
    $students[]=$student;
}
var_dump($students);

//$student->getInfo();
//var_dump($randomUniversity);