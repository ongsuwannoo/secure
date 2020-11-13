<?php
session_start();

include('function.php');
?>
<head>
  <title>ADMIN-PAGE</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-rfs/bootstrap-rfs.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" href="../pic/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
    $status_error = 0;
    if (sizeof($_POST) > 0) {
        $data = $_POST;
        $status_error = 0;
        if ($data['form'] == 'email_register') {
          $email = $data['email'];
          $username = $data['username'];
          $password = $data['password'];
          $password = hash('md5', $password);
      }
      $result = array();
      $result[0] = confetch("SELECT * FROM user WHERE email = '$email';");
      $result[1] = confetch("SELECT * FROM user WHERE username = '$username';");
      if (!$result[0][0] || !isset($email)) {
          if (!$result[1][0] || !isset($username)) {
            if ($data['password'] != '') {
              if ($data['password'] == $data['Conpassword']){
                $sql = "INSERT INTO
                user (email,username,password)
                VALUES
                ('$email','$username', '$password')";
                $con = con();
                mysqli_query($con, $sql);
                $_SESSION["login_status"] = 0;
                $_SESSION['username'] = $data['username'];
                $_SESSION['register_status'] = 1;
                header('Location: ../');
            } else {
            $status_error = 4; // pass != con pass
        }
    } else {
          $status_error = 3; // Empty Password
      }
  } else {
        $status_error = 1; // Username is already or Empty
    }
} else {
      $status_error = 2; // Email is already or Empty
  }
}
?>
    <div class="wrapper text-center justify-content-center ">
        <form class="form-signin rounded" method="POST">
          <h2 class="form-signin-heading text-dark shadow-w eng">REGISTER PAGE</h2>
          <input type="text" class="form-control mb-2" name="username" placeholder="Username" required="" autofocus="" />
          <input type="password" class="form-control mb-2" name="password" placeholder="Password" required=""/>
          <input type="password" class="form-control mb-2" name="Conpassword" placeholder="Password confirm" required=""/>
          <input type="email" class="form-control" name="email" placeholder="Email" required=""/>
          <p class="text-danger">
            <?php
            if ($status_error == 1){
              echo "Username is already or Empty";
          } elseif ($status_error == 2) {
              echo "Email is already or Empty";
          } elseif ($status_error == 3) {
              echo "Empty Password";
          } elseif ($status_error == 4) {
              echo "Password not match";
          }
          ?>
        </p>
            <button class="btn btn-lg btn-primary btn-block eng" type="submit" value="email_register" name="form">SUBMIT</button>
        </form>
    </div>
</body>
