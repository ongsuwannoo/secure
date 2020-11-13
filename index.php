<?php
session_start();
if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] == 0) {
	header('location: login.php');
} 
include('function.php');
?>
<h2>Index</h2>
<?
$sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."';";
$result = confetch($sql);
$_SESSION['uid'] = $result[0]['id'];
$_SESSION['role'] = $result[0]['role'];
echo '<p>Username: '.$_SESSION['username'].'<p>';
echo '<p>Role: '.$_SESSION['role'].'<p>';
?>

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
// passthru("grep -i Pa test.txt");
if ($_SESSION['role'] == 'admin') {
	echo "FLAG{1804956abd21cd701c0e7931d7ebf5df}";
}
?>
<!-- <div id='box'></div> -->
<script>
	window.onload = function(e){
		// document.getElementById('box').style.backgroundColor = 'green';
	}
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
