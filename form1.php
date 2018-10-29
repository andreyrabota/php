<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">

		<title>Form1</title>

	</head>

	<body>
<h2>Form</h2><br />
<form name="form1" action="" method="post">
<label>Name</label><br />
<input type="text" name="username"/><br />
<label>Password</label><br />
<input type="password" name="password"/><br />
<label>Email</label><br />
<input type="email" name="email"/><br />	
<label>Phone</label><br />
<input type="number" name="phone"/><br /><br />
<input type="submit" name="accept"/><br />
</form>
		


<?php
	
	
	


if (isset($_POST["accept"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
}
$mysqli = new mysqli("127.0.0.1:3306", "root", "", "project1"); //connection to bd sozdaem object klassa mysqli kotoriy p
$mysqli->query ("SET NAMES 'utf-8'"); 
$mysqli->query ("INSERT INTO `form1` (`username`, `password`, `email`, `phone`) 
VALUES ('$username', '$password', '$email', '$phone')"); //otpravka formi v bazy
$res = $mysqli->query("SELECT * FROM form1"); //
$mysqli->close();  //zakritie soedinenia s bd
$result = $res->fetch_assoc();
?>


<table cellpadding="5" border="1">
<tr>
<th>Username</th><th>Password</th><th>Email</th><th>Phone</th>
</tr>
<tr>
<td><?php echo $result["username"];?></td><td><?php echo $result["password"];?></td><td><?php echo $result["email"];?></td><td><?php echo $result["phone"];?></td>
<td><input type="submit" name="delete" value="delete"/></td><td><input type="submit" name="modify" value="modify"/></td>
</table>
	</body>

</html>
