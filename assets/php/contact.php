<?php

	// Mail settings
	$to      = "ask@Interiorsignature.com, alberttee1986@gmail.com";
	$subject = "Website Enquiry";

	// You can put here your email
	$header = "From: ask@Interiorsignature.com";
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-Type: text/plain; charset=utf-8\r\n";
	$header.= "X-Priority: 1\r\n";

	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["message"])) {

		$content  = "Name: "      . $_POST["name"]    . "\r\n";
		$content .= "Email: "     . $_POST["email"]   . "\r\n";
		$content .= "Phone: "     . $_POST["phone"]   . "\r\n";
		$content .= "Message: "   . "\r\n" . $_POST["message"];

		if (mail($to, $subject, $content, $header)) {
			$result = array(
				"message"    => "Thanks for contacting us.",
				"sendstatus" => 1
			);

			echo json_encode($result);
		} else {
			$result = array(
				"message"    => "Sorry, something is wrong.",
				"sendstatus" => 0
			);

			echo json_encode($result);
		}

	}

?>