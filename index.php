<?php

if (isset($_POST["company"])) {
	$company = $_POST["company"];
	$name = $_POST["name"];
	$mail = $_POST["mail"];
	$num = $_POST["num"];
	$reason = $_POST["reason"];
	$url = $_POST["body"];

	file_put_contents("contact_".date("d-m-Y").".txt", "Company: ".$company."\nFull Name: ".$name."\nEmail: ".$mail."\nPhone number: ".$num."\nReason: ".$reason."\nBody: ".$body);
}

?>

<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <title>ARFNET</title>
		<style>
			.title {
				font-size: 36px;
			}
			
			header *{
				display: inline-block;
			}
			
			* {
				vertical-align: middle;
				max-width: 100%;
			}
			
			.text {
				width: 500px;
				height: 200px;
			}
			
			.form {
				margin: 20px;
				padding: 20px;
				//border: solid 1px;
			}
		</style>
    </head>

    <body>
		<header>
			<img src="/arfnet_logo.png" width="64">
			<span class="title"><strong>ARFNET</strong></span>
		</header>
		<hr>
		<a class="home" href="/">Home</a><br>
		<h2>ARFNET Contact Form</h2>
		<hr>
		<form class="form" method="POST" action="/dmcarequest/index.php">
			<label>Company</label><br>
			<input type="text" name="company"></input><br><br>
			<label>Full Name</label><br>
			<input type="text" name="name"></input><br><br>
			<label>Email</label><br>
			<input type="text" name="mail"></input><br><br>
			<label>Phone number</label><br>
			<input type="text" name="num"></input><br><br>
			<label>Reason</label><br>
			<input type="text" name="reason"></input><br><br>
			<label>Body</label><br>
			<textarea class="text" name="body"></textarea><br><br>
			<input type="submit" value="Submit"></input>
		</form>
	</body>
</html>