<?php
$arr = [1 => 6, 2 => 7, 3 => 8, 4 => 9, 5 => 10];
$sumKey=0;
$sumValue=0;
foreach($arr as $key => $value ){
    $sumKey += $key;
    $sumValue += $value;

}

$divide=$sumKey/$sumValue;
echo $sumKey . "<br>";
echo $sumValue . "<br>";
echo $divide . "<br>";

$arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$arr1[]=null;
$arr2[]=null;

foreach($arr as $key => $value ){
    $arr1[] = $key;
    $arr2[]= $value;

}

echo "<pre>";
var_dump($arr1);
echo "</pre>";


echo "<pre>";
var_dump($arr2);
echo "</pre>";

//Функция array_splice отрезает и возвращает часть массива. При этом
//отрезанная часть исчезает из массива. Вместо отрезанной части можно
//вставлять новые элементы.
//Первым параметром указывается массив для разрезания. Вторым
//параметром указывается, с какого элемента начинать отрезание, а третьим -
//сколько элементов отрезать. Третий параметр может быть отрицательным -
//в этом случае отсчет начнется с конца (-1 - последний элемент, -2 -
//предпоследний и так далее). Третий параметр можно вообще не указывать -
//в этом случае массив отрежется до самого конца.
//В последнем необязательным параметре можно задавать массив элементов,
//которые будут вставлены взамен удаленных.

//array_splice(массив, откуда отрезать, [сколько], [вставить взамен]);
echo "Функция array_splice" . "<br>";

echo "Задача 1" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];
$result = array_splice($arr, 0, 3);
var_dump($arr);
var_dump($result);

echo "Задача 2" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];
$result = array_splice($arr, -2, 2);
var_dump($arr);
var_dump($result);

echo "Задача 3" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];
$result = array_splice($arr, 1, 3,[1,2,3]);
var_dump($arr);
var_dump($result);

echo "Задача 4" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];
$result = array_splice($arr, 1, 0,[1,2,3]);

var_dump($arr);
var_dump($result);

//    Функция array_slice отрезает и возвращает часть массива. При этом сам
//массив не меняется.
//    Первым параметром указывается массив для разрезания.
//    Вторым параметром указывается, с какого элемента начинать отрезание, а третьим - сколько элементов отрезать.
//    Третий параметр может быть отрицательным - в этом случае отсчет начнется с конца (-1 - последний элемент, -2 - предпоследний и так далее).
//Третий параметр можно вообще не указывать - в этом случае массив отрежется до самого конца.
//    Последний необязательный параметр регулирует сохранять ли ключи при отрезании, true - сохранять, false (по умолчанию) - не сохранять.
//Строковые ключи сохраняются, независимо от значения этого параметра.
//    array_slice(массив, откуда отрезать, [сколько], [сохранять ключи = true]);
echo "Функция array_slice" . "<br>";

echo "Задача 1" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];
$result = array_slice($arr, 1, 3);
var_dump($arr);
var_dump($result);

echo "Задача 2" . "<br>";
$arr = [1=> 'a', 'b', 'c', 'd', 'e'];
$result = array_slice($arr, 1, 3, true);
var_dump($arr);
var_dump($result);

echo "Задача 3" . "<br>";
$arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$result = array_slice($arr, 1, 3);
var_dump($arr);
var_dump($result);

//Функция shuffle осуществляет перемешивание массива так, чтобы его
//элементы шли в случайном порядке. При этом функция изменяет сам
//массив: это значит результат работы функции не нужно никуда присваивать
//- изменения произойдут над самим массивом.
echo "Функция shuffle" . "<br>";
$arr = [1, 2, 3, 4, 5];

shuffle($arr);
var_dump($arr);

//Функция array_shift вырезает и возвращает первый элемент массива. При
//этом этот элемент исчезает из массива.

//array_shift(массив);
echo "Функция array_shift" . "<br>";
$arr = [1, 2, 3, 4, 5];
echo array_shift($arr) . "<br>";

//Функция range создает массив с диапазоном элементов. К примеру, можно
//создать массив, заполненный числами от 1 до 100 или буквами от 'a' до 'z'.
//Диапазон, который сгенерирует функция, задается параметрами: первый
//параметр откуда генерировать, а второй - докуда.
//Третий необязательный параметр функции задает шаг. К примеру, можно
//сделать ряд 1, 3, 5, 7, если задать шаг 2, или ряд 1, 4, 7, 10 если задать шаг 3.

//range(откуда, докуда, [шаг]);

echo "Функция range" . "<br>";
var_dump(range(1, 5));

var_dump(range(0, 10, 2));

