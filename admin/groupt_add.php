<?php include("../conn.php") ?>
  <?php
if(!isset($_SESSION['useridA'])||!isset($_SESSION['usernameA'])){
    echo("<script>alert('请登录后进行操作！');location.href='login.php';</script>");
}
?>

    <html>

    <head>
      <title>组团管理:新增组团</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <script src="../js/jquery.min.js"></script>
      <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="../css/animate.min.css" />
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" type="text/css" href="../css/font.css" />
      <link rel="stylesheet" type="text/css" href="../css/admin.css" />
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
              <a class="btn btn-primary" href="groupt.php">返回</a>
            </p>
            <h2 class="sub-header">组团管理:新增组团</h2>
            <form class="form-horizontal" action="do_groupt_add.php" method="post" enctype="multipart/form-data" autocomplete="off">

              <!-- 文本框-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">组团名</label>
                <div class="col-md-8">
                  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required />
                </div>
              </div>


              <!-- 文本框-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="route">路线</label>
                <div class="col-md-8">
                  <input id="route" name="route" type="text" placeholder="" class="form-control input-md" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label" for="price">价格</label>
                <div class="col-md-8">
                  <input id="price" name="price" type="number" placeholder="" class="form-control input-md" required />
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label" for="time">时间</label>
                <div class="col-md-8">
                  <input id="time" name="time" type="number" placeholder="" class="form-control input-md" required />
                </div>
              </div>

              <!-- 文件按钮 -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="img">封面</label>
                <div class="col-md-8">
                  <span class="help-block">支持常见图片格式(.jpg,.png,.jpeg)，最大上传：1M</span>
                  <input id="img" name="img" class="input-file" type="file" accept="image/*" required />
                </div>
              </div>

              <!-- 文本域 -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="description">描述</label>
                <div class="col-md-8">
                  <textarea class="form-control" id="description" name="description" rows="10"></textarea>
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
    </body>

    </html>