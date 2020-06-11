<!DOCTYPE html> 
<html> 

<head>
<title>homepage example</title>
<style type="text/css">
body {
    text-align: center;
    background-image:url("bg.jpg");
    background-size:100% 100%;
    background-repeat:no-repeat;
    background-attachment:fixed;
    }
</style>
<link rel="stylesheet" href="mdui.css">
</head>

<body>
	<h1>Homepage Example</h1>
	<?php 
	echo "Today is ".date("F d, Y");
	?>
	<br><br>
	<?php
    $lastmod = date("F d, Y h:i:sa", getlastmod());
	echo "Page last modified on $lastmod";	 ?>
		<form action="/search.php" method="get" >
		Multi search:<br><br>
		<input type="text" name="multi">
		<br>
		<div align="center">
		<div style="width: 30%">
		<div align="left" class='mdui-textfield mdui-textfield-floating-label'>
		<label class='mdui-textfield-label'>Paper Title</label>
		<input class='mdui-textfield-input' type="text" name="paper_title"></input>
		</div>
		</div>
		</div>
		Author Name:<br><br>
		<input type="string" name="Authorname">
		<br>
		Conference Name:<br><br>
		<input type="text" name="Conferencename">
		<br>
		<input type="submit" value="Submit">
	</form>
</body>

<script src="mdui.js"></script>
</html>


