<?php include("conn.php") ?>
  <?php
//医生信息（全部）
$sql ="SELECT * FROM `news`";
$title = "新闻";

$result = mysqli_query($conn,$sql);
//数据条数
$count = mysqli_num_rows($result);
?>
    <!DOCTYPE html>
    <html lang="zh-cn">

    <head>
      <title>
        <?=$title?>
      </title>
      <?php include('header_meta.php'); ?>
        <link rel="stylesheet" type="text/css" href="css/main1.css" />
    </head>

    <body>
      <?php include('header.php'); ?>

        <!-- Begin page content -->
        <!-- <div class="container margin5">
<div class="row clearfix">
<div class="col-md-12 column">
<img class="img-responsive center-block" src="image/cbsimg.jpg">
</div>
</div>
</div> -->
        <div class="container margin5">
          <div class="row clearfix" align="center">
            <div class="col-md-8 col-xs-12">
              <div class="row clearfix">
                <div class="col-md-12 col-xs-12 changeroods">
                  <div class="col-md-3 col-xs-4 changerood active">
                    <?=$title?> (<?=$count?>)
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-12 padding1" align="left">
                  <div class="list-group">
                  <?php
                    if(mysqli_affected_rows($conn)>0) {
                        mysqli_data_seek($result,0);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                                      <a href="news_detail.php?id=<?=$row['id']?>" class=" list-group-item "><?=$row['name']?> </a>
                            
                            <?php
                        }
                        // 释放资源
                        mysqli_free_result($result);
                    }else{
                        echo "<div class='col-md-12 text-center'>尚无数据</div>"; } ?>
                  </div>
                </div>
            </div>
          </div>
        <div class="col-md-4 col-xs-12" align="left">
          <div class="col-md-12 rightpart">
              <?php include('recom_hotel.php'); ?>
          </div>
        </div>
        </div>
        </div>

        <?php include("footer.php") ?>