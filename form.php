<?php
session_start();

include('function.php');
?>

<?php
if (sizeof($_POST) > 0) {
  $data = $_POST;
  if ($data['form'] == 'add') {
      $name = $data['name'];
      $price = $data['price'];
      $count = $data['count'];
      $sql = "INSERT INTO product (name, price, count) VALUES('$name','$price', '$count');";
      $con = con();
      mysqli_query($con, $sql);
  }
}
?>
<a href="index.php" >< Index</a>
<form method="POST">
    <h2 >Create</h2>
    Name
    <p>
        <input type="text" name="name" placeholder="Name" required>
    </p>
    Price
    <p>
        <input type="text" name="price" placeholder="Price" required></input>
    </p>
    Count
    <p>
        <input type="number" name="count" placeholder="Count" required></input>
    </p>
    <button type="submit" name="form" value="add">Add</button>
</form>