<!DOCTYPE html>
<html>
<head>
    <title>response</title>
    <meta charset="utf-8">
</head>
<body>

<?php

$start = microtime(true);

date_default_timezone_set("UTC");
if (array_key_exists("offset", $_GET)) {
    $OFFSET = $_GET["offset"];
} else $OFFSET = 0;
//$time = time() + 3 * 3600;
echo "<p class='script'>Текущее время: " . date("d.m.Y, G:i:s", $start - $OFFSET / 60 * 3600) . "</p>";

if (!isset($_GET['x']) || !isset($_GET['y']) || !isset($_GET['r'])) die ("Вы выбрали не все переменные");

$x = $_GET['x'];
$y = $_GET['y'];
$r = $_GET['r'];

if ($y <= 0 && $x >= 0 && $y ** 2 + $x ** 2 <= $r ** 2 || $y >= 0 && $y <= $r && $x <= 0 && $x >= -$r  || $y >= 0 && $x >= 0 && $y + $x <= $r) {
    echo '<p> Точка (' . $x . '; ' . $y . ') при параметре R = ' . $r . ' попала в закрашенную область! </p>';
} else {
    echo '<p class = "script"> Точка (' . $x . '; ' . $y . ') при параметре R = ' . $r . ' не попала в закрашенную область! </p>';
}

$t = round((microtime(true) - $start), 7);

echo '<p class="script">Время работы скрипта: ' . $t . " сек<br></p>";

?>
</body>
</html>