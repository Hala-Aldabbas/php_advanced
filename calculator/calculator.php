<?php
$currentValue = 0;

$input = [];
function getInputAsString($values){
    $o = "";
    foreach ($values as $value){
        $o .= $value;
    }
    return $o;
}

function calculateInput($userInput){
    // format user input
    $arr = [];
    $char = "";
    foreach ($userInput as $num){
        if(is_numeric($num) || $num == "."){
            $char .= $num;
        }else if(!is_numeric($num)){
            if(!empty($char)){
                $arr[] = $char;
                $char = "";
            }
            $arr[] = $num;
        }
    }
    if(!empty($char)){
        $arr[] = $char;
    }
    // calculate user input

    $current = 0;
    $action = null;
    for($i=0; $i<= count($arr)-1; $i++){
        if(is_numeric($arr[$i])){
            if($action){
                if($action == "+"){
                    $current = $current + $arr[$i];
                }
                if($action == "-"){
                    $current = $current - $arr[$i];
                }
                if($action == "x"){
                    $current = $current * $arr[$i];
                }
                if($action == "/"){
                    $current = $current / $arr[$i];
                }
                $action = null;
            }else{
                if($current == 0){
                    $current = $arr[$i];
                }
            }
        }else{
            $action = $arr[$i];
        }
    }
    return $current;

}


if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['input'])){
        $input = json_decode($_POST['input']);
    }



    if(isset($_POST)){
        foreach ($_POST as $key=>$value){
            if($key == 'equal'){
               $currentValue = calculateInput($input);
               $input = [];
               $input[] = $currentValue;
            }elseif($key == "ce"){
                array_pop($input);
            }elseif($key == "c"){
                $input = [];
                $currentValue = 0;
            }elseif($key != 'input'){
                $input[] = $value;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Calculator</title>
</head>
<style>
h2{
    font-size:60px;
    text-align: center;
}
.calc{
    border: 1px solid black;
    padding: 15px; 
    display: inline-block; 
height:450px;
    width:22% ; margin-left: 600px;
}
td{
    padding:10px;
   
}
input , button{
     width: 60px;
     height: 60px;
     font-size:30px
}
p{
   padding: 5px; 
   margin:5px;
   font-size:30px
}
</style>
<body>
<h2>My Calculator</h2>
<div class="calc" >
    <form method="post">
    <input type="hidden" name="input" value='<?php echo json_encode($input);?>'/>
    <p ><?php echo getInputAsString($input);?></p>

    <table >
        <tr>
            <td><input type="submit" name="ce" value="CE"/></td>
            <td colspan="2" ><input style="width:150px;background-color:skyblue" type="submit" name="c" value="C"/></td>
            <td><input type="submit" name="divide" value="/"/></td>
          
        </tr>
        <tr>
            <td><input type="submit" name="7" value="7"/></td>
            <td><input type="submit" name="8" value="8"/></td>
            <td><input type="submit" name="9" value="9"/></td>
            <td><input type="submit" name="multiply" value="x"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="4" value="4"/></td>
            <td><input type="submit" name="5" value="5"/></td>
            <td><input type="submit" name="6" value="6"/></td>
            <td><input type="submit" name="minus" value="-"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="1" value="1"/></td>
            <td><input type="submit" name="2" value="2"/></td>
            <td><input type="submit" name="3" value="3"/></td>
            <td><input type="submit" name="add" value="+"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="zero" value="0"/></td>
            <td><input type="submit" name="." value="."/></td>
            <td colspan="2"><input style="width:150px; background-color:skyblue" type="submit" name="equal" value="="/></td>
        </tr>
    </table>
    </form>
</div>

</body>
</html>
