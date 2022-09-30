<?php
function getIncome($n, $m, $p)
{
    $currentDate = new DateTime(date("j-n-Y"));
	$futureDate = new DateTime(date("j-n-Y", strtotime("+$m month")));
	$interval = date_diff($currentDate, $futureDate);

    return  $n + $n * $interval->format('%a') * $p / 100 / 365;
}

$time 			= 9;
$depositAmount  = 350000;
$annualInterest = 4.7;
echo 'Результат: '
 . getIncome($depositAmount, $time, $annualInterest);

?>
