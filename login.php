<?php
session_start();

$page = "login";
include('function.php');
?>

<?php
if (sizeof($_POST) > 0) {
  $data = $_POST;
  if ($data['form'] == 'login') {
    $username = $data['username'];
    $password = $data['password'];
    $sql = "SELECT * FROM user WHERE username = '$username';";
  }

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
  <button type="submit" name="form" value="login">login</button>
</form>

<h2 style="color: red"><?php
 if ($status_error == 1) {
   echo "Access denied";
 }
 ?></h2>
