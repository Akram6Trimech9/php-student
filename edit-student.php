<?php
require 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM student WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $prenom = $row['prenom'];
        $nom = $row['nom'];
        $email = $row['email'];
    } else {
        echo "Error: Student not found.";
        exit();
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $query = "UPDATE student SET prenom='$prenom', nom='$nom', email='$email' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header('Location: students.php');
        exit();
    } else {
        echo "Error updating student: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Student</title>
	<style>
		label {
			display: inline-block;
			width: 100px;
			margin-bottom: 10px;
		}
		input[type="text"] {
			padding: 5px;
			width: 200px;
			border-radius: 4px;
			border: 1px solid #ccc;
			margin-bottom: 10px;
		}
		input[type="submit"] {
			padding: 5px 10px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Edit Student</h1>
	<form method="POST" action="">
		<label>ID:</label>
		<input type="text" name="id" value="<?php echo $id ?>" readonly><br>

		<label>Prénom:</label>
		<input type="text" name="prenom" value="<?php echo $prenom ?>"><br>

		<label>Nom:</label>
		<input type="text" name="nom" value="<?php echo $nom ?>"><br>

		<label>Email:</label>
		<input type="text" name="email" value="<?php echo $email ?>"><br>

		<input type="submit" name="update" value="Update">
	</form>
</body>
</html>
