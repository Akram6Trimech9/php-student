<?php
require 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM courses WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header('Location: cours.php');
        exit();
    } else {
        echo "Error deleting student: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
