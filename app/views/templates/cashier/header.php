<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASEURL?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="<?=BASEURL?>public/css/storage_style.css">
    <div id="particles-js" ></div>
    <script type="text/javascript" src="<?=BASEURL ?>public/js/particles.js"></script>
  <script type="text/javascript" src="<?=BASEURL?>public/js/app.js"></script>
    <title>Cashier App</title>
</head>

<body>
    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area" style="margin-top: 16px; margin-left:5px;">
            <h3>April<span>Store</span></h3>
        </div>
        <div class="right_area">
            <a href="<?=BASEURL?>public/home/logout" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
        <center>
            <img src="<?=BASEURL?>public/img/cashier.png" class="profile_image" alt="">
            <h4><?=$_SESSION['name'] ?></h4>
            <h6>(<?=$_SESSION['priviledge'] ?>)</h6>
        </center>
        <a href="<?=BASEURL?>public/home"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="<?=BASEURL?>public/cashier"><i class="fas fa-table"></i><span>Payment</span></a>
        <a href="<?=BASEURL?>public/history"><i class="fas fa-th"></i><span>History</span></a>
        <a href="<?= BASEURL?>public/inventory"><i class="fa fa-dropbox"></i><span>Inventory</span></a>
        <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
        <!-- <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a> -->
    </div>



