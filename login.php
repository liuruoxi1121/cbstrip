<?php include("conn.php") ?>
  <!DOCTYPE html>
  <html lang="zh-cn">
  <head>
  <title>登录</title>
  <?php include('header_meta.php'); ?>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
  </head>
<body>
  <?php include('header.php'); ?>
      <!-- Begin page content -->
      <div class="container">
        <div class="row clearfix">
          <div class="col-md-8 col-sm-6">
            <img class="img-responsive center-block" src="images/image3.jpg">
          </div>
          <div class="col-md-4 col-sm-6">

            <div class="page-header">
              <h3>登录</h3>
            </div>
            <form action="dologin.php" method="post" class="form-horizontal">
              <div class="form-group">
                <label class="col-md-3 control-label" for="username">用户名</label>
                <div class="col-md-7">
                  <input name="username" class="form-control input-md" id="username" required="" type="text" />

                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="password">密码</label>
                <div class="col-md-7">
                  <input name="password" class="form-control input-md" id="password" required="" type="password" />

                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">操作</label>
                <div class="col-md-7">
                  <input class="form-control input-md" type="submit" value="登录"/>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
  <?php include("footer.php") ?>