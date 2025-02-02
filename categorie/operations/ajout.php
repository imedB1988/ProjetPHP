<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Records</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action="insert.php"> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="nomCategorie" placeholder="Enter Name" required /></p>

<p><input name="submit" type="submit" value="Submit" /></p>
</form>

</div>
</div>
</body>
</html>