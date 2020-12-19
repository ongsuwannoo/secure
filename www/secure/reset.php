<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);

$page = "login";
include('function.php');
$con = con();

if ($_SESSION['role_register'] == 999) {
  echo "FLAG{1804956abd21cd701c0e7931d7ebf5df}";
}
?>

<?php
if (sizeof($_POST) > 0) {
  $data = $_POST;
  if ($data['form'] == 'send') {
    $inputEmail = $data['email'];
    $email = confetch("SELECT email FROM user_email WHERE email = '".$inputEmail."';")[0]['email'];
    $userId = confetch("SELECT userId FROM user_email WHERE email = '".$inputEmail."';")[0]['userId'];
    $code = generateRandomString(5);
    $string = $code.'</a></td></tr></table></td></tr></table></td></tr><!-- end button --></table></td></tr><!-- end copy block --></table><!-- end body --></body></html>';
    if ($email){

      $mail->isHTML(true);
      $mail->setFrom('secureuser@ongsuwannoo.com');
      $mail->addAddress($email);
      $mail->Subject = 'Reset Your Password';
      $mail->Body = file_get_contents('formSendEmail.php').$string;
      $mail->IsSMTP();
      $mail->SMTPSecure = 'ssl';
      $mail->Host = 'ssl://smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Port = 465;

      //Set your existing gmail address as user name
      $mail->Username = $CONFIG['email_username'];

      //Set the password of your gmail address here
      $mail->Password = $CONFIG['email_password'];
      if(!$mail->send()) {
        alert('Email is not sent.');
        echo 'Email error: ' . pre($mail->ErrorInfo);
      } else {
        $sql = "INSERT INTO user_forgetpass (email, code) VALUES ('$email', '$code')";
        mysqli_query($con, $sql);

        $_SESSION['stateResetPass'] = 1;
        $_SESSION['userId'] = $userId;
        $_SESSION['email'] = $email;
        alert('Email has been sent.');
      }
    }
  } elseif ($data['form'] == 'enter') {
    $inputCode = $data['code'];
    $code = confetch("SELECT code FROM user_forgetpass WHERE email = '".$_SESSION['email']."';");
    $code = $code[count($code)-1]['code'];
    if ($inputCode == $code){
      $_SESSION['stateResetPass'] = 2;
      alert('Code is correct.');
    }
    else {
      alert('Code is incorrect.');
    }
  } elseif ($data['form'] == 'confirm') {
    $inputPassword = $data['password'];
    $inputConfirmPassword = $data['ConfirmPassword'];

    if ($inputPassword == $inputConfirmPassword) {
      $password = hash('md5', $inputPassword);
      $sql = "UPDATE user SET `password` = '".$password."' WHERE id = ".$_SESSION['userId'].";";
      // echo $sql.' pass not hash'.$inputPassword;
      mysqli_query($con, $sql);
      $_SESSION['stateResetPass'] = 0;
      alert('Reset password success !!.');
      header('Location: login.php');
    } else {
      alert('Password not match.');
    }
  }
}
?>

<html>

<head>
  <? include('head.html') ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
  <? if ($_SESSION['stateResetPass'] == 0){ ?>
   <!-- ส่วนของข้อความอธิบาย -->
   <div class="container padding-bottom-3x mb-2 mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="forgot">
          <h2>ลืมรหัสผ่าน ? </h2>
          <p>ท่านจำเป็นต้องเปลี่ยน Password เป็น Password ใหม่ โดยเราจะทำการส่งโค้ดสำหรับใช้เปลี่ยน Password ไปยัง Email ของท่าน</p>
        </div>
        <form method="POST" class="card mt-4" >
          <div class="card-body">
            <div class="form-group"> <label for="email-for-pass">ใส่ Email ของคุณ</label> <input class="form-control" type="email" id="email-for-pass" required="" name="email" placeholder="xxx@gmail.com"><small class="form-text text-muted">เราจะทำการส่งโค้ดสำหรับการเปลี่ยนรหัสผ่านไปยัง Email ที่ท่านกรอก</small></div>
          </div>
          <div class="card-footer"><button class="btn btn-success" name="form" type="submit" value="send">Send</button></div>
        </form>
        <div class="row">
          <div class="col-8"></div>
          <div class="col-4"><a class="ml-5" href="login.php">กลับไปยังหน้าล๊อกอิน</a></div>
        </div>
      </div>
    </div>
  </div>
  <!-- ส่วนของฟอร์ม -->
<? } elseif ($_SESSION['stateResetPass'] == 1) {?>
  <form method="POST" class="mb-0">
    <div style="height: 2vw;"></div>
    <div class="container d-flex justify-content-center align-middle">
      <label style="font-size: 2em;"><b>Your Email : </b><? echo $_SESSION['email'];?></label>
      <div style="height: 4vw;"></div>
    </div>
    <div id="login_form" class="container d-flex justify-content-center align-middle align-items-center">
      <div class="form-group mx-sm-3 mb-0">
        <b style="font-size: 1.5em; margin-right: 0px">Enter Code</b>
      </div>
      <div class="form-group mx-sm-3 mb-0">
        <input type="text" class="form-control" name="code" placeholder="Code">
      </div>
      <button type="submit" class="btn btn-primary" name="form" value="enter">Enter</button>
    </div>
  </form>
<? } elseif ($_SESSION['stateResetPass'] == 2) { ?>
  <form method="POST" class="mb-0">
    <div style="height: 2vw;"></div>
    <div class="container d-flex justify-content-center">
      <b style="font-size: 2em;">New Password</b>
    </div>
      <div style="height: 1vw;"></div>
    <div id="login_form" class="container d-flex justify-content-center align-middle">
      <div class="mr-3">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="mr-3">
        <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password">
      </div>
      <button type="submit" class="btn btn-primary" name="form" value="confirm">Send</button>
    </div>
  </form>
<? } ?>
</div>
</body>
</html>
<?
if ($_SESSION['stateResetPass'] == 2){
  // $_SESSION['stateResetPass'] = 0;
}
?>
