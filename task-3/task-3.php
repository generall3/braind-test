<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 3</title>
</head>
<body>
<form method="post">
    <p><label>Введите колличество цифр
            <input type="number" size="40" name="count">
        </label></p>
    <p><label>Введите число для поиска
            <input type="number" size="40" name="number">
        </label></p>
    <input type="submit" value="Отправить">
</form>
<?php
if (isset($_POST['count']) && isset($_POST['number'])) {
    $n = $_POST['count'];
    $k = $_POST['number'];
    if ($n <=0 || $k <=0){
        echo "<b>Ошибка</b><br>Числа должны быть больше 0";
        return;
    }
    $pos = 0; //начальная позиция числа
    $pow10 = 1; //степень десяти, чтобы получитть префикс k
    while ($pow10 * 10 <= $k) { //находим степень десяти, которая не привыщает k
        $pow10 *= 10;
    }
    $init_k = $k; //начальное k
    $init_pow10 = $pow10; //начальня степень дести
    while ($pow10 >= 1) {
        $pos += ($k - $pow10 + 1); //колличество чисел
        $pow10 /= 10;
        $k /= 10;
    } // в конце цикла степень десяти будет равно 0
    $k = $init_k; //восстанавливем k
    $pow10 = $init_pow10; //восстанавливем степень десяти
    if ($k != $pow10) { //если число k не равно степени десяти
        while (true) {
            $pow10 *= 10;
            if ($pow10 > $n) { //если степень десяти стало больше 10, то выходим из цикла
                break;
            }
            $k *= 10;
            if ($n < $k) {//если число k стало больше чем n, то прибавляем к позиции разность n и степени десяти и выходим из цикла
                $pos += ($n - $pow10 + 1);
                break;
            }
            if ($n > $k) { //если число k стало меньше чем n, то прибавляем к позиции разность k и степени десяти
                $pos += ($k - $pow10);
            }
        }
    }
    echo "Число $init_k стоит на позиции: ".(int)$pos;
}
?>
</body>
</html>