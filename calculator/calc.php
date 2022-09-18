<?php


if(isset($_POST['sub'])){
	$num1=$_POST['n1'];
	$num2=$_POST['n2'];
	$oprnd=$_POST['sub'];
	if($oprnd=="+")
		$ans=$num1+$num2;
	else if($oprnd=="-")
		$ans=$num1-$num2;
	else if($oprnd=="x")
		$ans=$num1*$num2;
	else if($oprnd=="/")
		$ans=$num1/$num2;
}?>
<html>
<head>
	<style type="text/css">
		.container
		{
			width: 600px;
			padding: 100px;
			text-align: center;
			border: 1px solid black;
			
		}
		input, select {
  		
  			padding: 12px 20px;
  			margin: 8px 5px;
  			display: inline-block;
  			border: 1px solid #ccc;
  			border-radius: 4px;
  			box-sizing: border-box;
		}

		input[type=submit] {
  			width: 8%;
 		 	background-color: skyblue;
  			color: black;
  			padding: 14px 20px;
  			margin: 8px 0;
  			border: none;
	 	 	border-radius: 4px;
  			cursor: pointer;
            font-size:20px;
}
	</style>
</head>
<body>


<div class="container">
<form method="post" action="">
<h1>Simple Calculator</h1>
<br>
First Number:<input name="n1" value="">
<br>
Second Number:<input name="n2" value="">
<br>
<input type="submit" name="sub" value="+">
<input type="submit" name="sub" value="-">
<input type="submit" name="sub" value="x">
<input type="submit" name="sub" value="/">
<br>
<label for=""><?php echo $ans; ?></label>
<!-- <br>Result: <input type='text' value="<?php echo $ans; ?>"><br> -->
</form>
	</div>
</body>
</html>