<?php
session_start();
if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] == 0) {
	header('location: login.php');
}
include('function.php');
?>
<head>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<h2>Index</h2>
<?
$sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."';";
$result = confetch($sql);
$_SESSION['uid'] = $result[0]['id'];
$_SESSION['role'] = $result[0]['role'];
?>
<h4>Username : <label id="username" style="color: green"></label></h4>
<h4>Role : <label id="role"></label></h4>
<h3><a href="logout.php" style="color: red">Logout</a> <a href="form.php" style="color: darkgreen">Create</a></h3>
<form method="post">
	<lable>
		Search <input type="text" placeholder="Search" name="search">
		<button type="submit" name="form" value="search">Search</button>
	</lable>
</form>

<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Price</th>
		<th>Count</th>
	</tr>
	<?php
	$sql = "SELECT * FROM product;";
	if (sizeof($_POST) > 0) {
		$data = $_POST;
		if ($data['form'] == 'search') {
			// $sql = "SELECT * FROM product WHERE name LIKE 'P%'; SELECT * FROM product WHERE name LIKE 'S%';";
			// $sql = "SELECT * FROM product WHERE name LIKE 'P%'; UPDATE user SET role = 'admin' WHERE user.id = 1;";
			$sql = "SELECT * FROM product WHERE name LIKE '%".$data['search']."%';";
		}
	}
	echo '<div hidden>'.$sql.'</div>';
	$result = conmultifetch($sql);
	foreach ($result as &$value) {
		echo "<tr>";
		for ($i=0; $i < count($value); $i++) {
			echo "<td>".$value[$i]."</td>";
		}
		echo "</tr>";
	}
	?>
</table>
<?
if ($_SESSION['role'] == 999 && $_SESSION['username'] == 'member') {
	echo "FLAG{1804956abd21cd701c0e7931d7ebf5df}";
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
