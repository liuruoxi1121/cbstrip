<?php include("../conn.php") ?>
<html>

<head>
  <title>长白山旅游网系统登录</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <script src="../js/jquery.min.js"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../css/animate.min.css"/>
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" href="../css/font.css"/>
  <link rel="stylesheet" type="text/css" href="../css/admin.css"/>
</head>

<body class="login-page">
  <div class="login-box">
    <div class="login-logo" align="center" style="width:100%;">
      <h2 style="color:white;padding-top:50px;" align="center">长白山旅游网管理系统</h2>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

      <form id="loginForm" method="post" action="dologin.php" autocomplete="off">
        <div class="form-group">
          <input type="text" id="username" class="form-control input-lg" name="usernameA" placeholder="用户名" required>
        </div>
        <div class="form-group">
          <input type="password" id="password" class="form-control input-lg" name="passwordA" placeholder="密码" required>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat btn-lg">登录</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <script>
    var captcha_img = $('#captcha-container').find('img')
    var verifyimg = captcha_img.attr("src");
    captcha_img.attr('title', '点击刷新');
    captcha_img.click(function () {
      if (verifyimg.indexOf('?') > 0) {
        $(this).attr("src", verifyimg + '&random=' + Math.random());
      } else {
        $(this).attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
      }
    });
  </script>

</body>

</html>