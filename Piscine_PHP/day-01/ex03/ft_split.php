#!/usr/bin/php
<?php

function ft_split($string, $delimiter)
{
    $arr = array();
    $token = strtok($string, $delimiter);
    while ($token !== false)
    {
        array_push ($arr, $token);
        $token = strtok(" ");
    }
    sort($arr);
    return ($arr);
}
?>
