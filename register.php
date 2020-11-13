<?php
session_start();

include('function.php');
?>
<?php
$status_error = 0;
if (sizeof($_POST) > 0) {
    $data = $_POST;
    $status_error = 0;
    if ($data['form'] == 'register') {
        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $password = hash('md5', $password);

        $result = array();
        $result[0] = confetch("SELECT * FROM user WHERE username = '$username';");
        if (!$result[0][0] || !isset($username)) {
            if ($data['password'] != '') {
                if ($data['password'] == $data['Conpassword']){
                    $sql = "INSERT INTO
                    user (username, password, role)
                    VALUES
                    ('$username', '$password', 'member')";
                    $con = con();
                    mysqli_query($con, $sql);
                    $_SESSION["login_status"] = 0;
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['register_status'] = 1;
                    header('Location: login.php');
                } else {
                $status_error = 4; // pass != con pass
            }
        } else {
            $status_error = 3; // Empty Password
        }
    } else {
        $status_error = 1; // Username is already or Empty
    }

    if ($data['form'] == 'login') {
        echo "string";
        header('Location: login.php');
    }
}

}
?>
<form method="POST">
  <h2>REGISTER PAGE</h2>
  <p>
    Username
    <input type="text" name="username" placeholder="Username" required="" autofocus="" />
</p>
<p>
    Password
    <input type="password" name="password" placeholder="Password" required=""/>
</p>
<p>
    Confirm Password
    <input type="password" name="Conpassword" placeholder="Password confirm" required=""/>
</p>
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
<button type="submit" value="register" name="form">SUBMIT</button>
</form>
<form method="POST">
  <button type="submit" name="form" value="login">Login</button>
</form>
