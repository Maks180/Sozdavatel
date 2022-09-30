<?php
function inSegment($a, $b, $c) { return $a <= $c and $c <= $b; }

function checkData(int $hour, int $minute) 
{
	if (!inSegment(0, 12, $hour))
		echo "Введите значение часовой стрелки от 0 до 12";
	elseif(!inSegment(0, 59, $minute))
		echo "Введите значение минутной стрелки от 0 до 59";
	else
		return '0';
		
	return 'nan';	
}

function calcAngleBetween($a, $b) 
{
	if ($a >= $b)
		$angle = $a - $b;
	else
		$angle = $b - $a;

	if ($angle > 180)
		return 360 - $angle;
	
	return $angle;
}

function getAngle(int $hour, int $minute) 
{
	if (checkData($hour, $minute) != '0')
		return 'Не удалось посчитать угол';

	if ($hour == 12 or $hour == 0)
		$positionH = 0.5 * $minute;
	else
		$positionH = 30 * $hour + 0.5 * $minute;

	$positionM = 6 * $minute;

	return calcAngleBetween($positionH, $positionM);
}

try
{
	$hour   = 7;
	$minute = 59;

	$angle = getAngle($hour, $minute);

	if (is_numeric($angle))
		echo 'Угол для ' . $hour . ':'
		 	. $minute . ' = ' . $angle . ' °';
	else
		echo $angle;
}
catch(TypeError $e)
{
    echo 'Часы и минуты должны быть целыми числами.';
}

?>
