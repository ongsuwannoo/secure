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

<form method="POST">
  <h2 >Login</h2>
  <p>
    Username
    <input type="text" name="username" placeholder="Username" value="<? $_SESSION['username'] ?>" required>
  </p>
  <p>
    Password
    <sp class="s"></sp>
    <input type="password" name="password" placeholder="Password" required>
  </p>
  <button type="submit" name="form" value="login">Login</button>
</form>

<form method="POST">
  <button type="submit" name="form" value="register">Register</button>
</form>


<h2 style="color: red"><?php
if ($status_error == 1) {
 echo "Access denied";
}
?></h2>
