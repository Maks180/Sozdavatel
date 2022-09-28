
<?php
function get_income_on_deposit($n, $m, $p){
    $current_data = new DateTime(date("j-n-Y"));
	$future_date = new DateTime(date("j-n-Y", strtotime("+$m month")));
	$interval = date_diff($current_data, $future_date);
	$interval1 = $future_date->diff($current_data);
	
    return  $n + $n * $interval->format('%a') * $p / 100 / 365;
}
$deposit_amount = 350000;
$time = 9;
$annual_interest = 4.7;


echo "Результат: " . get_income_on_deposit($deposit_amount, $time, $annual_interest);

?>
