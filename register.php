<?php
session_start();

include('function.php');
?>
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<?php
$status_error = 0;
if (sizeof($_POST) > 0) {
    $data = $_POST;
    $status_error = 0;
    if ($data['form'] == 'login') {
        header('Location: login.php');
    }
    if ($data['form'] == 'register') {
        $username = $data['username'];
        $password = $data['password'];
        $role = $data['role'];
        $password = hash('md5', $password);

        $result = array();
        $result[0] = confetch("SELECT * FROM user WHERE username = '$username';");
        if (!$result[0][0] || !isset($username)) {
            if ($data['password'] != '') {
                if ($data['password'] == $data['Conpassword']){
                    $sql = "INSERT INTO
                    user (username, password, role)
                    VALUES
                    ('$username', '$password', $role)";
                    $con = con();
                    mysqli_query($con, $sql);
                    $_SESSION["login_status"] = 0;
                    $_SESSION['username'] = $username;
                    $_SESSION['register_status'] = 1;
                    $_SESSION['role_register'] = $role;
                    // header('Location: login.php');
                } else {
                    $status_error = 4; // pass != con pass
                }
            } else {
                $status_error = 3; // Empty Password
            }
        } else {
            $status_error = 1; // Username is already or Empty
        }
    }
}
?>
<form>
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
<button type="button" value="register" name="form" onclick="register()">SUBMIT</button>
</form>

<form method="POST">
  <button type="submit" name="form" value="login">Login Page</button>
</form>

<script type="text/javascript">
    function register() {
        $.post("register.php",{
            "form": "register",
            "username": $("input[name='username']").val(),
            "password": $("input[name='password']").val(),
            "Conpassword": $("input[name='Conpassword']").val(),
            "role": 0
        },
        function(data, status){
            if (status == 'success'){
                window.location.href = "login.php";
            }
        });
    }
</script>
