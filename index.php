
<!DOCTYPE HTML>
<html>
<head>
	<title>ТЕЛЕ СПРАВОЧНИК</title>
</head>
<body>
<?php 
require ('contacts.php');
?>

	<h1>Телефонная книга</h1>
	<form action="contacts.php" method="post" name="addcontact">
		<div style="display:inline-block">
			<label>Имя человека</label><br />
			<input type="text" name="name">
		</div>
		<div style="display:inline-block">
			<label>Фамилия</label><br />
			<input type="text" name="surname">
		</div>
		<div style="display:inline-block">
			<label>Номер телефона</label> <br />
			<input type="text" name="phone">
		</div>
		<input type="submit" name="submit" value="добавить">
	</form>
	
	<?php
	contact_list();
	?>

</body>
</html>

