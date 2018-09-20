#!/usr/bin/php
<?php

function ft_split($string, $delimiter)
{
$arr = array();
    $token = strtok($string, $delimiter);
    while ($token !== false) {
        array_push ($arr, $token);
        $token = strtok(" ");
    }
    sort($arr);
    return ($arr);
}

$output = [];
if ($argc > 1)
{
   array_shift($argv);
    $i = 0;
    while ($i < count($argv))
    {
        $output = array_merge($output, ft_split($argv[$i], " "));
        $i++;
    }
    sort($output);
}
    else
        echo "please insert a string";
foreach ($output as $item)
    echo $item."\n";
?>