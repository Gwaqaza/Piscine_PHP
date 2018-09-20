#!/usr/bin/php
<?php

function is_odd($num)
{
    return (is_numeric($num)&($num&1));
}

function is_even($num)
{
    return (is_numeric($num) % 2 == 0);
}

while (1)
{
    echo "Enter the number: ";
    if ($line = fgets(STDIN))
    {
        $num = rtrim($line, "\n");
        if (!is_numeric($num))
            echo "'$num' is not a number\n";
        else if (is_numeric($num))
        {
            if (is_even($line))
                echo "The number $num is even\n";
            else if (is_odd($line))
                echo "The number $num is odd\n";
        }
    }
    else
    {
        echo "\n";
        return;
    }
}
?>