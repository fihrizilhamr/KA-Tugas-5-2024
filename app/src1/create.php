<html>
<head>
	<title>Create Data</title>
</head>

<body>
<div class="container">
	<h2>Create Data</h2>
	<p>
		<a href="index.php">Home</a>
		<link rel="stylesheet" href="style.css">
	</p>

	<form action="create_action.php" method="post" name="add">
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="age"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
			<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>

			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>

		</table>
	</form>
	</div>
</body>
</html>

