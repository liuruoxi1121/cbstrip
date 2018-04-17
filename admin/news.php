<?php include("../conn.php") ?>
  <?php
if(!isset($_SESSION['useridA'])||!isset($_SESSION['usernameA'])){
    echo("<script>alert('请登录后进行操作！');location.href='login.php';</script>");
}

$sql = "select * from `news`";

$result = mysqli_query($conn,$sql);

?>

    <html>

    <head>
      <title>公告管理</title>
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
              <a class="btn btn-success" href="news_add.php">添加</a>
            </p>
            <h2 class="sub-header">公告管理</h2>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>序号</th>
                    <th>名称</th>
                    <th>更新时间</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                  <form id="list">
                  <?php
                    if(mysqli_affected_rows($conn)>0) {
                        mysqli_data_seek($result,0);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                      <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["name"]?></td>
                        <td><?=$row["addtime"]?></td>
                        <td>
                          <a class="btn btn-success" href="news_change.php?id=<?=$row["id"]?>">修改</a>
                          <a class="btn btn-danger" href="dodelete.php?type=news&id=<?=$row["id"]?>">删除</a>
                        </td>
                      </tr>
                      <?php
                        }
                        // 释放资源
                        mysqli_free_result($result);
                    }else{
                        echo "<div class='col-md-12 text-center'>尚无数据</div>";
                    }
                    ?>
                  </form>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </body>

    </html>