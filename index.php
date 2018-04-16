<?php include("conn.php") ?>
<?php 
$sql1 ="SELECT id,name,price FROM `sight` WHERE TYPE = '1' ORDER BY rand() LIMIT 6";

$sql2 ="SELECT id,name,price FROM `sight` WHERE TYPE = '2' ORDER BY rand() LIMIT 6";

$sql3 ="SELECT distinct city FROM `sight` WHERE TYPE = '2'";

$sql4 ="SELECT id,name FROM `groupt` ORDER BY rand() LIMIT 3";

$sql5 ="SELECT id,name,price FROM `sight` WHERE TYPE = '1' ORDER BY price desc LIMIT 10";

$sql6 ="SELECT id,name,price FROM `sight` WHERE TYPE = '2' ORDER BY price desc LIMIT 10";

$sql1_result = mysqli_query($conn,$sql1);
$sql2_result = mysqli_query($conn,$sql2);
$sql3_result = mysqli_query($conn,$sql3);
$sql4_result = mysqli_query($conn,$sql4);
$sql5_result = mysqli_query($conn,$sql5);
$sql6_result = mysqli_query($conn,$sql6);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>   
  <title>长白山旅游网</title>
  <?php include('header_meta.php'); ?>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
  </head>
<body>
  <?php include('header.php'); ?>
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column topsearch">  
      <div class="col-md-2 column">  
      </div>
      <form action="search_result.php" method="get">
      <div class="col-md-6 column padding1">  
        <div class="form-group">
          <input name="name" type="text" class="form-control" required />
        </div> 
      </div>
      <div class="col-md-2 column padding1">  
        <button type="submit" class="btn btn-default topbutton">搜索</button>
      </div>
      </form>
      <div class="col-md-2 column padding1">  
        <font class="topmore glyphicon glyphicon-map-marker"> <b>周边景点查询</b></font>
      </div>
    </div>  
  </div>
</div>
<div class="container place">
  <div class="row clearfix">
    <div class="col-md-5 column">  
      <p><b><font class="point1">▪</font> 本地特惠景点精选</b></p>
      <p class="font1">
      <?php
      if(mysqli_affected_rows($conn)>0) {
        mysqli_data_seek($sql1_result,0);
        while ($re_row = mysqli_fetch_array($sql1_result)) {
      ?>
          <a href="sight_detail.php?id=<?=$re_row['id']?>"><?=$re_row['name']?></a>|
      <?php
          }
          // 释放资源
          // mysqli_free_result($sql1_result);
      }else{
          echo "尚无数据";
      }
      ?>
      </p>
      <hr class="hr2">
      <p><b><font class="point2">▪</font> 外地景点精选</b></p>
      <p class="font1">
      <?php
      if(mysqli_affected_rows($conn)>0) {
        mysqli_data_seek($sql2_result,0);
        while ($re_row = mysqli_fetch_array($sql2_result)) {
      ?>
          <a href="sight_detail.php?id=<?=$re_row['id']?>"><?=$re_row['name']?></a>|
      <?php
          }
          // 释放资源
          // mysqli_free_result($sql2_result);
      }else{
          echo "尚无数据";
      }
      ?>
      </p>
      <hr class="hr2">
      <p><b><font class="point3">▪</font> 周边游</b></p>
      <p class="font1">
      <?php
      if(mysqli_affected_rows($conn)>0) {
        mysqli_data_seek($sql3_result,0);
        while ($re_row = mysqli_fetch_array($sql3_result)) {
      ?>
          <a href="sight_detail.php?name=<?=$re_row['city']?>"><?=$re_row['city']?></a>|
      <?php
          }
          // 释放资源
          mysqli_free_result($sql3_result);
      }else{
          echo "尚无数据";
      }
      ?>
      </p>
      <hr class="hr2">
      <p><b><font class="point4">▪</font> 热门团</b></p>
      <p class="font1">
      <?php
      if(mysqli_affected_rows($conn)>0) {
        mysqli_data_seek($sql4_result,0);
        while ($re_row = mysqli_fetch_array($sql4_result)) {
      ?>
          <a href="groupt_detail.php?id=<?=$re_row['id']?>"><?=$re_row['name']?></a>|
      <?php
          }
          // 释放资源
          mysqli_free_result($sql4_result);
      }else{
          echo "尚无数据";
      }
      ?>
      </p>
      <hr class="hr2">
    </div>
    <div class="col-md-7 column padding1">  
      <img src="image/banner1.jpg" class="topbannerimg" id="banner1">
      <img src="image/banner2.jpg" class="topbannerimg" id="banner2" style="display:none;">
      <div class="bannerbuttons" align="center">
        <div id="bannerbutton1" class="bannerbutton1"><a href="sight_detail.php?id=3">春暖花开 看动物</a></div>
        <div id="bannerbutton2" class="bannerbutton2"><a href="sight_detail.php?id=8">过周末 看演出</a></div>
      </div>
    </div>  
  </div>
</div>

