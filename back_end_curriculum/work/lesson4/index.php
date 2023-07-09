<?php
echo "<h2> lesson 4 </h2>";

echo "<pre>";

$num0 = [
    "info" => [
        "name" => "木村",
        "division" => "1",
        "age" => "25"
    ],

    "skill" => [
        "lang" => ["PHP","Ruby"],
        "fw" => ["Laravel" , "CakePHP" , "Rails"]
    ],

    "description" => "バックエンドエンジニア"
];
//ここまでが $num0

$num1 = [
    "info" => [
        "name" => "木村",
        "division" => "2",
        "age" => "23"
    ],

    "skill" => [
        "lang" => ["HTML" , "CSS" , "JS"],
        "fw" => ["Vue.js"]
    ],

    "description" => "フロントエンジニア"
];
//ここまでが $num1

$num2 = [
    "info" => [
        "name" => "加藤",
        "division" => "2",
        "age" => "20"
    ],

    "skill" => [
        "lang" => ["PHP"],
        "fw" => []
    ],

    "description" => "PHP初学者"
];
//ここまでが $num2

$array = array(
    $num0 , $num1 , $num2
);

var_dump($array);
echo "</pre>";