var_dump(range('a', 'e'));


//Функция array_unshift добавляет элементы в начало массива. При этом
//переданный массив изменяется, а функция возвращает новое количество
//элементов в массиве. Элементы для добавления перечисляются через
//запятую.

//array_unshift(массив, новые элементы);
echo "Функция array_unshift" . "<br>";
$arr = [1, 2, 3, 4, 5];
$num = array_unshift($arr, 'a', 'b');
var_dump($arr);
echo 'num=' . $num . "<br>";

//Функция array_unique осуществляет удаление повторяющихся элементов (дублей) из массива.
echo "Функция array_unique" . "<br>";
$arr = [1, 1, 1, 2, 2, 3];
var_dump($arr);
var_dump(array_unique($arr));



//Функция in_array проверяет наличие заданного элемента в массиве.
//Первым параметром она принимает что искать, а вторым - в каком массиве.

//in_array(что искать, в каком массиве);
echo "Функция in_array" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];
$result = in_array('c', $arr);
var_dump($result);

//Функция array_search осуществляет поиск значения в массиве и
//возвращает ключ первого найденного элемента. Если такой элемент не
//найдет - вернет false. Третий параметр задает строгое сравнение по типу (как
//по ===). Если поставить true - он будет сравнивать строго, а если false (по
//умолчанию) - то нет.

//array_search(что ищем, где ищем, [сравнивать по типу = false]);
echo "Функция array_search" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];
echo array_search('c', $arr) . "<br>";

//Функция array_reverse переворачивает массив в обратном порядке.
//Первым параметром передается массив, а вторым - сохранять ключи при
//перестановке элементов или нет (true - да, false - нет). Второй параметр
//указывать необязательно. В таком случае по умолчанию вторым параметром
//является false. Строковые ключи всегда сохраняются, независимо от
//значения этого параметра.

//array_reverse(массив, [сохранять ли ключи]);
echo "Функция array_reverse" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];
var_dump($arr);
var_dump(array_reverse($arr));

//Функция array_replace заменяет значения первого массива значениями с
//такими же ключами из других переданных массивов. Если ключ из первого
//массива присутствует во втором массиве, его значение заменяется на
//значение из второго массива. Если ключ есть во втором массиве, но
//отсутствует в первом - он будет создан в первом массиве. Если ключ
//присутствует только в первом массиве, то сохранится как есть.
//Если для замены передано несколько массивов, они будут обработаны в
//порядке передачи и более поздние массивы будут перезаписывать значения
//из предыдущих.

//array_replace(массив, массив, массив...);

echo "Функция array_replace" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];
$arr1=[1,3=>2];
$result=array_replace($arr,$arr1);
var_dump($result);

//Функция array_rand возвращает случайный ключ из массива. Первым
//параметром задается массив, а второй необязательный параметр
//указывает, сколько случайных ключей следует вернуть. Если он не указан -
//возвращается один ключ, а если указан - заданное количество ключей в виде
//массива.

//array_rand(массив, [сколько ключей выбрать]);

echo "Функция array_rand()" . "<br>";
$arr = ['a'=>1, 'b'=>2, 'c'=>3, 'd'=>4, 'e'=>5];
echo array_rand($arr) . "<br>";

//Функция array_push добавляет элементы в конец массива. При этом
//переданный массив изменяется, а функция возвращает новое количество
//элементов в массиве. Элементы для добавления перечисляются через
//запятую.

//array_push(массив, новые элемент);
echo "Функция array_push" . "<br>";
$arr = [1, 2, 3];
$num = array_push($arr, 4, 5);
var_dump($arr);

//Функция array_product вычисляет произведение (умножение) элементов
//массива.

//array_product(массив);
echo "Функция array_product" . "<br>";
$arr = [1, 2, 3, 4, 5];
echo array_product($arr) . "<br>";

//Функция array_pop вырезает и возвращает последний элемент массива.
//При этом этот элемент исчезает из массива.

//array_pop(массив);
echo "Функция array_pop" . "<br>";
$arr = [1, 2, 3, 4, 5];
echo array_pop($arr) . "<br>";

//Функция array_pad дополняет массив определенным значением до
//заданного размера. Первым параметром функция принимает массив для
//заполнения, вторым параметром - до какого размера заполнить, третьим -
//чем заполнять.
//Второй параметр можно делать отрицательным - в этом случае массив будет
//дополнятся элементами не с конца, а с начала.

//array_pad(массив, до какого размера заполнить, чем заполнять);
echo "Функция array_pad" . "<br>";
$arr = ['a', 'b', 'c', 'd', 'e'];

