#!/usr/bin/php
<?php
if ($argc == 2)
{
	$ustr = trim(preg_replace('/\s+/', ' ', $argv[1]));
	$arr = explode(" ", $ustr);
	if (count($arr) == 5)
	{
		$str = strtolower($ustr);
		$str = trim(preg_replace('/january/', '0', $str));
		$str = trim(preg_replace('/february/', '31', $str));
		$str = trim(preg_replace('/march/', '59', $str));
		$str = trim(preg_replace('/april/', '90', $str));
		$str = trim(preg_replace('/may/', '120', $str));
		$str = trim(preg_replace('/june/', '151', $str));
		$str = trim(preg_replace('/july/', '181', $str));
		$str = trim(preg_replace('/august/', '212', $str));
		$str = trim(preg_replace('/september/', '243', $str));
		$str = trim(preg_replace('/october/', '273', $str));
		$str = trim(preg_replace('/november/', '304', $str));
		$str = trim(preg_replace('/december/', '334', $str));
		$str = trim(preg_replace('/:/', ' ', $str));
		$arr = explode(" ", $str);
		$day = ($arr[3] - 1970) * 365;
		$leap = (int)(($arr[3] - 1972)/4);
		$days = $day + $leap + $arr[1] + $arr[2];
		$secs = ($arr[4] * 60 * 60) + ($arr[5] * 60) + $arr[6];
		echo ($days * 24 * 60 * 60) + $secs.PHP_EOL;
	}
	else
		echo "Wrong Format".PHP_EOL;
}
?>