<?php include("../conn.php") ?>
  <?php
if(!isset($_SESSION['useridA'])||!isset($_SESSION['usernameA'])){
    echo("<script>alert('请登录后进行操作！');location.href='login.php';</script>");
}
if(!isset($_GET['id'])) {
    echo("<script>alert('参数错误！');history.back(-1);</script>");
}

$id = $_GET["id"];

$sql = "select * from `hotel` where `id` = $id";

$result = mysqli_query($conn,$sql);

mysqli_data_seek($result,0);
    while ($row = mysqli_fetch_array($result)) {
?>

    <html>

    <head>
      <title>酒店管理:修改酒店</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <script src="../js/jquery.min.js"></script>
      <script src="http://api.map.baidu.com/api?v=2.0&ak=fqsBYcF0t9FvB1Ux6a824qAVcZTDECfp"></script>
      <script src="../js/maps.jquery.min.js"></script>
      <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="../css/animate.min.css" />
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" type="text/css" href="../css/font.css" />
      <link rel="stylesheet" type="text/css" href="../css/admin.css" />
      <style>
      .bMap{position: relative;}
		.bMap .map-warp{position: absolute;left:0;width:100%;height:400px;top:34px;display: none;}
		.bMap input{width:100%;height:30px;line-height: 30px;border:1px solid #d7d7d7;}
		.tangram-suggestion-main{z-index: 9999}

      </style>
    </head>

    <body>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">长白山旅游网系统</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <?php include("nav.php") ?>
          </div>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <?php include("sidebar.php") ?>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <p class="pull-right" style="margin-top: 20px;">
              <a class="btn btn-primary" href="hotel.php">返回</a>
            </p>
            <h2 class="sub-header">酒店管理:修改酒店 #<?=$row['id']?></h2>
            <form class="form-horizontal" action="do_hotel_change.php" method="post" enctype="multipart/form-data" autocomplete="off">

            <!-- 文本框-->
            <div class="form-group">
                <label class="col-md-2 control-label" for="name">酒店名</label>
                <div class="col-md-8">
                <input id="id" name="id" type="hidden" value="<?=$row['id']?>" required />
                  <input id="name" name="name" type="text" value="<?=$row['name']?>" placeholder="" class="form-control input-md" required />
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-2 control-label" for="price">价格</label>
                <div class="col-md-8">
                    <input id="price" name="price" type="number" value="<?=$row['price']?>" placeholder="" class="form-control input-md" required />
                </div>
                </div>

                <!-- 文本框-->
                <div class="form-group">
                <label class="col-md-2 control-label" for="addressd">详细地址</label>
                <div class="col-md-8">
                    <input id="addressd" name="addressd" type="hidden" value="<?=$row['addressd']?>" placeholder="" class="form-control input-md" required readonly />
                    <div class="bMap map-selector"></div>
                </div>
                </div>

                                <!-- 文件按钮 -->
                                <div class="form-group">
                <label class="col-md-2 control-label" for="img">封面</label>
                <div class="col-md-8">
                <img src="<?=$row['img']?>" class="img-responsive center-block" />
                    <span class="help-block">支持常见图片格式(.jpg,.png,.jpeg)，最大上传：1M</span>
                    <input id="img" name="img" class="input-file" type="file" accept="image/*"  />
                </div>
                </div>


                <!-- 文本域 -->
                <div class="form-group">
                <label class="col-md-2 control-label" for="detail">详情</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="detail" name="detail" rows="10"><?=$row['detail']?></textarea>
                </div>
                </div>

              <!-- 双按钮 -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="">操作</label>
                <div class="col-md-8">
                  <button type="submit" class="btn btn-primary">提交</button>
                  <button type="reset" class="btn btn-default">清空</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script type="text/javascript">
      $(function(){
        // var arr = [];
        // var item = $("#addressp").val().split(',');
        // arr.push(item);
        // console.log("init:"+arr);
        $(".bMap").bMap({
          address: $("#addressd").val(),  //默认地址，如果为空则通过解析默认坐标获取
          location: "",  //默认坐标，如果为空则通过解析默认地址获取
          name:"map", //提交表单的NAME,默认为map
          callback:function(address,point) //回调函数，返回地址数组与坐标
              {
                var addressd = address.province+address.city+address.district+address.street+address.streetNumber+address.business;
                var pointd = point.lat+","+point.lng;
                $("#addressd").val(addressd);
                // $("#addressp").val(pointd);
                console.log("get:"+addressd);
                console.log("get:"+pointd);
              }
        });
      })
    </script>
      <?php
    }
    // 释放资源
    mysqli_free_result($result);
?>
    </body>

    </html>

