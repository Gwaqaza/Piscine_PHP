#!/usr/bin/php
<?php

function ft_is_sort($arr)
{
    $sorter = $arr;
    sort($sorter);
    $flag = true;
    if ($sorter === $arr)
        return $flag;
    else
        return $flag = false;
}
?>
