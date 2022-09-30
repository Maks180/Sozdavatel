<?php
function in_segment($a, $b, $c) {
	return $a <= $c and $c <= $b;
}

function check_data(int $hour, int $minute) {
	if (!in_segment(0, 12, $hour))
		echo "Введите значение часовой стрелки от 0 до 12";
	elseif(!in_segment(0, 59, $minute))
		echo "Введите значение минутной стрелки от 0 до 59";
	else
		return '0';
		
	return 'nan';	
}

function calc_angle_between($a, $b) {
	if ($a >= $b)
		$angle = $a - $b;
	else
		$angle = $b - $a;

	if ($angle > 180)
		return 360 - $angle;
	
	return $angle;
}

function get_angle(int $hour, int $minute) {
	if (check_data($hour, $minute) != '0')
		return 'Не удалось посчитать угол';

	if ($hour == 12 or $hour == 0)
		$position_h = 0.5 * $minute;
	else
		$position_h = 30 * $hour + 0.5 * $minute;

	$position_m = 6 * $minute;

	return calc_angle_between($position_h, $position_m);
}

try {
	$hour = 7;
	$minute = 59;

	$angle = get_angle($hour, $minute);

	if (is_numeric($angle))
		echo "Угол для $hour:$minute = $angle  °";
	else
		echo $angle;

}catch(TypeError $e){
    echo "Часы и минуты должны быть целыми числами.";
}

?>