$result = array_pad($arr, 7, 0);
var_dump($result);

$arr = ['a', 'b', 'c', 'd', 'e'];

$result = array_pad($arr, -7, 0);
var_dump($result);

//Функция array_merge сливает два и более массивов вместе. Если в
//сливаемых массивах встречаются одинаковые ключи - останется только
//один из таких элементов. Если вам нужно, чтобы остались все элементы с
//одинаковыми ключами - используйте функцию array_merge_recursive.

//array_merge(первый массив, второй массив...);
echo "Функция array_merge" . "<br>";
$arr1 = ['a', 'b', 'c', 'd', 'e'];
$arr2 = [1, 2, 3, 4, 5];
$result = array_merge($arr1, $arr2);
var_dump($result);

//Функция array_map применяет заданную функцию ко всем элементам
//массива и возвращает измененный массив. Первым параметром функция
//принимает имя функции, а вторым - массив. Можно передавать
//дополнительные массивы третьим и так далее параметрами.

//array_map(имя функции в кавычках, массив, [еще массивы через запятую]);
echo "Функция array_map" . "<br>";
$arr = [1, 4, 9];
$result = array_map('sqrt', $arr);
var_dump($result);

//Функция array_intersect вычисляет пересечение массивов - возвращает
//массив из элементов, которые есть во всех массивах, переданных в
//функцию.

//earray_intersct(массив, массив, массив...);
echo "Функция array_intersct" . "<br>";
$arr1 = [1, 2, 3, 4, 5];
$arr2 = [3, 4, 5, 6, 7];

$result = array_intersect($arr1, $arr2);
var_dump($result);

//Функция array_flip производит обмен местами ключей и значений массива.

//array_flip(массив);
echo "Функция array_flip" . "<br>";

$arr = ['a'=>1, 'b'=>2, 'c'=>3, 'd'=>4, 'e'=>5];
var_dump(array_flip($arr));

//Функция array_fill_keys создает массив и заполняет массив элементами с
//определенным значением так, чтобы весь массив был с одинаковыми
//элементами, но разными ключами. Ключи берутся из массива,
//передаваемого первым параметром.

//array_fill_keys(массив ключей, значение - чем заполнять);

echo "Функция array_fill_keys" . "<br>";

$arr = array_fill_keys(['a', 'b', 'c', 'd', 'e'], 'x');
var_dump($arr);

//Функция array_fill создает массив, заполненный элементами с
//определенным значением.

//array_fill(ключ первого элемента, сколько элементов, чем заполнять);
echo "Функция array_fill" . "<br>";
$arr = array_fill(0, 3, array_fill(0, 3, 'x'));
var_dump($arr);

//Функция array_count_values производит подсчет количества всех значений
//массива. Возвращает ассоциативный массив, в котором ключами будут
//элементы массива, а значениями - их количество в массиве.

//array_count_values(массив);
echo "Функция array_count_values" . "<br>";
$arr = ['a', 'a', 'a', 'b', 'b', 'c'];
var_dump(array_count_values($arr));

//Функция array_combine осуществляет слияние двух массивов в один
//ассоциативный. Первым параметром функция принимает массив будущих
//ключей, а вторым - массив будущих значений.

//array_combine(массив ключей, массив значений);
echo "Функция array_combine" . "<br>";
$keys = ['a' , 'b', 'c', 'd', 'e'];
$elems = [1, 2, 3, 4, 5];

$result = array_combine($keys, $elems);
var_dump($result);

//Функция array_chunk разбивает одномерный массив в двухмерный. Первым
//параметром она принимает массив, а вторым - количество элементов в
//каждом подмассиве.

//array_chunk(массив, по сколько элементов);
echo "Функция array_chunk" . "<br>";
$arr = ['a', 'b', 'c', 'd'];

$result = array_chunk($arr, 2);
var_dump($result);


//Для сортировки массивов в PHP существует несколько функций: sort - по
//возрастанию элементов, rsort - по убыванию элементов, asort - по
//возрастанию элементов с сохранением ключей, arsort - по убыванию
//элементов с сохранением ключей, ksort - по возрастанию ключей, krsort - по
//убыванию ключей, usort - по функции по элементам, uasort - по функции по
//элементам с сохранением ключей, uksort - по функции по ключам, natsort -
//натуральная сортировка.
//Все эти функции изменяют сам массив - это значит, что результат не нужно
//никуда присваивать: поменяется сам массив.

//sort(массив);
echo "Функция sort" . "<br>";
$arr = [1, 3, 2, 5, 4];

sort($arr);
var_dump($arr);
?>