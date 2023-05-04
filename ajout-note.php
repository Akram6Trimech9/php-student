<?php
require 'db_connect.php';

if(isset($_POST['save'])) {
    $cours_id = $_POST['cours_id'];
    foreach($_POST['notes'] as $id => $note) {
        $sql = "INSERT INTO notes (cours_id, user_id, note) VALUES ('$cours_id', '$id', '$note') ON DUPLICATE KEY UPDATE note='$note'";
        $conn->query($sql);
    }
    header("Location: notes-cours.php?id=$cours_id");
    exit;
}
 
if(isset($_GET['id'])) {
    $cours_id = $_GET['id'];
} else {
    $cours_id = "";
}


$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if(isset($_GET['id'])) {
    $cours_id = $_GET['id'];
} else {
    $cours_id = "";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter notes pour le cours</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Ajouter notes pour le cours</h1>

    <form method="post">
        <input type="hidden" name="cours_id" value="<?php echo $cours_id; ?>">

        <table>
            <thead>
                <tr>
                    <th>ID étudiant</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["prenom"] . "</td><td>" . $row["nom"] . "</td><td><input type='text' name='notes[" . $row["id"] . "]' value='" . $row["note"] . "'></td></tr>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </tbody>
        </table>

        <button type="submit" name="save">Enregistrer les notes</button>
    </form>
</body>
</html>
