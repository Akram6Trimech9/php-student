<?php
 
require 'db_connect.php';

if(isset($_GET['id'])) {
    $cours_id = $_GET['id'];
    
    $sql_notes = "SELECT * FROM notes WHERE cours_id = '$cours_id'";
    $result_notes = $conn->query($sql_notes);

    $notes = array();
    while($row_notes = $result_notes->fetch_assoc()) {
        $notes[$row_notes["user_id"]] = $row_notes["note"];
    }

    $sql_students = "SELECT * FROM student WHERE id IN (SELECT user_id FROM notes WHERE cours_id = '$cours_id')";
    $result_students = $conn->query($sql_students);
} else {
    $note = "Invalid id.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Notes du cours cours3</title>
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
	<h1>Notes du cours cours3</h1> <br>
	<h3><a href="ajout-note.php?id=<?php echo $cours_id; ?>">Attribuer notes pour ce cours</a></h3>
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
			// Display students and their respective notes
			if ($result_students->num_rows > 0) {
			    while($row_students = $result_students->fetch_assoc()) {
			        $id = $row_students["id"];
			        $prenom = $row_students["prenom"];
			        $nom = $row_students["nom"];
			        $note = isset($notes[$id]) ? $notes[$id] : "";
			        echo "<tr><td>" . $id . "</td><td>" . $prenom . "</td><td>" . $nom . "</td><td>" . $note . "</td></tr>";
			    }
			} else {
			    echo "0 results";
			}
			?>
		</tbody>
	</table>
</body>
</html>
