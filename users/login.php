<?php
require('../connexion/db.php');
$error='';
session_start();
if (isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from user where username='".$username."' and password='".$password."'";
    $res = mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    
    if($count>0)
    {
            $row=mysqli_fetch_assoc($res);
            $_SESSION['ROLE']=$row->role;
            $_SESSION['IS_LOGGEDIN']='yes';

            if($row['role']=='admin'){
            
                $query="INSERT INTO permissions (role, can_edit, can_delete, can_view) VALUES ('admin', 1, 1, 1)";
                if (mysqli_query($conn, $query)) {
                  header('location:dashboard.php');
                } else {
                  echo "Error: " . mysqli_error($conn);
              }
                die();
            }
            else
            {
              $query="INSERT INTO permissions (role, can_edit, can_delete, can_view) VALUES ('user', 1, 0, 1)";
              if (mysqli_query($conn, $query)) {
                header('location:userdashboard.php');
              } else {
                echo "Error: " . mysqli_error($conn);
            }
              die();
            }

         

    }
    else
    {
        $error="erreur de connexion, veuillez vous en enregistrer en cliquant sur le lien : <a href='register.php'>S'inscrire</a>";
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
      <p class="login-box-msg">Veuillez vous connecter avec le nom d'utilisateur et le mot de passe</p>

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
<p><input name="submit" type="submit"  class="btn btn-primary btn-block" value="Connexion" /></p>
</div>
<p><?php echo $error; ?></p>

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