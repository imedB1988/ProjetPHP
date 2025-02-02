<?php
require('../../connexion/db.php');
    $id =$_REQUEST['id'];
    $nomfour =$_REQUEST['nomFour'];
    $telephone =$_REQUEST['telephone'];
    $adresse =$_REQUEST['adresse'];
    $ins_query="insert into fournisseurs (`id`,`nomFour`,`telephone`,`adresse`)values('$id','$nomfour','$telephone','$adresse')";
    mysqli_query($conn,$ins_query)
    or die(mysqli_error($conn));
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";

?>
