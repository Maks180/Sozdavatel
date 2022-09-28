
<?php
function get_sum($a, $b){
    return $a + $b;
}

function get_difference($a, $b){
    return $a - $b;
}

function get_multiplication($a, $b){
    return $a * $b;
}

function division($a, $b){
    return $a / $b;
}

function calculate($a, $b, $sign){
    switch($sign){ 
    case '+': 
        return get_sum($a, $b); 
        break;
    case '-': 
        return get_difference($a, $b);
        break;
    case '*': 
        return get_multiplication($a, $b);
        break;
    case '/': 
        if( $b == '0') {
			 return 'На ноль делить нельзя!';  
        }else
            return division($a, $b);
            break;    
    }
    
    
}
function get_answer(){

    $operand1 = $_POST['operand1'];
    $operand2 = $_POST['operand2'];
    $sign = $_POST['sign'];
	
	if(!is_numeric($operand1) || !is_numeric($operand2)) {
		return 'Операнды должны быть числами';
    }

	$res = calculate($operand1, $operand2, $sign);
	
	return $res;
}

?>

<?php
if(isset($_POST['submit'])){
	if(!isset($_POST['operand1'])){
		$operand1 = "";
	} else {
		$operand1 = $_POST['operand1'];
	}  
	if(!isset($_POST['operand2'])){
		$operand2 = "";
	} else {
		$operand2 = $_POST['operand2'];
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
		
		<?php echo get_answer();?>
    </form>

</body>
</html>

