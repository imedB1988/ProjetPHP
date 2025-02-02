<?php
require('../../connexion/db.php');

$id =$_REQUEST['id'];
$nomfour =$_REQUEST['nomFour'];
$telephone =$_REQUEST['telephone'];
$adresse =$_REQUEST['adresse'];

$update="update fournisseurs set nomFour='".$nomfour."', telephone='".$telephone."', adresse='".$adresse."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error($conn));
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';

?>