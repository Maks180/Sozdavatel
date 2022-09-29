
<?php

function check_data(int $day, int $month) {
	if (!(1 <= $day and $day <= 31 and
		  1 <= $month and $month <= 12)) {
		echo "Вы ввели не корректную дату";
		return 'nan';
	}
	
	$month_30_days = array(4, 6, 9, 11);
	if(in_array($month, $month_30_days) and $day > 30) { // 30 days in month
		echo "Вы в этом месяце не может быть 31 день<br>";
		return 'nan';
	}	
	else if($month == 2 and $day > 29) { // 29 days in month
		echo "Вы в этом месяце не может быть больше 29 деней<br>";
		return 'nan';
	}
	return '0';
}

function show_data($day, $month){
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
	
	echo "$day ";
	echo $arr[$month-1];
	echo "<br>";
}

function get_data(int $day, int $month) {
	if(check_data($day, $month) != 'nan')
		show_data($day, $month);
}

try {
	$day = 24;
	$month = 7;
	echo get_data($day, $month);	
}catch(TypeError $e){
    echo "День и месяц должны быть целым числом";
}

?>
