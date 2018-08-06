<?php

$mass = [
    ['tomato' => 'tomato1',
     'test' => 'test1',
        'childs' => ''],
    ['tomato' => 'tomato1',
        'test' => 'test1'],
];

$data[0] = &$mass[0];



$mass[0]['childs'] = $mass[1];

var_dump($data);




