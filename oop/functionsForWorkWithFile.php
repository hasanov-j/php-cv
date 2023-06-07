<?php
/*Задача 1
Сделайте объект какого-нибудь класса. Примените к объекту
функцию get_class и узнайте имя класса, которому принадлежит
объект.*/

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
$building = new Building("Trump Towers", "skyscrapers", 30);
echo "Функция: get_class <br>";
echo get_class($building) . "<br>" . "<br>";

//Задача 2
//Сделайте два класса: Test1 и Test2. Пусть оба класса имеют
//свойство name. Создайте некоторое количество объектов этих
//классов и запишите в массив $arr в произвольном порядке.
//Переберите этот массив циклом и для каждого объекта выведите
//значение его свойства name и имя класса, которому принадлежит
//объект.

class Test1
{
    public string $name;
    public function __construct($name)
    {
        $this->name=$name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
class Test2
{
    public string $name;
    public function __construct($name)
    {
        $this->name=$name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

$tests=[
    new Test1("Ivan"),
    new Test1("Igor"),
    new Test1("Wonka"),
    new Test2("Oman"),
    new Test2("Alex"),
    new Test2("Jack")
];
foreach ($tests as $test)
{
    echo $test->getName() . "<br>";
    echo get_class($test) . "<br>";
    echo "______________" . "<br>";
}

//Задача 3
//Сделайте класс Test с методами method1, method2 и method3. С
//помощью функции get_class_methods получите массив названий
//методов класса Test
class Test
{
    public $prop1;
    public $prop2;
    private $prop3;
    private $prop4;

    public function __construct()
    {
        return var_dump(get_class_vars(get_class($this)));
    }

    public function method1(){

    }
    protected function method2(){

    }
    private function method3(){

    }
    public function method4(){
        return "данный метод4 сущетсвует" . "<br>";
    }
}
echo "Функция: get_class_vars <br>";
$test=new TEST();
echo "Функция: get_class_methods <br>";
var_dump(get_class_methods("Test"));
//Задача 8
//Сделайте класс Test с публичными свойствами prop1 и prop2, а
//также с приватными свойствами prop3 и prop4. Создайте объект
//этого класса. С помощью функции get_object_vars получите массив
//свойств созданного объекта
echo "Функция: get_object_vars <br>";
var_dump(get_object_vars($test));
//Задача 9
//Пусть у вас есть класс Test1 и нет класса Test2. Проверьте, что
//выведет функция class_exists для класса Test1 и для класса Test2
echo "Функция: class_exists <br>";
var_dump(class_exists("Test"));
var_dump(class_exists("Test3"));

//Задача 10
//Пусть GET параметром в адресную строку передается название
//класса. Проверьте, существует ли такой класс. Выведите
//соответствующее сообщение на экран.
if (!empty($_GET) && key_exists("name",$_GET)){
    var_dump(class_exists($_GET['name']));
}

//Задача 12
//Пусть GET параметрами в адресную строку передаются название
//класса и его метод. Проверьте, существует ли такой класс. Если
//существует - проверьте существование переданного метода. Если и
//метод существует - создайте объект данного класса, вызовите
//указанный метод и выведите результат его работы на экран
echo "Функция: method_exists <br>";
if (!empty($_GET) && key_exists("name",$_GET)&& class_exists($_GET['name']) && method_exists($_GET['name'],'method4')){
    $test=new $_GET['name'];
    echo $test->method4();
}
echo "Функция: is_subclass_of <br>";
//Задача 16
//Сделайте класс ChildClass наследующий от ParentClass, который в
//свою очередь наследует от GrandParentClass
class GrandParentClass
{

}
class ParentClass extends GrandParentClass
{
    public function __construct()
    {
        return true;
    }
}
class ChildClass extends ParentClass
{

}
//Задача 17
//помощью функции is_subclass_of проверьте, является ли класс
//ChildClass потомком GrandParentClass.
var_dump(is_subclass_of("ChildClass","GrandParentClass"));
//Задача 18
//С помощью функции is_subclass_of проверьте, является ли класс
//ParentClass потомком GrandParentClass
var_dump(is_subclass_of("ParentClass","GrandParentClass"));
//Задача 19
//С помощью функции is_subclass_of проверьте, является ли класс
//ChildClass потомком ParentClass.
var_dump(is_subclass_of("ChildClass","ParentClass"));
echo "Функция: is_a <br>";
//Задача 20
//Сделайте класс ChildClass наследующий от ParentClass. Создайте
//объект класса ChildClass, запишите его в переменную $obj.
$obj=new ChildClass();
//Задача 21
//С помощью функции is_a проверьте, принадлежит ли объект $obj
//классу ChildClass.
var_dump(is_a($obj,"ChildClass"));
//Задача 22
//С помощью функции is_a проверьте, принадлежит ли объект $obj
//классу ParentClass.
var_dump(is_a($obj,"ParentClass"));
echo "Функция: get_declared_classes <br>";
//Задача 23
//Выведите на экран список всех объявленных классов
var_dump(get_declared_classes());