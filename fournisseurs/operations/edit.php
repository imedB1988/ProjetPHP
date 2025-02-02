<?php
require('../../connexion/db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from fournisseurs where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>

<div>
<form name="form" method="post" action="edition.php"> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="nomFour" placeholder="Enter Name" 
required value="<?php echo $row['nomFour'];?>" /></p>
<p><input type="text" name="telephone" placeholder="Enter telephone" value="<?php echo $row['telephone'];?>" required /></p>
<p><input type="text" name="adresse" placeholder="Enter adresse" required value="<?php echo $row['adresse'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>

</div>
</div>
</body>
</html>