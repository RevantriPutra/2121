<?php
session_start();

if( isset($_SESSION['login']) ) {
  header("location: index1.php");
  exit;
}


  if ( isset($_POST["login"])) {
    if( $_POST["username"] == "admin" && $_POST["password"] == "admin" ) {
      
      echo "<script>
              alert('Anda Berhasil login!');
            </script>";
      // set session
      $_SESSION["login"] = true;
    
      header("Location: index1.php");   
      exit; 
            
    } else {

      echo "<script>
              alert('Gagal login cek username dan password apakah sudah benar?');
              document.location.href = 'login.php';
            </script>";
    }
  }

?>

<!doctype html>
<html lang="en">
  <head>
        <style>
        body
        {
            background-image: url(images/gambar2.png);
            background-repeat: no-repeat;

            background-size: cover;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

     <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
    
 
    <title>SPK-SAW</title>
  </head>
  <body>

<div class="row justify-content-center mt-5">
<div class="card text-warning  mb-3 mt-5" style="width: 30rem;">
  <div class="card-header text-center bg-info">
   <h2 class="text-light"><i class="fas fa-user-lock "></i></h2>
  </div>
  <div class="card-body text-info bg-light ">
        <form action="" method="post">
        <div class="form-group">
        <h5 class="card-title mt-5">Username</h5>
            <input  type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username" autocomplete="off" autofocus>
        <div class="form-group">
        <h5 class="card-title mt-3">Password</h5>
            <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Password"name="password">
        </div>

        <div class="mt-5">
        <button type="submit" class="btn btn-info" name="login">Login <i class="fas fa-sign-in-alt"></i></button>
        <a class="btn btn-outline-warning ml-3" href="index.php">Beranda</a>
        </div>

        </form>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</div>

    </body>
</html>


