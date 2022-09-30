<?php

function checkData(int $day, int $month)
{
	if (!(1 <= $day and $day <= 31 and
		  1 <= $month and $month <= 12))
		return "Вы ввели не корректную дату<br>";
	
	
	$month30Days = array(4, 6, 9, 11);
	if (in_array($month, $month30Days) and $day > 30) // 30 days in month
		return "Вы в этом месяце не может быть 31 день<br>";
	elseif ($month == 2 and $day > 29)  // 29 days in month
		return  "Вы в этом месяце не может быть больше 29 деней<br>";

	return '0';
}

function showData($day, $month)
{
	$arr = [
	  'января',
	  'февраля',
	  'мара',
	  'апреля',
	  'мая',
	  'июня',
	  'июля',
	  'августа',
	  'сентября',
	  'октября',
	  'ноября',
	  'декабря'
	];
	
	echo $day . ' ' . $arr[$month-1] . "<br>";
}

function getData(int $day, int $month)
{
	$result = checkData($day, $month);
	if ($result == '0')
		showData($day, $month);
	else
		echo $result;
}

try 
{
	$day   = 24;
	$month = 7;
	echo getData($day, $month);	
}
catch(TypeError $e)
{
    echo 'День и месяц должны быть целым числом';
}

?>
