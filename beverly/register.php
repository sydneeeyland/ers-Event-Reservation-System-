<?php
include("codes.php");
if(isset($_SESSION['username']) == true)
{
  header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="assets/img/logo/logo.png" rel="icon">
  <title>Beverly Event Management</title>
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                  </div>
                  <form method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control" name="register_username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="register_password" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" name="register_email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="register_fullname" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="register_contact" placeholder="Enter your contact number" required>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block" name="register" value="REGISTER">
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script>
</body>

</html>
