<?php  
session_start();
if (sizeof($_POST) > 0) {
  $data = $_POST;
  $_SESSION['wordSearch'] =  $data['text_search'];
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Kaidee.com</title>
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

</div>
<div class="mr-b-2">
  <img id="bg" src="https://ast.kaidee.com/blackpearl/v9.2.3/_next/static/images/general-large-6b86fad29f1e8919155e0a9e5bcd54b7.jpg" alt="">
  
  <form method="POST" id='formSearch'>
    <i id="icon_search" onclick="document.getElementById('formSearch').submit()" class="fa fa-search"></i>
    <input id="text_search" name="text_search" type="text" class="form-control f-size-1-2" placeholder="คุณกำลังมองหาอะไรอยู่?">
    <!-- <input name="text_search" type="submit" class="form-control f-size-1-2" placeholder="คุณกำลังมองหาอะไรอยู่?"> -->
  </form>
  

</div>
<div class="d-flex justify-content-center mr-b-2">
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_autos_3x_2778048696.png" alt="">
    <span class="f-size-0-8">รถมือสอง</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_motorcycle_3x_b3ba2893e4.png" alt="">
    <span class="f-size-0-8">มอเตอร์ไซค์</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_property_3x_ed4d87b39a.png" alt="">
    <span class="f-size-0-8">อสังหาริมทรัพย์</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_mobiletablet_3x_0fed28334e.png" alt="">
    <span class="f-size-0-8">มือถือ แท็บเล็ต</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/category_autopart_3x_5e6337b6af.png" alt="">
    <span class="f-size-0-8">อะไหล่รถ ประดับยนต์</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_electronic_3x_ede4da6816.png" alt="">
    <span class="f-size-0-8">เครื่องใช้ไฟฟ้า</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_pets_3x_3d624bce86.png" alt="">
    <span class="f-size-0-8">สัตว์เลี้ยง</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_homeandgarden_3x_b3c7425f8f.png" alt="">
    <span class="f-size-0-8">บ้านและสวน</span>
  </div>
</div>
<div class="justify-content-center mr-b-2" id="type_product_part2">
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/category_amulet_ab94439212.png" alt="">
    <span class="f-size-0-8">พระเครื่อง</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_computer_3x_b5915eb097.png" alt="">
    <span class="f-size-0-8">คอมพิวเตอร์</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_bicycle_3x_e85e398ec6.png" alt="">
    <span class="f-size-0-8">จักรยาน</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/category_truck_3x_d236013b4a.png" alt="">
    <span class="f-size-0-8">รถบรรทุก และรถเครื่อง</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_watches_3x_9c950695d8.png" alt="">
    <span class="f-size-0-8">นาฬิกา</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_fashion_3x_8e613eac8c.png" alt="">
    <span class="f-size-0-8">เสื้อผ้า เครื่องแต่งกาย</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_musicalinstrument_3x_3bd8a783c4.png" alt="">
    <span class="f-size-0-8">เครื่องดนตรี</span>
  </div>
  <div class="d-flex flex-column justify-content-center text-center mr-r-5">
    <img class="size-5em mx-auto" src="https://kaidee-strapi.s3.ap-southeast-1.amazonaws.com/cate_collectibles_3x_15f708b88f.png" alt="">
    <span class="f-size-0-8">ของสะสม</span>
  </div>
</div>
<div class="text-center mr-b-2">
  <span onclick="ShowType()" type="subtitle" class="text-muted mr-r-0-3">ดูทั้งหมด (16 หมวดหมู่) </span>
  <img onclick="ShowType()" id="img_arrow" src="https://www.flaticon.com/svg/static/icons/svg/32/32195.svg" alt="">
</div>
<div class="d-flex justify-content-center">
  <div class="d-flex flex-column" style="width: 75%;">
    <div  class="h3 text-left d-flex justify-content-start" style="margin-left: 10px;">
      ผลการค้นหายอดนิยม
    </div>
    <div class="d-flex">
      <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col"><b>รถมือสอง</b> (30213)</th>
            <th scope="col">อสังหาริมทรัพย์ (62091)</th>
            <th scope="col">มอเตอร์ไซค์ (21263)</th>
            <th scope="col">มือถือ แท็บเล็ต (18289)</th>
            <th scope="col">อะไหล่รถ ประดับยนต์ (33182)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>รถมือสอง</td>
            <td>บ้าน</td>
            <td>mini bigbike</td>
            <td>iphone 11</td>
            <td>ล้อแม็ก</td>

          </tr>
          <tr>
            <td>รถกระบะมือสอง</td>
            <td>บ้านน๊อคดาวน์</td>
            <td>มอไซค์</td>
            <td>iphone</td>
            <td>ยางรถยนต์</td>
          </tr>
          <tr>
            <td>รถเก๋งมือสอง</td>
            <td>คอนโด</td>
            <td>มอไซค์มือสอง</td>
            <td>iphone xr</td>
            <td>โช็ค</td>
          </tr>
          <tr>
            <td>สิบล้อมือสอง</td>
            <td>หอพัก</td>
            <td>บิ๊กไบค์</td>
            <td>iphone x</td>
            <td>เครื่องเสียงรถยนต์</td>
          </tr>
          <tr>
            <td>รถบ้านมือสอง</td>
            <td>ที่ดิน</td>
            <td>สกู๊ตเตอร์ไฟฟ้า</td>
            <td>iphone 11 pro</td>
            <td>ป้ายทะเบียนรถยนต์</td>
          </tr>
          <tr>
            <td><a href="">ดูรถมือสองทั้งหมด</a></td>
            <td><a href="">ดูอสังหาริมทรัพย์ทั้งหมด</a></td>
            <td><a href="">ดูมอเตอร์ไซค์ทั้งหมด</a></td>
            <td><a href="">ดูมือถือ แท็บเล็ตทั้งหมด</a></td>
            <td><a href="">ดูอะไหล่รถ ประดับยนต์ทั้งหมด</a></td>
          </tr>
        </tbody>
      </table>
    </div>



    <div class="h3 text-left d-flex justify-content-start" style="margin-left: 10px;">
      ประกาศมาใหม่ ในหมวดหมู่มือถือ แท็บเล็ต
    </div>
    <div class="d-flex flex-row justify-content-between">
      <div class="card" style="width: 21rem;">
        <img src="https://img.kaidee.com/prd/20201112/359476885/m/44725145-ddff-4381-98a0-e01804210c38.jpg"
        class="card-img-top cropped1" alt="...">
        <div class="card-body">
          <h5 class="card-title">Samsung Galaxy A31 มือ1 128GB เครื่องศูนย์ไทย </h5>
          <p class="card-text">เมืองนครศรีธรรมราช</p>
          <div class="d-flex flex-row align-items-end" style="color:rgb(13, 28, 99);">
            <p class="h mr-3 mb-37"><b>THB</b></p>
            <p class="h2 mt-2"> <b>25,000</b></p>
          </div>
          <div class=" d-flex flex-row justify-content-between">
            <a href="# " class="btn btn-outline-secondary" style="height: 3rem; width:9rem">แชท</a>
            <a href=" # " class="btn btn-primary " style="height: 3rem; width:9rem">โทร</a>
          </div>
        </div>
      </div>

      <div class="card" style="width: 21rem; height:27rem;">
        <img src="https://img.kaidee.com/prd/20201112/359476369/m/d58c2a09-910a-403a-93fc-16ea93744051.jpg"
        class="card-img-top cropped1" alt="...">
        <div class="card-body">
          <h5 class="card-title">ไอโฟนX 64gb สภาพสวย มือสอง เหมือนใหม่</h5>
          <p class="card-text">จตุจักร</p>
          <div class="d-flex flex-row align-items-end" style="color:rgb(13, 28, 99);">
            <p class="h7 mr-3 mb-3"><b>THB</b></p>
            <p class="h2 mt-2"> <b>25,000</b></p>
          </div>
          <div class="d-flex flex-row justify-content-between">
            <a href="# " class="btn btn-outline-secondary" style="height: 3rem; width:9rem">แชท</a>
            <a href=" # " class="btn btn-primary " style="height: 3rem; width:9rem">โทร</a>
          </div>
        </div>

      </div>

      <div class="card " style="width: 21rem; ">
        <img src="https://img.kaidee.com/prd/20201112/359476298/m/428b1744-d424-41d8-99da-e70d2d842aac.jpg "
        class="card-img-top cropped1 " alt="... ">
        <div class="card-body ">
          <h5 class="card-title ">ไอโฟน se 2020 เครื่องใหม่เอี่ยม ประกันเหลือยาวๆ</h5>
          <p class="card-text ">เมืองนนทบุรี</p>
          <div class="d-flex flex-row align-items-end" style="color:rgb(13, 28, 99);">
            <p class="h7 mr-3 mb-3"><b>THB</b></p>
            <p class="h2 mt-2"> <b>25,000</b></p>
          </div>
          <div class=" d-flex flex-row justify-content-between">
            <a href="# " class="btn btn-outline-secondary" style="height: 3rem; width:9rem">แชท</a>
            <a href=" # " class="btn btn-primary " style="height: 3rem; width:9rem">โทร</a>
          </div>
        </div>

      </div>

      <div class="card " style="width: 21rem; ">
        <img src="https://img.kaidee.com/prd/20201112/359475126/m/da770fcb-cfce-4577-acf2-0c97cda8e5f3.jpg "
        class="card-img-top cropped1 " alt="... ">
        <div class="card-body ">
          <h5 class="card-title ">iPhone SE 2020 64GB สีดำ มือหนึ่ง</h5>
          <p class="card-text ">เมืองขอนแก่น</p>
          <div class="d-flex flex-row align-items-end" style="color:rgb(13, 28, 99);">
            <p class="h7 mr-3 mb-3"><b>THB</b></p>
            <p class="h2 mt-2"> <b>25,000</b></p>
          </div>
          <div class=" d-flex flex-row justify-content-between">
            <a href="# " class="btn btn-outline-secondary" style="height: 3rem; width:9rem">แชท</a>
            <a href=" # " class="btn btn-primary " style="height: 3rem; width:9rem">โทร</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
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

  let check_arrrow = 0
  function ShowType() {
    if (check_arrrow == 0) {
      document.getElementById("type_product_part2").style.display = "flex";
      document.getElementById("img_arrow").style.transform = "rotate(180deg)";
      check_arrrow++
    }
    else{
      document.getElementById("type_product_part2").style.display = "none";
      document.getElementById("img_arrow").style.transform = "rotate(0deg)";
      check_arrrow = 0
    }
  }
//   text_search.addEventListener("keyup", function(event) {
//     if (event.keyCode === 13 && text_search.value != "") {
//      location.href = "index.php";
//    }
// });
</script>
</html>