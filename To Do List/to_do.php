<?php
$file = "todo.list";
$hash = sha1_file ( $file );

if ( isset ( $_POST["submit"] ) && $_POST["ohash"] == $hash ) {

	if ( $_POST["submit"] == "Add" && ! empty ( $_POST["data"]) ) {

		$fp = fopen ( $file, "a+" ) or die ("Cannot open $file for writing, check permissions");

		fwrite ( $fp, stripslashes($_POST["data"])."\n" );
		fclose ( $fp ) ;

	} elseif ( $_POST["submit"] == "Remove" ) {

		$data = file ( $file );
		$fp = fopen ( $file , "w+" ) or die ("Cannot open $file for writing, check permissions");
		$n = 0;

		foreach ( $data as $line ) {
				
			if ( empty ( $_POST["line"][$n] ) ) {
				fwrite ( $fp, $line );
			}

			$n++;
				
		}

		fclose ( $fp );

	} elseif ( $_POST["submit"] == "Complete" ) { 

		$data = file ( $file );
		$fp = fopen ( $file , "w+" ) or die ("Cannot open $file for writing, check permissions");
		$n = 0;

		foreach ( $data as $line ) {

			if ( empty ( $_POST["line"][$n] ) ) {
				fwrite ( $fp, $line );
			} else {

				if ( !strstr ( $line , "<strike>") ) {
					fwrite ( $fp, "<strike>" . trim($line) . "</strike>\n" );
				} else {
					$line = str_replace ( "<strike>","",$line );
					$line = str_replace ( "</strike>","",$line );
					fwrite ( $fp, $line );

				}
			}

			$n++;
				
		}

		fclose ( $fp );

	}

	$hash = sha1_file ( "todo.list" );

}

/* HEADER BEGINS */

echo "<html>
<head>
<script language=\"javascript\">
function checkAll(){
	for (var i=0;i<document.forms[0].elements.length;i++)
	{
		var e=document.forms[0].elements[i];
		if ((e.name != 'allbox') && (e.type=='checkbox'))
		{
			e.checked=document.forms[0].allbox.checked;
		}
	}
}
</script>
</head>
<body>";

/* HEADER ENDS */

?>


<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" name="todo">
<input type="hidden" name="ohash" value="<?php echo $hash ?>" />
<pre>
<?php

	$data = file ( $file );
	$n = 0;

	foreach ( $data as $line ) {

		echo "<input type='checkbox' name='line[$n]'  />";
		echo $line ;

		$n++;

	}

?>
</pre>

<input type="checkbox" value="on" name="allbox" onclick="checkAll();"/> Toggle all<br />
<input type="text" name="data" size="35" />
<input type="submit" name="submit" value="Add" />
<input type="submit" name="submit" value="Remove" /> 
<input type="submit" name="submit" value="Complete" />
</form>
<?php


?>