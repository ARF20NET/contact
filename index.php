<?php

if (isset($_POST["company"])) {
	$company = $_POST["company"];
	$name = $_POST["name"];
	$mail = $_POST["mail"];
	$num = $_POST["num"];
	$reason = $_POST["reason"];
	$body = $_POST["body"];

	$contact = "Company: ".$company."\nFull Name: ".$name."\nEmail: ".$mail."\nPhone number: ".$num."\nReason: ".$reason."\nBody: ".$body."\n==CONTACT END==\n\n";

	$extra = "";
	while (file_exists("contact_".date("d-m-Y").$extra.".txt")) {
		$extra .= "_";
	}

	file_put_contents("contact_".date("d-m-Y").$extra.".txt", $contact);
	mail("arf20@arf20.com", "Contact Letter", $contact, "From: contactform@arf20.com");
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
		<h2>ARFNET Contact Information</h2>
		ARFNET Email: <a href="mailto:arf20@arf20.com">arf20@arf20.com</a> <a href="arf20_at_arf20.com_public.asc">PGP</a><br>
		Personal Email: <a href="mailto:aruizfernandez05@gmail.com">aruizfernandez05@gmail.com</a><br>
		Discord: arf20#6509<br>
		Telegram: @arf2_0<br>
		Twitter: @AngelRF49375726<br>
		Instagram: @arf20__<br>

		<hr>
		<h2>ARFNET Contact Form</h2>
		<form class="form" method="POST" action="/contact/index.php">
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
