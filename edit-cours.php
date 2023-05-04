<?php
require 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM courses WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $cours_name = $row['cours_name'];
        $responsable = $row['responsable'];
     } else {
        echo "Error: course not found.";
        exit();
    }
}

if (isset($_POST['update'])) {
    $cours_name = $_POST['cours_name'];
    $responsable = $_POST['responsable'];
 
    $query = "UPDATE courses SET cours_name='$cours_name', responsable='$responsable' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header('Location: cours.php');
        exit();
    } else {
        echo "Error updating course: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
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
    <h1>Edit Course</h1>
    <form method="POST" action="">
        <label>ID:</label>
        <input type="text" name="id" value="<?php echo $id ?>" readonly><br>

        <label>Course Name:</label>
        <input type="text" name="cours_name" value="<?php echo $cours_name ?>"><br>

        <label>Responsable:</label>
        <input type="text" name="responsable" value="<?php echo $responsable ?>"><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
