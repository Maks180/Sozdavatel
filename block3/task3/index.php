<?php
if(isset($_POST['submit']))
{
	if(!isset($_POST['operand1']))
		$operand1 = "";
    else 
		$operand1 = $_POST['operand1'];
	 
	if(!isset($_POST['operand2']))
		$operand2 = "";
	else
		$operand2 = $_POST['operand2'];
		
	if(isset($_POST['result']))
		$result = "";
	else
		$result = getAnswer();
		if (!is_numeric($result))
		{
			echo $result;
			$result = '';
		}
			
	$sign = $_POST['sign'];
}
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>

    <meta charset = "UTF-8">
</head>
<body>
    <h1>Простейший калькулятор</h1>
    <form action="" method="post">
        <input type="text" name="operand1" required value=<?php echo $operand1;?>> 
		<select name="sign">
			<option <?php if($sign == '+'){echo("selected");}?> value='+'>+ </option>
			<option <?php if($sign == '-'){echo("selected");}?> value='-'>- </option>
			<option <?php if($sign == '*'){echo("selected");}?> value="*">* </option>
			<option <?php if($sign == '/'){echo("selected");}?> value="/">/ </option>
		</select>
		<input type="text" name="operand2" required placeholder="Второе число" value=<?php echo $operand2;?>>
			 
		<input type="submit" name="submit" value="=">
		<input type="text" name="result" disabled placeholder="Результат" value=<?php echo $result;?>>
    </form>

</body>
</html>

<?php
function getSum($a, $b) { return $a + $b; }

function getDifference($a, $b) { return $a - $b; }

function getMultiplication($a, $b) { return $a * $b; }

function getDivision($a, $b) { return $a / $b; }

function calculate($a, $b, $sign)
{
    switch ($sign)
    { 
        case '+': 
            return getSum($a, $b); 
            break;
        case '-': 
            return getDifference($a, $b);
            break;
        case '*': 
            return getMultiplication($a, $b);
            break;
        case '/': 
            if ($b == '0') 
			    return 'На ноль делить нельзя!';  
            else
                return getDivision($a, $b);
            break;
        default:
            break;
    }      
}


function getAnswer()
{
    $sign     = $_POST['sign'];
    $operand1 = $_POST['operand1'];
    $operand2 = $_POST['operand2'];
    
	if(!is_numeric($operand1) or !is_numeric($operand2)) 
		return 'Операнды должны быть числами';

	$res = calculate($operand1, $operand2, $sign);
	
	return $res;
}

?>