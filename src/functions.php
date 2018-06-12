<?php

function task1($strings, $ret = false)
{
    $result = null;

    foreach ($strings as $str) {
        $result .= "<p>$str</p>";
    }

    if ($ret) {
        return $result;
    }

    echo $result;

    return null;
}

function task2()
{
    $argList = func_get_args();
    $result = $argList[1];

    switch ($argList[0]) {
        case '+':
            for ($i = 2; $i < count($argList); $i++) {
                $result += $argList[$i];
            }
            task2DisplayResult($argList, $result);
            break;
        case '-':
            for ($i = 2; $i < count($argList); $i++) {
                $result -= $argList[$i];
            }
            task2DisplayResult($argList, $result);
            break;
        case '*':
            for ($i = 2; $i < count($argList); $i++) {
                $result *= $argList[$i];
            }
            task2DisplayResult($argList, $result);
            break;
        case '/':
            for ($i = 2; $i < count($argList); $i++) {
                if ($argList[$i] == 0) {
                    continue;
                }
                $result /= $argList[$i];
            }
            task2DisplayResult($argList, $result);
            break;
        default:
            echo "Такой операции не существует!";
            break;
    }
}

function task2DisplayResult($argList, $result)
{
    echo "Результат: ";

    for ($i = 1; $i < count($argList); $i++) {
        echo $argList[$i];

        if (isset($argList[$i + 1])) {
            echo " " . $argList[0] . " ";
        }
    }

    echo " = " . $result;
}

function task3($cols, $rows)
{
    $error = null;

    if (!is_numeric($cols)) {
        $error = 'Значение переменной $cols должно быть числовым.';
    } elseif ($cols < 1) {
        $error = 'Значение переменной $cols должно быть больше 0.';
    }

    if (!is_numeric($rows)) {
        $error = 'Значение переменной $rows должно быть числовым.';
    } elseif ($rows < 1) {
        $error = 'Значение переменной $rows должно быть больше 0.';
    }

    if (!empty($error)) {
        die($error);
    }

    echo '<table border="1">';

    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';

        for ($j = 1; $j <= $cols; $j++) {
            $result = $i * $j;

            echo '<td>' . $result . '</td>';
        }

        echo '</tr>';
    }

    echo '</table>';
}

function task4()
{
    echo "Текущая дата: " . date("d.m.Y H:i") . "<br />";
    echo "Unixtime: " . strtotime("24.02.2016 00:00:00");
}

function task5()
{
    $str = "Карл у Клары украл Кораллы";
    $result = preg_replace('|К|', "", $str);
    echo $result . "<br /><br />";

    $str = "Две бутылки лимонада";
    $result = preg_replace('|Две|', "Три", $str);
    echo mb_strtoupper($result);
}

function task6CreateFile($filename, $string)
{
    if (!empty($filename)) {
        if (!$handle = fopen($filename, 'w+')) {
            die("Неудается создать файл ($filename)");
        }

        if (fwrite($handle, $string) === false) {
            die("Неудается записать в файл ($filename)");
        }

        fclose($handle);
    } else {
        die("Нужно указать имя файла.");
    }
}

function task6ReadFile($filename)
{
    $content = file_get_contents($filename);

    if ($content !== false) {
        if (mb_strlen($content) > 0) {
            echo "<pre>$content</pre>";
        } else {
            echo 'Пустой файл.';
        }
    } else {
        echo "Неудалось открыть файл ($filename).";
    }
}
