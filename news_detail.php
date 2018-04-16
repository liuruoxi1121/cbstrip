<?php include("conn.php") ?>
  <?php
//医生信息（全部）
if(!isset($_GET["id"])){header("Location: news.php"); exit;}
$id = $_GET["id"];
$sql ="SELECT * FROM `news` WHERE id = '$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)==0) {
    header("Location: news.php"); exit;
}else{
    mysqli_data_seek($result,0);
    while ($row = mysqli_fetch_array($result)) {
        ?>
    <!DOCTYPE html>
    <html lang="zh-cn">

    <head>
      <title>
        <?=$row['name']?>
      </title>
      <?php include('header_meta.php'); ?>
        <link rel="stylesheet" type="text/css" href="css/main3.css" />
    </head>

    <body>
      <?php include('header.php'); ?>

        <!-- Begin page content -->
        <div class="container-fluid bgcolor1">
          <div class="container">
            <div class="row clearfix">
              <div class="col-md-8 column">
                <hr class="margin4">
                  <h3><b><?=$row['name']?></b></h3>
                  <p>
                    <a href="#" class="font1">
                      <?=$row['addtime']?>
                    </a>
                  </p>
                  <!-- <img src="image/news_<?=$row['id']?>.jpg" class="img-responsive"/> -->
                  <!-- <div class="col-md-12 mainpart4">
                    <a href="#jiudianxinxi" id="jiudianxinxi" class="a3"><b>攻略详情</b></a>
                  </div> -->
                  <div class="col-md-12 description">
                    <pre><?=$row['detail']?></pre>
                  </div>
              </div>
              <div class="col-md-4">
                <?php include('recom_hotel.php'); ?>
              </div>
            </div>
          </div>
        </div>

        <?php include("footer.php") ?>
          <?php
    }
    // 释放资源
    mysqli_free_result($result);
}
?>