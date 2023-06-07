<?php
function infinityMenu(array &$menu, $parentId = null)
{
    $result = [];

    foreach ($menu as $menuNumberCount => &$menuItem)
    {
        if ($menuItem['parentId'] == $parentId) {
            $menuItem['childs'] = infinityMenu($menu, $menuItem['id']);
            $result[] = $menuItem;
        }
    }

    return $result;
}

//исходные данные
$menu =[
    [
        'id' => 1,
        'title' => 'Автомобили',
        'description' => "Автотранспорт",
        'parentId' => null
    ],
    [
        'id' => 2,
        'title' => 'Легковые автомобили',
        'description' => 'Легкий транспорт',
        'parentId' => 1,

    ],
    [
        'id' => 3,
        'title' => 'Грузовые автомобили',
        'description' => 'aboutList-3',
        'parentId' => 1,
    ],
    [
        'id' => 4,
        'title' => 'Эксколаторы',
        'description' => 'aboutList-3',
        'parentId' => 3,
    ],
    [
        'id' => 5,
        'title' => 'Машины с краном',
        'description' => 'aboutList-3',
        'parentId' => 3,
    ],
    [
        'id' => 6,
        'title' => 'Детские игрушки',
        'description' => 'aboutList-3',
        'parentId' => null,
    ],
    [
        'id' => 7,
        'title' => 'Стройматериалы',
        'description' => 'aboutList-3',
        'parentId' => null,
    ],
    [
        'id' => 8,
        'title' => 'Двери',
        'description' => 'aboutList-3',
        'parentId' => 7,
    ],
    [
        'id' => 9,
        'title' => 'Двери для кухни',
        'description' => 'aboutList-3',
        'parentId' => 8,
    ],
    [
        'id' => 10,
        'title' => 'Двери входные',
        'description' => 'aboutList-3',
        'parentId' => 8,
    ]
];


//ожидание данные


$result = [
    [
        'id' => 1,
        'title' => 'Автомобили',
        'description' => "Автотранспорт",
        'parentId' => null,
        'childs' => [
            [
                'id' => 2,
                'title' => 'Легковые автомобили',
                'description' => 'Легкий транспорт',
                'parentId' => 1,

            ],
            [
                'id' => 3,
                'title' => 'Грузовые автомобили',
                'description' => 'aboutList-3',
                'parentId' => 1,
                'childs' => [
                    [
                        'id' => 4,
                        'title' => 'Эксколаторы',
                        'description' => 'aboutList-3',
                        'parentId' => 3,
                    ],
                    [
                        'id' => 5,
                        'title' => 'Машины с краном',
                        'description' => 'aboutList-3',
                        'parentId' => 3,
                    ],
                ]
            ],
        ],
        [
            'id' => 6,
            'title' => 'Детские игрушки',
            'description' => 'aboutList-3',
            'parentId' => null,
        ],
        [
            'id' => 7,
            'title' => 'Стройматериалы',
            'description' => 'aboutList-3',
            'parentId' => null,
            'childs' => [
                [
                    'id' => 8,
                    'title' => 'Двери',
                    'description' => 'aboutList-3',
                    'parentId' => 7,
                    'childs' => [
                        [
                            'id' => 9,
                            'title' => 'Двери для кухни',
                            'description' => 'aboutList-3',
                            'parentId' => 8,
                        ],
                        [
                            'id' => 10,
                            'title' => 'Двери входные',
                            'description' => 'aboutList-3',
                            'parentId' => 8,
                        ],
                    ],
                ],
            ]
        ],
    ],
];


var_dump(infinityMenu($menu));