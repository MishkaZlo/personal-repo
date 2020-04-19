<?php

require_once 'classes.php';

$publications = array();

$mysqli = new mysqli("localhost", "root", "root", "myBaseUsers");
echo('<pre>');
if ($mysqli->connect_errno){
	echo($mysqli->connect_error);
};

$result = $mysqli->query("SELECT * FROM `publication`");
while ($row = $result->fetch_array()){
		$publications[] = new  $row['type']($row);
		};
//var_dump ($publications);
?>