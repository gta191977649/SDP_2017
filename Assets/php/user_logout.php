<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    unset($_SESSION["login_user"]);
    unset($_SESSION["login_name"]);
    header('Refresh: 3; URL = ../../home.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Logout...</title>
    <link href="../bootstrapThemed.min.css" rel="stylesheet">
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary" style="margin-top:50px;">
          <div class="panel-heading">
            <h3 class="panel-title">System</h3>
          </div>
          <div class="panel-body">
            You have log out </br> (You will be redirect to home in 3 sec)

          </div>
        </div>
      </div>
  </div>
  </div>
  </body>

</html>
