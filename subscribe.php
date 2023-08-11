<?php

if (isset($_POST["mailaddr"])) {
	$extra = "";
	while (file_exists("mailinglistsub_".date("d-m-Y").$extra.".txt")) {
		$extra .= "_";
	}
	$mailaddr = $_POST["mailaddr"];

	mail($mailaddr, "ARFNET Mailing List Subscription Confirmation Letter",
		"This is an automatic message.\r\nGo to https://arf20.com/contact/subscribe.php?confirm=$mailaddr to confirm your email address.\r\n".
		"--\r\nARFNET Mailing System\r\n", "From: mailinglistform@arf20.com");

	echo "Look at your inbox\n";
}

if (isset($_GET["confirm"])) {
	$confirmaddr = $_GET["confirm"];
	file_put_contents("mailinglistsub_".date("d-m-Y").$extra.".txt", $confirmaddr."\n");
	mail("arf20@arf20.com", "Mailing List Subscription Request", $confirmaddr."\n", "From: subscriptionform@arf20.com");

	echo "Your email address has been subscribed to the mailing list\n";
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
			<a href="/">
				<img src="/arfnet_logo.png" width="64">
				<span class="title"><strong>ARFNET</strong></span>
			</a>
		</header>
		<hr>
		<h2>ARFNET Mailing List Subscription Form</h2>
		<form class="form" method="POST" action="/contact/subscribe.php">
			<label>E-Mail Address</label><br>
			<input type="text" name="mailaddr"></input><br><br>
			<input type="submit" value="Submit"></input>
		</form>
		To unsubscribe, message arf20@arf20.com
	</body>
</html>
