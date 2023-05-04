<!DOCTYPE html>
<html>
<head>
	<title>Cours</title>
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
        .notes-btn {
			background-color:  grey;
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

	<form method="POST" action="add-cours.php">
		<label>Cours:</label>
		<input type="text" name="cours_name"><br>

		<label>Responsable:</label>
		<input type="text" name="responsable"><br>

		<input type="submit" name="add" value="Add">
	</form>

	<br>

	<table>
		<tr>
			<th>ID</th>
			<th>Cours</th>
			<th>Responsable</th>
			<th>Action</th>
		</tr>
		<?php
               require 'db_connect.php';
 			$query = "SELECT * FROM courses";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['cours_name']."</td>";
				echo "<td>".$row['responsable']."</td>";
				echo "<td>";
				echo "<a href='edit-cours.php?id=".$row['id']."' class='btn edit-btn'>Edit</a>";                
                echo "<a href='delete-cours.php?id=".$row['id']."' class='btn delete-btn' '>Delete</a>";
                echo "<a href='notes-cours.php?id=".$row['id']."' class='btn notes-btn' '>notes</a>";
				echo "</td>";
				echo "</tr>";
			}

			mysqli_close($db);
		?>
	</table>
</body>
</html>
