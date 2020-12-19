<?php
session_start();

$page = "login";
include('function.php');
if ($_SESSION['role_register'] == 999) {
  echo "FLAG{1804956abd21cd701c0e7931d7ebf5df}";
}
?>
<?php
if (sizeof($_POST) > 0) {

  $data = $_POST;

  if ($data['form'] == 'login') {

    $username = $data['username'];
    $password = $data['password'];
    $_SESSION['username'] = $username;

    $sql = "SELECT * FROM user WHERE username = '$username';";

    $result = confetch($sql);
    $status_error = 0;
    if ($result[0]['password'] == hash('md5', $data['password'])) {
      $_SESSION['username'] = $data['username'];
      $_SESSION['uid'] = $result[0]['id'];
      $_SESSION['token'] = $result[0]['token'];
      $_SESSION['role'] = $result[0]['role'];
      $_SESSION['login_status'] = 1;

      if ($_GET['next'] != null && $_GET['next'] != '') {
        header('Location: ' . $_GET["next"]);
      } else {
        header('Location: home.php');
      }
    } else {
      $status_error = 1;
    }
  }

  if ($data['form'] == 'register') {
    header('Location: register.php');
  }
  if ($data['form'] == 'reset') {
    header('Location: reset.php');
  }
}
?>
<html>

<head>
  <title>Kaidee.com</title>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<style>
  body {
    font-family: 'Prompt', sans-serif;
  }

  .main-head {
    height: 150px;
    background: rgb(255, 255, 255);
  }

  .sidenav {
    height: 100%;
    background-color: #020a4d;
    overflow-x: hidden;
    /*padding-top: 20px;*/
  }

  .main {
    padding: 0px 10px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {
      /*padding-top: 15px;*/
    }
  }

  @media screen and (max-width: 450px) {
    .login-form {
      /*margin-top: 10%;*/
    }

    .register-form {
      /*margin-top: 10%;*/
    }
  }

  @media screen and (min-width: 768px) {
    .main {
      margin-left: 40%;
    }

    .sidenav {
      width: 40%;
      position: fixed;
      top: 0;
      left: 0;
    }

    .login-form {

      /*margin-top: 80%;*/
    }

    .register-form {
      /*margin-top: 20%;*/
    }
  }

  .login-main-text {
    /*margin-top: 20%;*/
    /*padding: 60px;*/
    color: #fff;
  }

  .login-main-text h2 {
    font-weight: 300;
  }

  .btn-black {
    background-color: #000 !important;
    color: #fff;
  }
</style>

<body>

  <!-- LOG IN PHASE -->

  <div class="main">
    <div class="container d-flex h-100" id="main">
      <div class="login-form row justify-content-center align-self-center">
        <div class="col">
          <form method="POST">
            <h4><b>เข้าสู่ระบบ / สมัครสมาชิก</b></h4><br>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="ใส่ Username ของคุณที่นี่" name="username" value="<? echo $_SESSION['username']; ?>" required />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="ใส่ Password ของคุณที่นี่" name="password" required />
            </div>
            <div class="row">
              <div class="col-sm">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="form" value="login">Login</button>
              </div>
          </form>
          <form method="POST">
            <div class="col-sm">
              <button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="form" value="register" required>Register</button>
            </div>
        </div>
        <div class="row">
          <div class="col">
            <p style="cursor:pointer;" onclick="document.location.href = 'reset.php'" style="width: max-content;">Forgot Password ?</p>
          </div>
        </div>
        </form>
        <div class="row">
          <h2 style="color: red">
            <?php
            if ($status_error == 1) {
              echo '<script type="text/javascript"> $( "#myModal" ).ready(() => {
                $("#myModal").modal("show");
              }); </script>';
            }
            ?></h2>
        </div>
      </div>
      </form>
    </div>
  </div>
  </div>

  <!-- NAV BAR -->

  <div class="sidenav container d-flex h-100">
    <div class="login-main-text row justify-content-center align-self-center">
      <img src="https://www.img.in.th/images/cf5d4abd7878d5ea1f1a43d75e5dfb5e.png" style="width: 30vw;">
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content text-danger">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Login Failed</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Password Incorrected</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>


<!------ Include the above in your HEAD tag ---------->

<!-- <div id="menu_bar" class="container">
    <div class="row">
      <div class="col-1 text-muted text-blue-900">Kaidee</div>
      <div class="col-1.5 text-muted">Kaidee Auto</div>
      <div class="col-2 text-muted">Kaidee Property</div>
      <div id="text_help" class="text-muted">ช่วยเหลือ</div>
    </div>
  </div>
  <div id="login_form" class="container d-flex justify-content-center align-middle">
    <form method="POST">
      <div class="form-group">
        <b class="">เข้าสู่ระบบ</b>
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value=">" required/>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" id="password" name="password" required/>
      </div>
      <div class="d-flex justify-content-space-between align-items-center">
        <button  type="submit" class="btn btn-primary mr-3" name="form" value="login">Login</button>
      </form>
      <form method="POST" class="mb-0">
        <button class="btn btn-dark" type="submit" name="form" value="register" required>Register</button>
        <button type="submit" class="btn btn-primary mr-3" name="form" value="reset" >Forget Password</button>
      </form>
    </div>
  </div>
  
</div> -->