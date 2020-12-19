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
    $link = $data['link'];
    $sql = "INSERT INTO product (name, price, count, img) VALUES('$name','$price', '$count', '$link');";
    $con = con();
    mysqli_query($con, $sql);
  }
}
?>

<head>
  <? include('head.html') ?>
</head>
<body>
  <a class="btn btn-outline-info m-3" href="index.php">< Index</a>
<!--   <form method="POST">
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
-->
<div id="create" class="container">
  <div class="row">
    <div class="col-4">
      <div class="card container" style="padding: 0px; ">
        <form method="POST">
          <h6 class="card-header info-color white-text text-center py-4" >
            <strong>ประเภทสินค้าที่ได้รับอนุญาตให้ลงขาย</strong>
          </h6>
          <div class="card-body">
            <div class="sm-form mt-1">
              <p style="color: #ff3333;"><small> *เฉพาะประเภทสินค้าใน List ด้านล่างเท่านั้นที่อนุญาติให้ลงขายสินค้า ท่านสามารถตรวจสอบประเภทสินค้าต่างๆได้ที่ช่องค้นหาด้านล่าง</small></p>
            </div>
            <div class="sm-form mt-2">
              <input class="form-control" type="text" name="search" placeholder="Search" required></input>
              <!--<button class="btn btn-outline-info btn-rounded waves-effect" type="submit" name="form" value="search">search</button> -->
            </div>
            <div class="sm-form mt-2">
              <pre><?
              $key = "";

              if(array_key_exists("search", $_REQUEST)) {
                $key = $_REQUEST["search"];
              }

              if($key != "") {
                passthru("grep -i $key test.txt");
              }
              ?>
            </pre>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Material form contact -->
  <div class="col-8">
    <div class="card container" style="padding: 0px; width: 70%">
      <h5 class="card-header info-color white-text text-center py-4">
        <strong>ลงขายสินค้า</strong>
      </h5>
      <!--Card content-->
      <div class="card-body">
        <!-- Form -->
        <form class="" style="color: #757575;" action="#!" method="POST">
          <!-- Name -->
          <div class="sm-form mt-3">
            <label>ชื่อสินค้า</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <!-- E-mail -->
          <div class="sm-form mt-3">
            <label>ราคา</label>
            <input type="text" name="price" class="form-control" required>
          </div>
          <!--Message-->
          <div class="sm-form mt-3">
            <label name="count">จำนวน</label>
            <input type="text" name="count" class="form-control" required>
          </div>
          <div class="sm-form mt-3">
            <label name="link">ลิงก์รูปภาพสินค้า</label>
            <input type="text" name="link" class="form-control" required>
          </div>
          <!-- <div class="value mt-3" >
           <div class="label--desc mb-3">อัพโหลดรูปภาพสินค้า</div>
           <div class="input-group js-input-file">
            <input class="input-file" type="file" name="file_cv" id="file">
          </div>
        </div> -->
        <!-- Send button -->
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="form" value="add">ลงขาย</button>
      </form>
      <!-- Form -->

    </div>
  </div>
</div>
</div>
</div>

</body>
