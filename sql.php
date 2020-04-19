<?php
	function printResult($result_set){

		while ($row = $result_set->  fetch_assoc()) {
			//print_r($row);
			print_r ($row); 	
			echo("<br />");
		};
		echo "количество записей равно -". $result_set -> num_rows . "<br />--------------";
	};
 	$mysqli = new mysqli ("localhost", "root", "root", "myBaseUsers");
 	$mysqli -> query ("SET NAMES 'utf8'");

 	$result_set = $mysqli -> query ("SELECT `login`, `id` FROM `Users` ORDER BY `id` DESC");
 	printResult($result_set);
  	
 	$mysqli -> close();
?>