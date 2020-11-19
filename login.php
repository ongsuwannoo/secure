<?php
session_start();

$page = "login";
include('function.php');
echo $_SESSION['username'];
echo $_SESSION['role_register'];
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
        header('Location: index.php');
      }
    } else {
      $status_error = 1;
    }
  }

  if ($data['form'] == 'register') {
    header('Location: register.php');
  }
}
?>
<html>

<head>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"/>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap"
          rel="stylesheet"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
              crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
          crossorigin="anonymous"></script>
    <title>Kaidee.com</title>
  </head>

<body>
      <div id="menu_bar" class="container">
      <div class="row">
        <div class="col-1 text-muted">Kaidee</div>
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
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<? $_SESSION['username'] ?>" required/>
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
          </form>
        </div>
    </div>
  </div>
  <h2 style="color: red">
<?php
if ($status_error == 1) {
 echo "Access denied";
}
?></h2>
</body>
</html>

