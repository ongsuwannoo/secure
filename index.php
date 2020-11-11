<?php
session_start();
if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] == 0) {
	header('location: login.php');
}
include('function.php');
?>
<h2>Index <a href="logout.php" style="color: red">Logout</a></h2>

<form method="post">
	<lable>
		Search <input type="text" placeholder="Search" name="search">
		<button type="submit" name="form" value="search">Search</button>
	</lable>
</form>

<table>
	<tr>
		<th>Name</th>
		<th>Price</th>
		<th>Count</th>
	</tr>
	<?php
	$sql = "SELECT * FROM product;";
	if (sizeof($_POST) > 0) {
		$data = $_POST;
		if ($data['form'] == 'search') {
			// $sql = "SELECT * FROM product WHERE name LIKE '%a'; UPDATE `user` SET `role` = 'admin' WHERE `user`.`id` = 1;";
			$sql = "SELECT * FROM product WHERE name LIKE '%".$data['search']."%';";
		}
	}
	$result = confetch($sql);
	foreach ($result as &$value) {
		echo "<tr>";
		echo "<td>".$value['name']."</td>";
		echo "<td>".$value['price']."</td>";
		echo "<td>".$value['count']."</td>";
		echo "</tr>";
	}
	?>
</table>

<?php
echo $result;
foreach ($result as &$value) {
	// print_r($value);
	// echo json_encode($value);
}
?>

<style>
	td{
		padding: 10px ;
	}
</style>
