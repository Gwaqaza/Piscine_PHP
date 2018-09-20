#!/usr/bin/php
<?php

function str_epur($string)
{

    $input = preg_replace('/\s+/',' ',$string);
    $output = trim($input);
    return ($output);
}
echo str_epur($argv[1]). "\n";
?>
