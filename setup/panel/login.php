<?php 
session_start();
require '../function.php';
//cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];
  
  //ambil username berdasarkan nama
  $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  
  //cek cookie dan username
  if ( $key === hash('sha256', $row['username']) ) {
    $_SESSION['login'] = true;
  }
  
  
}

// INISIALISASI VARIABEL AWAL FALSE
$error = false;
$tdk_valid = false;
$validasi_kosong = false;
$valid_pass_kosong = false;

if ( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}

if ( isset($_POST["login"]) ) {

  // INISALISASI NILAI VARIABEL SETELAH KONDISI LOGIN
  if ( empty($_POST["username"]) && empty($_POST["password"]) ) {
    $validasi_kosong = true;
  } elseif ( empty($_POST["password"]) ) {
    $valid_pass_kosong = true;
  }
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	if ( mysqli_num_rows($result) === 1 ) {

		//cek password
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

      if ( isset($_POST["remember"]) ) {
        //buat cookie
         
         setcookie('id', $row['id'], time()+30);
         setcookie('key', hash('sha256', $row['username']), time()+30);
      }

      $_SESSION["username"] = $username;
      
			header("Location: index.php");
			exit;
		} else {
      // INISIALISASI NILAI VARIABEL SETELAH KONDISI SEETELAH VALIDASI LOGIN BERHASIL
      $tdk_valid = true;
    }
	}
  if ($tdk_valid || $validasi_kosong || $valid_pass_kosong) {
    $error = false;
    if ($valid_pass_kosong) {
      $tdk_valid = false;
    }
  } else {
	  $error = true;
  }
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
  <link href="img/logo/lego.png" rel="icon">
  <title>ADMINISTRATOR - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login d-block">
  <?php if ($error) {
    echo "<div class='row justify-content-center mt-3'>
            <div class='col-5 border border-danger border-10 d-flex pt-2 d-flex justify-content-center align-items-center text-center' style='background-color: whitesmoke;'>
              <h6 class='text-danger'>Username dan Password tidak terdaftar!</h6>
            </div>
          </div>";
        } ?>
  <?php if ($valid_pass_kosong) {
    echo "<div class='row justify-content-center mt-3'>
            <div class='col-5 border border-danger border-10 d-flex pt-2 d-flex justify-content-center align-items-center text-center' style='background-color: whitesmoke;'>
              <h6 class='text-danger'>Password tidak boleh kosong!</h6>
            </div>
          </div>";
        } ?>
  <?php if ($tdk_valid) {
    echo "<div class='row justify-content-center mt-3'>
            <div class='col-5 border border-danger border-10 d-flex pt-2 d-flex justify-content-center align-items-center text-center' style='background-color: whitesmoke;'>
              <h6 class='text-danger'>Password tidak sesuai!</h6>
            </div>
          </div>";
        } ?>
  <?php if ($validasi_kosong) {
    echo "<div class='row justify-content-center mt-3'>
            <div class='col-5 border border-danger border-10 d-flex pt-2 d-flex justify-content-center align-items-center text-center' style='background-color: whitesmoke;'>
              <h6 class='text-danger'>Username dan Password tidak boleh kosong!</h6>
            </div>
          </div>";
        } ?>
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h2 text-gray-900 mb-5 font-weight-bold" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">LOGIN ADMINISTRATOR</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group mb-4">
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Username" name="username">
                    </div>
                    <div class="form-group mb-4">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Enter Password" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small d-flex justify-content-center align-items-center" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary btn-block" name="login">LOGIN</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>