<?php
 $cours_name=$_POST['cours_name'];
 $responsable=$_POST['responsable'];
  
   require 'db_connect.php';
 $requete="INSERT INTO courses(cours_name,responsable) VALUES('$cours_name','$responsable')";  
 $query=mysqli_query($conn , $requete);
 
 if(isset($query)){
    header('Location: cours.php');
}else{ 
     echo "<h1> Erreur D'insertion </h1>";
 }
 
?>
