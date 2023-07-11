<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login- SIA 2021</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body class="text-center " style="background : url(https://images.unsplash.com/photo-1533750446969-255bbf191920?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1000&q=80); background-repeat: no-repeat; background-size: cover;">
  <div class="container" style="margin-top: 200px;">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-5">
        <div class="card shadow-lg" style="margin-top: auto;">
          <div class="card-header mb-0 p-3">
            <h5 class="text-center">Please <span class="font-weight-bold text-primary">LOGIN</span></h5>
          </div>
          <div class="card-body">
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-signin mt-2">
              <div class="form-group p-1" style="margin-bottom: 10px; margin-top: 20px;">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
              </div>
              <div class="form-group p-1" style="margin-bottom: 10px;  margin-top: 20px;">
                <input type="text" name="password" class="form-control" placeholder="Password" required autofocus>
              </div>
              <div class="form-group" style="margin-top: 20px;">
                <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php


  // mengaktifkan session php


  include_once('lib/db_login.php');


  if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query1 = mysqli_query($db, "select * from user where username='$username' and password='$password'");
    $query = "SELECT * FROM user WHERE username ='$username' AND password='$password'";
    $result = $db->query($query);
    $row1 = mysqli_num_rows($query1);
    $row = $result->fetch_object();

    if ($row1 > 0) {
      session_start(); // Inisialisasi session
      $data2 = $result->fetch_assoc();
      $data = mysqli_fetch_assoc($query1);
     

      if ($username == "adminFix") {
        // buat session login manajer

        $_SESSION['username'] = $username;
        $_SESSION['status'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:index_dash.php");

        // cek jika user login cs


      } else {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "pegawai";
        // alihkan ke halaman dashboard admin
        // alihkan ke halaman dashboard pegawai
        header("location:index_biasa.php");
      }
    } else {
      echo "<script>alert('Maaf belum benar username / password');</script>";
    }
  }


  ?>
</body>

</html>