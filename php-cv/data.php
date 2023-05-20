<?php


var_dump($_SERVER); die;


//common
define('ROOT', $_SERVER['DOCUMENT_ROOT']); //корень сайта

// для отображения характеристик отправленного файла используется суперглобальный двумерный массив  $_FILES['имя файла']['атрибут']
echo $_FILES['file']['size'] . "<br>"; //размер полученного файла
echo $_FILES['file']['name'] . "<br>"; // имя полученного файла
echo $_FILES['file']['tmp_name'] . "<br>"; // полный путь временного хранилища файлов
echo $_FILES['file']['type'] . "<br>"; // тип полученнего файла


if (move_uploaded_file($_FILES['file']['tmp_name'], ROOT . '/jafar.loc' . $_FILES['file']['name']))
{
    echo "Файл скопирован усппешно";
}
else
{
    echo "Файл не скопирован усппешно";
}
echo '<pre>';
print_r ($_POST);
echo '</pre>';




?>