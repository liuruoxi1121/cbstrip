<?php include("conn.php") ?>
  <?php
//医生信息（全部）
if(!isset($_GET["id"])){header("Location: newslist.php"); exit;}
$id = $_GET["id"];
$sql ="SELECT * FROM `sight` WHERE id = '$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)==0) {
    header("Location: newslist.php"); exit;
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
        <link rel="stylesheet" type="text/css" href="css/main2.css" />
    </head>

    <body>
      <?php include('header.php'); ?>

        <!-- Begin page content -->
        <div class="container-fluid bgcolor1">
          <div class="container">
            <div class="row clearfix">
              <div class="col-md-12 column">
                <!-- <h6>门票 〉 北京门票 〉 颐和园</h6> -->
                <hr class="margin4">
                <div class="col-md-12 column padding1">
                  <div class="col-md-6 column">
                    <div class="zoombox">

                      <div class="zoompic"><img src="image/sight_<?=$row['id']?>.jpg" class="img-responsive" /></div>

                      <div class="sliderbox">
                        <!-- <div id="btn-left" class="arrow-btn dasabled"></div> -->
                        <div class="slider" id="thumbnail">
                          <ul class="list-unstyled">
                            <li class="current">
                              <a href="image/sight_<?=$row['id']?>.jpg" target="_blank"><img src="image/sight_<?=$row['id']?>.jpg" class="img-responsive" /></a>
                            </li>
                            <li>
                              <a href="image/sight_<?=$row['id']?>.jpg" target="_blank"><img src="image/sight_<?=$row['id']?>.jpg" class="img-responsive" /></a>
                            </li>
                            <li>
                              <a href="image/sight_<?=$row['id']?>.jpg" target="_blank"><img src="image/sight_<?=$row['id']?>.jpg" class="img-responsive" /></a>
                            </li>
                            <li>
                              <a href="image/sight_<?=$row['id']?>.jpg" target="_blank"><img src="image/sight_<?=$row['id']?>.jpg" class="img-responsive" /></a>
                            </li>
                            <li>
                              <a href="image/sight_<?=$row['id']?>.jpg" target="_blank"><img src="image/sight_<?=$row['id']?>.jpg" class="img-responsive" /></a>
                            </li>
                          </ul>
                        </div>
                        <!-- <div id="btn-right" class="arrow-btn"></div> -->
                      </div>

                    </div>
                  </div>
                  <div class="col-md-6 column mainintroduce">
                    <div class="col-md-12 column padding1">
                      <h2 class="color4"><b><?=$row['name']?></b></h2>
                      <h6><font class="color3"><?=$row['rank']?>景区</font>&nbsp;&nbsp;[<?=$row['city']?>]</h6>
                      <h6>景区地址：<?=$row['addressd']?>&nbsp;&nbsp;<font class="color4 glyphicon glyphicon-map-marker">地图</font></h6>
                      <h6>开放时间：<?=$row['opentime']?></h6>
                      <h6>服务保障：<font class="color4"><?=$row['support']?></font></h6>
                    </div>
                    <div class="col-md-12 column topbutton">
                      <div class="col-md-5 column phonestyle1">
                        <h6><font class="font2">￥<?=$row['price']?></font>起</h6>
                      </div>
                      <div class="col-md-4 column bgcolor2" align="center">
                        <form action="orders_add.php" method="post">
                          <input name="gid" type="hidden" value="<?=$row['id']?>">
                          <input name="name" type="hidden" value="<?=$row['name']?>">
                          <input name="type" type="hidden" value="sight">
                          <button class="btn btn-primary btn-lg" type="submit">预订</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row clearfix changemessages">
            <div class="col-md-12">
              <div class="row clearfix">
                <div class="col-xs-4 col-md-2 changemessage active" align="center">
                  <a href="#jianjie">景区简介</a>
                </div>
                <div class="col-xs-4 col-md-2 changemessage" align="center">
                  <a href="#xuzhi">入园须知</a>
                </div>
                <div class="col-xs-4 col-md-2 changemessage" align="center">
                  <a href="#ditu">景区地图</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-md-8">
              <h3 class="color4" id="jianjie">▋景区简介</h3>
              <pre><?=$row['description']?></pre>
              <h3 class="color4" id="xuzhi">▋入园须知</h3>
              <pre><?=$row['notice']?></pre>
              <h3 class="color4" id="ditu">▋景区地图</h3>
              <div id="map1">
                <div style="width: 100%; height: 500px;" id="allmap"></div>
              </div>
            </div>
            <div class="col-md-4">
                <?php include('recom_sight.php'); ?>
            </div>
          </div>
        </div>
        </div>

        <?php include("footer.php") ?>
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=fqsBYcF0t9FvB1Ux6a824qAVcZTDECfp"></script>
        <script>
        var map = new BMap.Map("allmap", {mapType:BMAP_HYBRID_MAP,enableMapClick:false});
              // 创建地址解析器实例
        var myGeo = new BMap.Geocoder();
        // 将地址解析结果显示在地图上,并调整地图视野
        myGeo.getPoint("<?=$row["addressd"]?>", function(point){
          if (point) {
            map.centerAndZoom(point, 13);
            var marker = new BMap.Marker(point);  // 创建标注
            map.addOverlay(marker);
            map.addControl(new BMap.NavigationControl());
            map.addControl(new BMap.MapTypeControl({mapTypes: [BMAP_NORMAL_MAP,BMAP_HYBRID_MAP]}));
            map.addControl(new BMap.OverviewMapControl({isOpen:true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT}));
            var opts = {
              width : 200,     // 信息窗口宽度
              height: 100,     // 信息窗口高度
              title : "<?=$row['name']?>" , // 信息窗口标题
              enableMessage:false//设置允许信息窗发送短息
            }
            var infoWindow = new BMap.InfoWindow("地址：<?=$row["addressd"]?>", opts);  // 创建信息窗口对象 
            marker.addEventListener("click", function(){          
              map.openInfoWindow(infoWindow,point); //开启信息窗口
            });

          }else{
            alert("您选择地址没有解析到结果!");
          }
        }, "<?=$row["city"]?>");
        
        </script>
                  <?php
    }
    // 释放资源
    mysqli_free_result($result);
}
?>
          <script type="text/javascript">
            $(document).ready(function() {

              //点击小图切换大图
              $("#thumbnail li a").click(function() {
                $(".zoompic img").hide().attr({
                  "src": $(this).attr("href"),
                  "title": $("> img", this).attr("title")
                });
                $("#thumbnail li.current").removeClass("current");
                $(this).parents("li").addClass("current");
                return false;
              });
              $(".zoompic>img").load(function() {
                $(".zoompic>img:hidden").show();
              });

              //小图片左右滚动
              var $slider = $('.slider ul');
              var $slider_child_l = $('.slider ul li').length;
              var $slider_width = $('.slider ul li').width();
              $slider.width($slider_child_l * $slider_width);

              var slider_count = 0;

              if ($slider_child_l < 5) {
                $('#btn-right').css({
                  cursor: 'auto'
                });
                $('#btn-right').removeClass("dasabled");
              }

              

              function slider_pic() {
                if (slider_count >= $slider_child_l - 5) {
                  $('#btn-right').css({
                    cursor: 'auto'
                  });
                  $('#btn-right').addClass("dasabled");
                } else if (slider_count > 0 && slider_count <= $slider_child_l - 5) {
                  $('#btn-left').css({
                    cursor: 'pointer'
                  });
                  $('#btn-left').removeClass("dasabled");
                  $('#btn-right').css({
                    cursor: 'pointer'
                  });
                  $('#btn-right').removeClass("dasabled");
                } else if (slider_count <= 0) {
                  $('#btn-left').css({
                    cursor: 'auto'
                  });
                  $('#btn-left').addClass("dasabled");
                }
              }
            });
          </script>
