<?php
include "../connexion/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the first user should be an admin
    $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM user");
    $row = mysqli_fetch_assoc($result);
    $userCount = $row['count'];

    if ($userCount == 0) {
        $role = 'admin'; // First registered user is an admin
    } else {
        $role = 'user'; // All others are users by default
    }

    $sql = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')";

    if (mysqli_query($conn, $sql)) {
        header('location:login.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Authentification</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Veuillez vous inscrire en insérant le nom d'utilisateur et le mot de passe</p>

<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Mot de Passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-6">
        <p><input name="submit" type="submit"  class="btn btn-danger btn-block" value="Annuler" /></p>
          </div>
        <div class="col-6">
<p><input name="submit" type="submit"  class="btn btn-success btn-block" value="S'Inscrire" /></p>
</div>


</form>

</div>
</div>

<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/dist/js/adminlte.min.js"></script>
</body>
</html>