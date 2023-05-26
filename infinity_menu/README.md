<?php

Рекурсионная функция для определения родителя:
Передаем в функцию параметром массив "menu" ребенка,
получаем его родителя с помощью рекурсии

function infinityMenu(array $menu)
{
    foreach($menu as $key => $value)
    {
        if($key=='parent_ID' && $value!=null)
        {
            infinityMenu($value);
        }
        elseif (!is_array($value) && $value!=null)
        {
            echo $key . "=>" . $value . "<br>";
        }
    }
}

Массив из меню:
$menu_1 =
    [
        'title' => 'list-1',
        'description' => 'aboutList-1',
        'parent_ID' => null
    ];
$menu_2 =
    [
        'title' => 'list-2',
        'description' => 'aboutList-2',
        'parent_ID' => $menu_1,

    ];
$menu_3 =
    [
        'title' => 'list-3',
        'description' => 'aboutList-3',
        'parent_ID' => $menu_2,

    ];

infinityMenu($menu_3);