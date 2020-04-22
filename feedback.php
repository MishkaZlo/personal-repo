<?php
	session_start();
	if(isset($_POST["send"])){

		$from = htmlspecialchars($_POST["from"]);
		$to = htmlspecialchars($_POST["to"]);
		$subject = htmlspecialchars ($_POST["subject"]);
		$message = htmlspecialchars ($_POST["message"]);

		$_SESSION["from"] = $from;
		$_SESSION["to"] = $to;
		$_SESSION["subject"] = $subject;
		$_SESSION["message"] = $message;

		$error_from = "";
		$error_to = "";
		$error_subject = "";
		$error_message = "";
		$error = false;

		if ($from == "" || !preg_match("/@/", $from)){
			$error_from = "Некоректно введен имайл отправителя";
			$error = true;
		};
		if ($to == "" || !preg_match("/@/", $to)){
			$error_to = "Некоректно введен имайл получателяя!";
			$error = true;
		};	
		if (strlen($subject) == 0 ){
			$error_subject = "введите тему";
			$error = true;
		};
		if (strlen($message) < 5){
			$error_message = "введите Не менее 5 символов";
			$error = true;			
		};
		if (!$error){
			$subject = "=?utf-8?B?".base64_encode($subject)."=?";
			$headers = "From: $from\r\nReply-to: $to\r\nContent-type: text/plain; charset=utf-8\r\n";
			mail($to, $subject, $message, $headers);
			header ("Location: sucess.php");
			exit();
		}
	};
?>	
<!DOCTYPE html>
<html>
<head>
	<title>ФОРМА ОБРАТКИ</title>
</head>
<body>
	<h2>форма обратной связи</h2>
	<form name="feedbach" action="" method="post">

		<label> От кого:</label> <br />
		<input type="text" name="from"  value="<?=$_SESSION["from"]?>" />
		<span style="color: red"><?=$error_from ?></span> <br />

		<label> Кому:</label> <br />
		<input type="text" name="to" value="<?=$_SESSION["to"]?>"/> 
		<span style="color: red"><?=$error_to ?></span> <br />

		<label>Тема:</label> <br />
		<input type="text" name="subject" value="<?=$_SESSION["subject"]?>"/> 
		<span style="color: red"><?=$error_subject ?></span> <br />

		<label>Сообщение: </label> <br />
		<textarea name="message" cols="40" rows="10" ><?=$_SESSION["message"]?></textarea> <br />
		<input type="submit" name="send" value="отправить"/>
		<span style="color: red"><?=$error_message ?></span> <br />

	</form>	 
</body>
</html>
