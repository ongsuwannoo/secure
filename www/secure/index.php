<?php
session_start();
if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] == 0) {
	header('location: login.php');
}
include('function.php');

if (sizeof($_POST) > 0) {
	$data = $_POST;
	if ($data['form'] == 'search') {
		$_SESSION['wordSearch'] = $data['search'];
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<? include('head.html') ?>
</head>

<body>
	<div id="menu_bar" class="container">
		<div class="row">
			<div class="col-1 text-muted">Kaidee</div>
			<div class="col-1.5 text-muted">Kaidee Auto</div>
			<div class="col-2 text-muted">Kaidee Property</div>
			<div id="text_help" class="text-muted">ช่วยเหลือ<b class="ml-3">
				<? if ($_SESSION['login_status']) { ?>
					<a href="logout.php" style="color: red">Logout</a></b>
				<? } ?>
			</div>
		</div>
		<div class="row" id="login_bar">
			<div class="col-1.5">
				<img alt="logo" src="https://ast.kaidee.com/blackpearl/_static/images/shared/logos/kaidee.svg" />
			</div>
			<div class="col-1">
				<span class="f-size-1-2">บทความ</span>
			</div>
			<div class="col-5">
			</div>
			<div class="col-0.5">
				<img alt="logo"
				src="https://ast.kaidee.com/blackpearl/_static/images/shared/icon/favourite-outline-32x32-p100.svg" />
			</div>
			<div class="col-0.5">
				<img alt="logo"
				src="https://ast.kaidee.com/blackpearl/_static/images/shared/icon/kaidee-outlined-chat-28x28.svg" />
			</div>
			<div class="col-2.5">
				<?
				if ($_SESSION['username']) {?>
					<p class="f-size-1-2 text-success" id="username"></p>

				<? }else{ ?>
					<a class="f-size-1-2 btn" href="login.php">เข้าสู่ระบบ / สมัครสมาชิก</a>
				<? } ?>
			</div>
			<div class="col-2.5 text-danger">
				<?
				if ($_SESSION['role'] || $_SESSION['role'] == 0) {?>
					<p class="f-size-1-2" id="role"></p>

				<? }else{ ?>
					<p class="f-size-1-2">not found</p>
				<? } ?>
			</div>
			<div class="col-1.5">
				<button type="button" class="btn btn-primary f-size-1-2" onclick="document.location.href = 'form.php'">ลงขาย</button>
			</div>
		</div>
	</div>

	<div class="row-search">	
		<form method="post">
			<div class="row">
				<div class="col-3"></div>
				<div class="col-4 mtb-1-5">
					<input class="form-control" type="text" placeholder="Search" name="search" value="<? echo $_SESSION['wordSearch']; ?>" >
				</div>
				<div class="col-1 mtb-1-5">
					<button class="btn btn-dark" type="submit" name="form" value="search">Search</button>
				</div>
				<div class="col-3"></div>
			</div>
		</form>
	</div>
	<br>
	<div class="row text-center">
		<div class="col-1"></div>
		<div class="col-10">
			<?
			$sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."';";
			$result = confetch($sql);
			$_SESSION['uid'] = $result[0]['id'];
			$_SESSION['role'] = $result[0]['role'];
			?>

		<div class="justify-content-between">
			<?php
			$sql = "SELECT * FROM product;";
			// if (sizeof($_POST) > 0) {
			// 	$data = $_POST;
			if ($_SESSION['wordSearch']) {
				$sql = "SELECT * FROM product WHERE name LIKE '%".$_SESSION['wordSearch']."%';";
			}
			// }
			echo '<div hidden>'.$sql.'</div>';
			$result = conmultifetch($sql);
			$i = 0;
			$c_switch = 1;
			foreach ($result as &$value) {
				if (($i%2 == 0)) { ?>
					<div class="row mb-2">
						<!-- tag เปิด -->
					<? } ?>
					<div class="col-5 card d-flex flex-row px-0" id="<? echo $value[0]; ?>">
						<img class="cropped1" src="<?  echo $value[4]; ?>" alt="...">
						<div class="">
							<div class="card-body">
								<h5 class="card-title"><? echo $value[1]; ?></h5>
								<p class="text-left">จำนวน <? echo $value[3]; ?></p>
								<div class="text-left" style="color:rgb(13, 28, 99);">
									<p class="h2 mt-2"> <b><? echo $value[2]; ?></b> ฿</p>
								</div>
<!-- 							<div class=" d-flex flex-row justify-content-between">
								<a href="# " class="btn btn-outline-secondary" style="height: 3rem; width:9rem">แชท</a>
								<a href=" # " class="btn btn-primary " style="height: 3rem; width:9rem">โทร</a>
							</div> -->
						</div>
					</div>
				</div>
				<?
				if ($c_switch == 1) { ?>
					<div class="col-1"></div> 
				<? } $c_switch *= -1 ?>

				<?
				if (($i+1)%2 == 0) { ?>
				</div>
			<? }
					// echo "<td>".$value[$i]."</td>";
			$i++;

		}
		if (($i+1)%2 != 0) { ?>
		</div>
	<? }
	?>
</div>
</div>
</body>
</html>
<?
if ($_SESSION['role'] == 999 && $_SESSION['username'] == 'admin') {
	echo "ข้อ 2: FLAG{486a9bbc2c582b30c8899b6f20a7e59e}";
}

if ($_SESSION['role'] == 999 && $_SESSION['username'] != 'admin') {
	echo "ข้อ 1: FLAG{1804956abd21cd701c0e7931d7ebf5df}";

	// $username = 'admin';
	// $password = hash('md5', '1804956abd21cd701c0e7931d7ebf5df');
	// $email = 'admin@admin.com';
	// $role = 999;
	// $result = array();
	// $con = con();
	// $result[0] = confetch("SELECT * FROM user WHERE username = '$username';");
	// if (!$result[0][0] || !isset($username)) {
	// 	$sql = "INSERT INTO
	// 	user (username, password, role)
	// 	VALUES
	// 	('$username', '$password', $role)";
	// 	mysqli_query($con, $sql);
	// } else {
	// 	$status_error = 1; // Username is already or Empty
	// }

	// $sql = "SELECT * FROM user WHERE username = '$username';";
	// $result[0] = confetch($sql);

	// $sql = "INSERT INTO
	// user_email (userId, email)
	// VALUES
	// (".$result[0][0]['id'].", 'admin@admin.com')";
	// mysqli_query($con, $sql);
}
?>
<script>
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
			$("#username").html(myObj.username);
			$("#role").html(myObj.role == 0 ? 'member' : myObj.role == 999 ? 'admin' : myObj.role);
		}
	};
	xmlhttp.open("GET", "indexJson.php", true);
	xmlhttp.send(); 
</script>
<style>
	td {
		padding: 10px ;
	}
	#box {
		height: 100px;
		width: 100px;
		background-color: red;
	}
</style>
