<?php

$con = mysqli_connect("localhost","root","","contactbook");

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}	



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Book</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
		.main-area{
			border: 2px solid #337ab7;
			padding:0;
		}
		h2{
			text-transform: uppercase;
			font-weight: bold;
		}
		h2.success, h2.error {
			text-transform: uppercase;
			font-weight: bold;
			font-size:26px;
		}
		header{
			background:#337ab7;
			color:#fff;
			text-align:center;
			padding:35px 0;			
		}
		footer{
			background:#337ab7;
			color:#fff;
			text-align:center;
			padding:10px 0;
		}
		footer p {
			margin-bottom:0;
		}
		.search,.insert{
			padding:5px 0;
		}
		input.search{
			border:1px solid #ddd;
			padding:5px;
		}
		.insert-area{
			overflow:hidden;
			text-align:center;
			padding:50px 0;
		}
		.success {
			text-transform: uppercase;
			font-weight: bold;			
			color:green;
			padding:20px;
			margin:20px;
			font-size:20px;
		}
		.error {
			text-transform: uppercase;
			font-weight: bold;				
			color:red;
			padding:20px;
			margin:20px;
			font-size:20px;
		}
	</style>

</head>
<body>


    <div class="container-fluid">
		<div class="row">
			<div class="main-area col-md-10 col-md-offset-1">

				<header>
					<h2>Contact Book</h2>
				</header>