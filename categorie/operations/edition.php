<?php
require('../../connexion/db.php');

$id=$_REQUEST['id'];
$nomCategorie =$_REQUEST['nomCategorie'];

$update="update categorie set nomCategorie='".$nomCategorie."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error($conn));
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';

?>