<?php

function addContact(){ // писать не в обоих функциях а 1 раз в файле

	$mysqli = new mysqli("localhost", "root", "root", "contacts"); // все в одну строку стрелку
	$mysqli -> query ("SET NAMES 'utf8'"); // нет пробела у стерлрк

	if ($_POST[submit] !=""){ // if POST просто и без равно
			$addcontact = $mysqli -> query ("INSERT INTO `contact_list` (`name`, `surname`, `phone`) VALUES('$_POST[name]', '$_POST[surname]', '$_POST[phone]')");
		header("location: index.php");
	};

	$mysqli -> close();
};
	
function contact_list(){
	$mysqli = new mysqli("localhost", "root", "root", "contacts");
	$mysqli -> query ("SET NAMES 'utf8'");
	$list = $mysqli -> query("SELECT * FROM `contact_list`");

	$connectContact = "";
	$i=0;

while ($row = $list->fetch_assoc()){
		$i++;
		$connectContact = $connectContact."<tr>
		<td>$i</td>
		<td>$row[name]</td>
		<td>$row[surname]</td>
		<td>$row[phone]</td>
		</tr>";
		};
	
	if (($numRows = $list -> num_rows) > 0){
		$connecthtml = "<table> 
		<caption>Таблица rконтактов</caption>
		<tr>
    		<th>№</th>
    		<th>Имя</th>
    		<th>Фамилия</th>
    		<th>Номер</th>
   		</tr>
   		$connectContact
   		</table> ";
		echo("$connecthtml");
	}
	$mysqli -> close();

};
addContact();
?>