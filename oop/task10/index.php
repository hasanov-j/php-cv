<?php
declare(strict_types=1);
class Client
{
    private string $name;
    private array $clothes;

    public function __construct($name)
    {
        $this->name=$name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function __set($clothesName,$size)
    {
        echo "вид одежды: $clothesName" . "<br>";
        $this->clothes[$clothesName]=$size;
    }
    public function __get($clothesName)
    {
        return $this->clothes[$clothesName];
    }
    public function __isset($clothesName)
    {
        return isset($this->clothes[$clothesName]);
    }
    public function __unset($clothesName)
    {
        unset($this->clothes[$clothesName]);
    }
}

$client=new Client("Jerry");
echo $client . "<br>";
$client->shirt="xl";
echo "размер: " . $client->shirt . "<br>";

var_dump(isset($client->shirt)) . "<br>";

if(isset($client->shirt)) {
    unset($client->shirt);
}

var_dump(isset($client->shirt)) . "<br>";
