<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid black;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		.btn {
			padding: 5px 10px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		.btn:hover {
			background-color: #3e8e41;
		}
		.edit-btn {
			background-color: #2196F3;
		}
		.edit-btn:hover {
			background-color: #0b7dda;
		}
		.delete-btn {
			background-color: #f44336;
		}
		.delete-btn:hover {
			background-color: #da190b;
		}
	</style>
</head>
<body>
	<h1 ><a href="index.php"> Acceuil</a></h1>

	<form method="POST" action="add-student.php">
		<label>ID:</label>
		<input type="text" name="id"><br>

		<label>Prénom:</label>
		<input type="text" name="prenom"><br>

		<label>Nom:</label>
		<input type="text" name="nom"><br>

		<label>Email:</label>
		<input type="text" name="email"><br>

 

		<input type="submit" name="add" value="Add">
	</form>

	<br>

	<table>
		<tr>
			<th>ID</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Email</th>
 			<th>Action</th>
		</tr>
		<?php
             require 'db_connect.php';

             $query = "SELECT * FROM student ORDER BY id";

			$result = mysqli_query($conn, $query);

 				while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['prenom']."</td>";
			echo "<td>".$row['nom']."</td>";
			echo "<td>".$row['email']."</td>";
 			echo "<td>";
            echo "<a href='edit-student.php?id=".$row['id']."' class='btn edit-btn'>Edit</a>";
            echo "<a href='delete-student.php?id=".$row['id']."' class='btn delete-btn' '>Delete</a>";
			echo "</td>";
			echo "</tr>";
		}

 			mysqli_close($db);
		?>
	</table>
</body>
</html>