<div class="container main">
  <div class="row clearfix">
    <div class="col-xs-12 column padding1">
      <h3>本地景点 <font class="font3">热门景点特惠，本地出游必选</font></h3>
      <img src="image/zs.png" class="img-responsive" style="float:right;margin-top: -61px;">
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12 column padding1 margin5">
      <div class="col-md-3 column">
        <div class="col-md-12 mainpart4">
          <a href="#" class="a2"><b>本地景点排行榜</b></a>
        </div>
        <div class="col-md-12 column padding1">
          <ul class="list-unstyled ranking">
          <?php
          if(mysqli_affected_rows($conn)>0) {
            mysqli_data_seek($sql5_result,0);
            while ($re_row = mysqli_fetch_array($sql5_result)) {
          ?>
              <li>
              <a href="sight_detail.php?id=<?=$re_row['id']?>"><?=$re_row['name']?></a><font class="mainprice2">￥<?=$re_row['price']?></font>
              </li>
          <?php
              }
              // 释放资源
              mysqli_free_result($sql5_result);
          }else{
              echo "尚无数据";
          }
          ?>
          </ul>
          <img src="image/zs2.png" class="img-responsive">
        </div>
      </div>
      <div class="col-md-9 column bannerimg">
        <div class="col-md-12 column padding1">
        <?php
      if(mysqli_affected_rows($conn)>0) {
        mysqli_data_seek($sql1_result,0);
        while ($re_row = mysqli_fetch_array($sql1_result)) {
      ?>
        <div class="col-md-4 column bannerimg">
          <a href="sight_detail.php?id=<?=$re_row['id']?>"><img src="image/sight_<?=$re_row['id']?>.jpg"  id="tu3" class="img-responsive"></a>
            <div class="nameandprice"><font class="mainprice">￥<?=$re_row['price']?></font><?=$re_row['name']?></div>
        </div>
      <?php
          }
          // 释放资源
          mysqli_free_result($sql1_result);
      }else{
          echo "尚无数据";
      }
      ?>
        </div>
      </div>
    </div>
  </div>
</div>    
<div class="container main">
  <div class="row clearfix">
    <div class="col-xs-12 column padding1">
      <h3>周边景点 <font class="font3">精品周边景点，随心畅游东北三省</font></h3>
      <img src="image/zs.png" class="img-responsive" style="float:right;margin-top: -61px;">
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12 column padding1 margin5">
      <div class="col-md-3 column">
        <div class="col-md-12 mainpart4">
          <a href="#" class="a2"><b>周边景点排行榜</b></a>
        </div>
        <div class="col-md-12 column padding1">
          <ul class="list-unstyled ranking">
          <?php
          if(mysqli_affected_rows($conn)>0) {
            mysqli_data_seek($sql6_result,0);
            while ($re_row = mysqli_fetch_array($sql6_result)) {
          ?>
              <li>
              <a href="sight_detail.php?id=<?=$re_row['id']?>"><?=$re_row['name']?></a><font class="mainprice2">￥<?=$re_row['price']?></font>
              </li>
          <?php
              }
              // 释放资源
              mysqli_free_result($sql6_result);
          }else{
              echo "尚无数据";
          }
          ?>
          </ul>
          <img src="image/zs3.png" class="img-responsive">
        </div>
      </div>
      <div class="col-md-9 column bannerimg">
        <div class="col-md-12 column padding1">
        <?php
      if(mysqli_affected_rows($conn)>0) {
        mysqli_data_seek($sql2_result,0);
        while ($re_row = mysqli_fetch_array($sql2_result)) {
      ?>
        <div class="col-md-4 column bannerimg">
          <a href="sight_detail.php?id=<?=$re_row['id']?>"><img src="image/sight_<?=$re_row['id']?>.jpg"  id="tu3" class="img-responsive"></a>
            <div class="nameandprice"><font class="mainprice">￥<?=$re_row['price']?></font><?=$re_row['name']?></div>
        </div>
      <?php
          }
          // 释放资源
          mysqli_free_result($sql2_result);
      }else{
          echo "尚无数据";
      }
      ?>
        </div>
      </div>
    </div>
  </div>
</div>   
<?php include('footer.php'); ?>
<script type="text/javascript">
    function SetSameHeight(h1,h2) 
    { 
         var h1 = $('#tu1').outerHeight();
         var h2 = $('#tu2').outerHeight()-5; 
         if(h2>1000)
          $('#tu1').height(h1); 
         else
          $('#tu1').height(h2); 
         // alert(h1+'a'+h2);
    } 
    setInterval(SetSameHeight,100);
</script>
<script type="text/javascript">
    $('#bannerbutton1').hover(function(){
        $('#bannerbutton1').css({
            "background-color":"rgba(255,255,255,0.5)",
            "color":"#333"
        });
        $('#bannerbutton2').css({
            "background-color":"rgba(1,1,1,0.5)",
            "color":"#ffffff"
        });
        $('#banner1').css("display","block");
        $('#banner2').css("display","none");
    });
    $('#bannerbutton2').hover(function(){
        $('#bannerbutton2').css({
            "background-color":"rgba(255,255,255,0.5)",
            "color":"#333"
        });
        $('#bannerbutton1').css({
            "background-color":"rgba(1,1,1,0.5)",
            "color":"#ffffff"
        });
        $('#banner2').css("display","block");
        $('#banner1').css("display","none");
    });
</script>

