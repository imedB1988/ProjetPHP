<?php
require('../../connexion/db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM fournisseurs WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: ../index.php"); 
exit();
?>