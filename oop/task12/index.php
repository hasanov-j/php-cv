<?php
trait Trait1
{
    public function method1(): int
    {
        return 1;
    }
}
trait Trait2
{
    public function method2(): int
    {
        return 2;
    }
}
trait Trait3
{
    public function method3(): int
    {
        return 3;
    }
}

interface TraitInterface
{
    public function method1();
    public function method2();
    public function method3();

}
class Test implements TraitInterface
{
    use Trait1, Trait2, Trait3;

    public function getSum()
    {
        return $this->method1() + $this->method2() + $this->method3();
    }
}
$test=new Test();
echo $test->getSum();

