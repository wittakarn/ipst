<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

foreach($_POST["field1"] as $rowIndex=>$field1_value){
    echo $field1_value.'|'.$_POST["field2"][$rowIndex];
	echo "<br/>";
}
?>