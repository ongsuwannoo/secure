<?php
session_start();

include('function.php');

$con = con();
?>
<!DOCTYPE html>
<html>

<head>
    <? include('head.html') ?>
</head>

<body>
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
            if (!$data['role']) {
                $data['role'] = 0;
            }
            $role = $data['role'];
            $password = hash('md5', $password);
            $email = $data['email'];

            $result = array();
            $result[0] = confetch("SELECT * FROM user WHERE username = '$username';");
            if (!$result[0][0] || !isset($username)) {
                if ($data['password'] != '') {
                    if ($data['password'] == $data['Conpassword']) {
                        $sql = "INSERT INTO
                        user (username, password, role)
                        VALUES
                        ('$username', '$password', $role)";
                        mysqli_query($con, $sql);


                        $user = confetch("SELECT * FROM user WHERE username = '$username';")[0];
                        $userId = $user['id'];

                        $sql = "INSERT INTO
                        user_email (userId, email)
                        VALUES
                        ('$userId', '$email')";
                        mysqli_query($con, $sql);

                        $_SESSION["login_status"] = 0;
                        $_SESSION['username'] = $username;
                        $_SESSION['register_status'] = 1;
                        $_SESSION['role_register'] = $role;

                        header('Location: login.php');
                    } else {
                        // echo "pass != con pass";
                        $status_error = 4; // pass != con pass
                    }
                } else {
                    // echo "Empty Password";
                    $status_error = 3; // Empty Password
                }
            } else {
                // echo "Username is already or Empty";
                $status_error = 1; // Username is already or Empty
            }
        }
    }
    ?>
    <div id="menu_bar" class="container">
        <div class="row">
            <div class="col-1 text-muted text-blue-900">Kaidee</div>
            <div class="col-1.5 text-muted">Kaidee Auto</div>
            <div class="col-2 text-muted">Kaidee Property</div>
            <div id="text_help" class="text-muted">ช่วยเหลือ</div>
        </div>
    </div>
    <div style="height:5vw; width:100%"></div>
    <div class="container mx-auto">

        <form method="POST">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <h2 class="dark-grey">REGISTER PAGE</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="form-group col-6">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="" />
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="form-group col-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="form-group col-6">
                    <label>Confirm Password</label>
                    <input type="password" name="Conpassword" class="form-control" placeholder="Password confirm" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="form-group col-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="form-group col-6 text-danger">
                    <?php
                    if ($status_error == 1) {
                        echo "Username is already or Empty";
                    } elseif ($status_error == 2) {
                        echo "Email is already or Empty";
                    } elseif ($status_error == 3) {
                        echo "Empty Password";
                    } elseif ($status_error == 4) {
                        echo "Password not match";
                    }
                    ?>
                </div>
            </div>

            <!-- <button type="button" value="register" name="form" onclick="register()">SUBMIT</button> -->
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <button class="btn btn-primary btn-md btn-block" type="submit" value="register" name="form">SUBMIT</button>
        </form>
    </div>
    </div>
    <div class="row mt-3">
        <div class="col-7 mr-r-5"></div>
        <div class="col-2">
            <form method="POST">
                <a href="login.php"><label class="" style="cursor:pointer;">Login Page</label></a>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        function register() {
            $.post("register.php", {
                    "form": "register",
                    "username": $("input[name='username']").val(),
                    "password": $("input[name='password']").val(),
                    "Conpassword": $("input[name='Conpassword']").val(),
                    "role": 0
                },
                function(data, status) {
                    if (status == 'success') {
                        window.location.href = "login.php";
                    }
                });
        }
    </script>
</body>

</html>