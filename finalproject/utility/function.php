<?php
function get($key, $defaultValue)
{
  $value = isset($_GET[$key]) ? $_GET[$key] : $defaultValue;
  return $value;
}

function getData($dictonary, $key, $defaultValue)
{
  $value = isset($dictonary[$key]) ? $dictonary[$key] : $defaultValue;
  return $value;
}

function qpa($data)
{
  $number = (float) $data;
  $format = number_format($number, 2, '.', ',');
  return $format;
}

function fmoney($data)
{
  $number = (float) $data;
  $format = number_format($number, 2, '.', ',');
  return $format;
}

function money_in_billions($data)
{
  $number = (float) $data / 1_000_000_000;
  $format = number_format($number, 5, '.', ',');
  return $format;
}

function sumSalary($input){
  $total = 0;
  foreach($input as $value){
    $total += $value["salary"];
  }
  
  return $total;
}
function avgsalary($input){
  $total = sumSalary($input);
  $count = count($input);
  if($count > 0){
    return $total / $count;
  }else{
    return 0;
  }
}
function maxSalary($input){
  $max = PHP_INT_MIN;
  foreach($input as $value){
    $max = max($max, $value["salary"]);
  }
  return $max;
}
function minSalary($input){
  $min = PHP_INT_MAX;
  foreach($input as $value){
    $min = min($min, $value["salary"]);
  }
  return $min;
}

?>