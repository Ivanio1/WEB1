<?php

// Validate functions
function validateX($xVal) {
    return isset($xVal);
}

function validateY($yVal) {
    $Y_MIN = -3;
    $Y_MAX = 5;

    if (!isset($yVal))
        return false;

    $numY = str_replace(',', '.', $yVal);
    return is_numeric($numY) && $numY >= $Y_MIN && $numY <= $Y_MAX;
}

function validateR($rVal) {
    return isset($rVal);
}

function validateForm($xVal, $yVal, $rVal) {
    return validateX($xVal) && validateY($yVal) && validateR($rVal);
}

// Проверка фигур
function checkTriangle($xVal, $yVal, $rVal) {
    return $xVal >= 0 && $yVal >= 0 &&
        $xVal + $yVal <=  $rVal;
}

function checkRectangle($xVal, $yVal, $rVal) {
    return $xVal <= 0 && $yVal >= 0 &&
        $xVal >= -$rVal && $yVal <= $rVal;
}

function checkCircle($xVal, $yVal, $rVal) {
    return $xVal >=0 && $yVal <= 0 &&
        sqrt($xVal*$xVal + $yVal*$yVal) <= $rVal;
}

function checkHit($xVal, $yVal, $rVal) {
    return checkTriangle($xVal, $yVal, $rVal) || checkRectangle($xVal, $yVal, $rVal) ||
        checkCircle($xVal, $yVal, $rVal);
}

// Основная программа
$xVal = $_GET['xval'];
$yVal = $_GET['yval'];
$rVal = $_GET['rval'];
date_default_timezone_set("UTC");
$timezoneOffset = $_GET['timezone'];

$isValid = validateForm($xVal, $yVal, $rVal);
$converted_isValid = $isValid ? 'true' : 'false';
$isHit = $isValid ? checkHit($xVal, $yVal, $rVal) : 'GG!';
$converted_isHit = $isHit ? 'true' : 'false';

$currentTime = date('H:i:s', time()-$timezoneOffset*60);
$executionTime = round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 7);

$jsonData = '{' .
    "\"validate\":$converted_isValid," .
    "\"xval\":\"$xVal\"," .
    "\"yval\":\"$yVal\"," .
    "\"rval\":\"$rVal\"," .
    "\"curtime\":\"$currentTime\"," .
    "\"exectime\":\"$executionTime\"," .
    "\"hitres\":$converted_isHit" .
    "}";

echo $jsonData;