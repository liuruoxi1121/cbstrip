<?php include("conn.php") ?>
  <?php
//医生信息（全部）
if(!isset($_GET["id"])){header("Location: hotel.php"); exit;}
$id = $_GET["id"];
$sql ="SELECT * FROM `hotel` WHERE id = '$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)==0) {
    header("Location: hotel.php"); exit;
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
              <div class="col-md-8">
                <div class="row clearfix">
                <div class="col-md-12 column  padding1">
                  <div class="col-md-8 column  padding1">
                    <h3><b><?=$row['name']?></b></h3>
                    <p>
                      <a href="#" class="font1">
                        <?=$row['addressd']?>
                      </a>
                    </p>
                  </div>
                  <div class="col-md-2 column  padding1">
                    <h6><font  class="font2">¥<?=$row['price']?></font>起</h6>
                  </div>
                  <div class="col-md-2 column  padding1">
                    <form action="orders_add.php" method="post">
                      <input name="gid" type="hidden" value="<?=$row['id']?>">
                      <input name="name" type="hidden" value="<?=$row['name']?>">
                      <input name="type" type="hidden" value="hotel">
                      <button class="btn btn-primary btn-lg" type="submit">预订</button>
                    </form>
                  </div>
                </div>
                  <!-- <div class="col-md-12 column">
                    <hr class="margin4">
                    <div class="col-md-8 column padding1">
                    </div>
                  </div> -->
                </div>
                <div class="row clearfix">
                  <div class="col-md-12 column padding1" align="center">
                    <div class="col-md-4 column bannerimg">
                      <img src="image/hotel_<?=$row['id']?>.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-4 column bannerimg">
                      <img src="image/hotel_<?=$row['id']?>.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-4 column bannerimg">
                      <img src="image/hotel_<?=$row['id']?>.jpg" class="img-responsive">
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <!-- map -->
                <div id="map1">
                  <div style="width: 100%; height: 300px;" id="allmap"></div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="container message">
          <div class="row clearfix">
            <div class="col-md-8 changepadding">
              <!-- <div class="col-md-12 mainpart1" id="fangxing">
              </div> -->
              <div class="col-md-12 padding1">
                <div class="col-md-12 mainpart4">
                  <a href="#jiudianxinxi" id="jiudianxinxi" class="a3"><b>酒店信息</b></a>
                </div>
                <div class="col-md-12 description">
                  <pre><?=$row['detail']?></pre>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <?php include('recom_hotel.php'); ?>
            </div>
          </div>
        </div>

        <?php include("footer.php") ?>
          <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=fqsBYcF0t9FvB1Ux6a824qAVcZTDECfp"></script>
          <script>
            var map = new BMap.Map("allmap", {
              mapType: BMAP_HYBRID_MAP,
              enableMapClick: false
            });
            // 创建地址解析器实例
            var myGeo = new BMap.Geocoder();
            // 将地址解析结果显示在地图上,并调整地图视野
            myGeo.getPoint("<?=$row["addressd"]?>",
              function(point) {
                if (point) {
                  map.centerAndZoom(point, 13);
                  var marker = new BMap.Marker(point); // 创建标注
                  map.addOverlay(marker);
                  map.addControl(new BMap.NavigationControl());
                  map.addControl(new BMap.MapTypeControl({
                    mapTypes: [BMAP_NORMAL_MAP, BMAP_HYBRID_MAP]
                  }));
                  map.addControl(new BMap.OverviewMapControl({
                    isOpen: true,
                    anchor: BMAP_ANCHOR_BOTTOM_RIGHT
                  }));
                  var opts = {
                    width: 200, // 信息窗口宽度
                    height: 100, // 信息窗口高度
                    title: "<?=$row['name']?>", // 信息窗口标题
                    enableMessage: false //设置允许信息窗发送短息
                  }
                  var infoWindow = new BMap.InfoWindow("地址：<?=$row["addressd"]?>,价格：¥<?=$row['price']?> 起", opts); // 创建信息窗口对象
                  marker.addEventListener("click", function() {
                    map.openInfoWindow(infoWindow, point); //开启信息窗口
                  });

                } else {
                  alert("您选择地址没有解析到结果!");
                }
              }, "长白山");
          </script>
          <?php
    }
    // 释放资源
    mysqli_free_result($result);
}
?>