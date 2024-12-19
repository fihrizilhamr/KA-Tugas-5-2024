<?php
// Include the database connection file
require_once("db_connect.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>User Management</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container">
	<h2>User Management</h2>
	<p>
		<a href="create.php">Add New Data</a>
	</p>
	<table width='80%' border=0>
		<tr bgcolor='#CDCDCD'>
			<td><strong>Name</strong></td>
			<td><strong>Age</strong></td>
			<td><strong>Email</strong></td>
			<td><strong>Username</strong></td>
			<td><strong>Password</strong></td>
			<td><strong>Action</strong></td>
		</tr>
		<?php
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['age']."</td>";
			echo "<td>".$res['email']."</td>";	
			echo "<td>".$res['username']."</td>";
			echo "<td>".$res['password']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
			<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>
	</div>
</body>
</html>
