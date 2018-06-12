<?php

require("src/functions.php");

// Первое задание
$strings = [
    'Hello',
    'word'
];

task1($strings);

// Второе задание
task2('+', 5, 7, 0, 23);

// Третье задание
task3(8, 8);

// Четвертое задание
task4();

// Пятое задание
task5();

// Шестое задание
task6CreateFile('test.txt', 'Hello again!');
task6ReadFile('test.txt');
