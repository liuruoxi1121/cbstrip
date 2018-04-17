<?php include("../conn.php") ?>
<?php 
if(!isset($_SESSION['useridA'])||!isset($_SESSION['usernameA'])){
    echo("<script>alert('请登录后进行操作！');location.href='login.php';</script>");
}

$sql1 = "select count(*) from `sight`";
$sql2 = "select count(*) from `groupt`";
$sql3 = "select count(*) from `hotel`";
$sql4 = "select count(*) from `strategy`";
$sql5 = "select count(*) from `news`";
$sql6 = "select count(*) from `orders`";
$sql7 = "select count(*) from `user`";

$que1 = mysqli_query($conn,$sql1);
$que2 = mysqli_query($conn,$sql2);
$que3 = mysqli_query($conn,$sql3);
$que4 = mysqli_query($conn,$sql4);
$que5 = mysqli_query($conn,$sql5);
$que6 = mysqli_query($conn,$sql6);
$que7 = mysqli_query($conn,$sql7);

$res1 = mysqli_result($que1, 0, 0);
$res2 = mysqli_result($que2, 0, 0);
$res3 = mysqli_result($que3, 0, 0);
$res4 = mysqli_result($que4, 0, 0);
$res5 = mysqli_result($que5, 0, 0);
$res6 = mysqli_result($que6, 0, 0);
$res7 = mysqli_result($que7, 0, 0);

mysqli_free_result($que1);
mysqli_free_result($que2);
mysqli_free_result($que3);
mysqli_free_result($que4);
mysqli_free_result($que5);
mysqli_free_result($que6);
mysqli_free_result($que7);
?>

<html>

<head>
  <title>长白山旅游网系统后台</title>
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

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
          aria-controls="navbar">
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
        <h2 class="sub-header">首页</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>
                <a href="sight.php">景点</a>
              </th>
              <th>
                <a href="groupt.php">组团</a>
              </th>
              <th>
                <a href="hotel.php">酒店</a>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?=$res1?></td>
              <td><?=$res2?></td>
              <td><?=$res3?></td>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>
                <a href="strategy.php">攻略</a>
              </th>
              <th>
                <a href="news.php">新闻</a>
              </th>
              <th>
                <a href="orders.php">订单</a>
              </th>
              <th>
                <a href="user.php">用户</a>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?=$res4?></td>
              <td><?=$res5?></td>
              <td><?=$res6?></td>
              <td><?=$res7?></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</body>

</html>