<?php

// Send text if number is provided
if ($_GET["phone"] != "") {
	$phone = $_GET["phone"];
	$message = urlencode($_GET["message"]);
	$args = "phone=$phone&message=$message";
	$url = "http://localhost:3000/twilio?$args";
	
	exec("curl \"$url\"");
}

echo "<script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>";

echo "<script src='main.js'></script>";

echo "<link rel='stylesheet' type='text/css' href='main.css'>";

$title = $_GET['title'];

$title = str_replace(" ", "_", $title);

$statement = $_GET['statement'];

echo "<div id='replace-statement'>";
echo $statement;

if(isset($_GET['cite'])) {
	echo "<sup id='cite_ref-Fox_News' class='reference'>"
  				.	"<a href='http://www.foxnews.com'>"
  				.		"<span>[</span>"
  				.		"n"
  				.		"<span>]</span>"
  				.	"</a>"
  				. "</sup>";
}

echo "</div>";

$url = "http://en.m.wikipedia.org/wiki/". $title;
$source = file_get_contents($url);

echo $source;

?>
