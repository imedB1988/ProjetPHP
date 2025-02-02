<?php
require('../../connexion/db.php');
    $nomCategorie =$_REQUEST['nomCategorie'];
    $ins_query="insert into categorie (`nomCategorie`)values     ('$nomCategorie')";
    mysqli_query($conn,$ins_query)
    or die(mysqli_error($conn));
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";

?>
