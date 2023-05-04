<?php
 $id=$_POST['id'];
 $nom=$_POST['nom'];
 $prenom=$_POST['prenom'];
 $email=$_POST['email'];
 require 'db_connect.php';
 $requete="INSERT INTO `student`(`id`,`nom`,`prenom`,`email`) VALUES('$id','$nom','$prenom','$email')";  
 $query=mysqli_query($conn , $requete);
 
 if(isset($query)){
    header('Location: students.php');
}else{ 
     echo "<h1> Erreur D'insertion </h1>";
 }
 
?>