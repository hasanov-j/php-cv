#Удаление данных в массиве с помощью рекурсинной функции.
Удаление происхрдит с помощью использования ключей массивов которые нужно удалить


```php
<?php
  
function DeleteKey(array  &$people, array $deleteKeys)  
{  
Обходим массив с названиями ключей массивы которых нужно удалить
    foreach($deleteKeys as $deleteKey)  
    {  
        if(array_key_exists($deleteKey, $people))  
        {  
            unset($people[$deleteKey]);  
        }  
    }  
}  
  
function DeleteKeysInArrays(array  &$people, array $deleteKeys)  
{  
Передаем параметры в функцию для поиска ключей  
    DeleteKey($people, $deleteKeys);  
После удаления ключей на первом уровне
с помощью рекурсии начинаем поиск
по ключам на нижних уровнях массива
    foreach($people as &$value)  
    {  
        if(is_array($value))  
        {  
          DeleteKeysInArrays($value, $deleteKeys);  
  
        }  
    }  
  
    return $people;  
}  
  
  
  
//const DEFAULT_KEYS = ['ssn', 'aba', 'dateOfBirth'];  
//  
// function hide(array &$data, array $keys = DEFAULT_KEYS): array  
//{  
//    return removeFieldsRecursive($data, $keys);  
//}  
//  
//function removeFieldsRecursive(&$data, $keys)  
//{  
//    foreach ($data as &$value) {  
//        if (is_array($value)) {  
//            removeFieldsRecursive($value, $keys);  
//        }  
//    }  
//  
//    foreach ($keys as $key) {  
//        if (array_key_exists($key, $data)) {  
//            unset($data[$key]);  
//        }  
//    }  
//  
//    return $data;  
//}  
  
   

  
  
$deleteKeys=['fhfbhb','qrssdqe','oioilooi'];  
  
$people=[  
    'hobby' => [  
        'grtghrth'=>['fhfbhb'=>1,'qrssdqe'=>3,'oioilooi'=>5],  
        'regergreg'=>[3,4,5,6,8],  
        'uiuikuiui'=>['fhfbhb'=>1,'qrssdqe'=>3,'oioilooi'=>5]  
  
    ],  
    'work' =>[  
        'brgtgrt'=>[  
            'gfnreaer'=>['fhfbhb'=>1,'aba'=>3,'oioilooi'=>5],  
             'flnboiewj'=>10,  
            'dfrgrewgklbk'=>40  
        ],  
        'bnbnnjhm'=>6,  
        'erfedfv'=>9  
  
    ],  
    'family' =>[  
        'brgtgrt'=>3,  
        'bnbnnjhm'=>6,  
        'erfedfv'=>9  
  
    ],  
    'secret' =>[  
        'fhfbhb'=>1,  
        'qrssdqe'=>3,  
        'oioilooi'=>5  
    ]  
];  
  
var_dump(DeleteKeysInArrays($people,$deleteKeys));  
  
//$result = hide($people);  
  
//var_dump($result); die;  

?>
```
