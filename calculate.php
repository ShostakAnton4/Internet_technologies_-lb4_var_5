<!DOCTYPE HTML>
<html lang="ru">
<head>
	<meta charset = "UTF-8">
	<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
	<h1>Calculator</h1>
	<form action='' method='post' class="calculate-form">
		<div class='row'>
			<div class='col-xs-6 col-md-4'>
				<input type="text" name="number1" class="numbers" placeholder="First number">
			</div>
			<div class='col-xs-6 col-md-4'>
				<input type="radio" name="operation" id="plus" value="plus"/>
				<label for="plus">+</label><br>
				<input type="radio" name="operation" id="minus" value="minus"/>
				<label for="minus">-</label><br>
				<input type="radio" name="operation" id="multiply" value="multiply"/>
				<label for="multiply">*</label>
				<input type="radio" name="operation" id="divide" value="divide"/>
				<label for="divide">/</label>
			</div>
			<div class='col-xs-6 col-md-4'>
				<input type="text" name="number2" class="numbers" placeholder="Second number">
			</div>
			<div class='col-xs-6 col-md-4'>
				<input class="submit_form" type="submit" name="submit" value="Calculate">
			</div>
		</div>
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$number1 = $_POST['number1'];
	$number2 = $_POST['number2'];
	$operation = $_POST['operation'];
	
	if(!$operation || (!$number1 && $number1 != '0') || (!$number2 && $number2 != '0')) {
		$error_result = 'Not all fields are filled';
	}
    else { 
		if(!is_numeric($number1) || !is_numeric($number2)){
			$error_result = "Operands must be numbers";
		}
		else 
        switch($operation){
			case 'plus':
			    $result = $number1 + $number2;
			    break;
			case 'minus':
			    $result = $number1 - $number2;
			    break;
			case 'multiply':
			    $result = $number1 * $number2;
			    break;
			case 'divide':
			    if( $number2 == '0')
			    	$error_result = "You cannot divide by zero!";
			    else
			       $result = $number1 / $number2;
			    break;    
		}
	}
    if(isset($error_result)){
    	echo "<h3 class='error-text'>Error: $error_result</h3>";
    }	
    else {
		echo "<h3>Answer: $result</h3>";
    }
}
?>
