<?php include("conn.php") ?>
<?php
        if(!isset($_SESSION['userid'])||!isset($_SESSION['username'])){
            echo("<script>alert('请注册后进行操作！');location.href='login.php';</script>");
        }
        $userid = $_SESSION['userid'];
        //医生信息（全部）
        $sql ="SELECT * FROM `orders` WHERE `uid` = '$userid'";
        $title = "订单";
        
        $result = mysqli_query($conn,$sql);
        //数据条数
        $count = mysqli_num_rows($result);
    ?>
  <!DOCTYPE html>
  <html lang="zh-cn">

  <head>
    <title><?=$title?></title>
    <?php include('header_meta.php'); ?>
      <link rel="stylesheet" type="text/css" href="css/main1.css" />
  </head>

  <body>
    <?php include('header.php'); ?>

        <!-- Begin page content -->
        <div class="container margin5">
          <div class="row clearfix">
            <div class="col-md-12 column search-box">
              <form action="search_result.php" method="get" class="navbar-form" role="search">
                <div class="col-md-6 margin6">
                  <input name="name" type="text" id="country" class="form-control" style="width: 100%;" required />
                </div>
                <div class="col-md-2 margin6">
                  <button type="submit" id="searchbutton" class="btn btn-default">搜索</button>
                </div>
              </form>
                <div class="col-md-4 margin6 resou">
                  长白山周边 热搜：&nbsp;&nbsp;魔界风景区&nbsp;&nbsp;长白山
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="container">
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
                    <table class="table table-hover table-vertical">
						<thead>
							<tr>
								<th>#</th>
								<th>订单名称</th>
								<th>类型</th>
								<th>购买时间</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
                  <?php
                    if(mysqli_affected_rows($conn)>0) {
                        mysqli_data_seek($result,0);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td data-th="编号"><?=$row['id']?></td>

                                <td data-th="订单名称">
                                    <a href="<?=$row['type']?>_detail.php?id=<?=$row['gid']?>" style="color:blue;"><?=$row['name']?></a>
                                </td>
                                <td data-th="类型"><?=$row['type']?></td>

                                <td data-th="购买时间"><?=$row['addtime']?></td>
                                <!--<td>{$item.time}</td>-->
                                <td data-th="操作">
                                    <a href="orders_delete.php?id=<?=$row['id']?>" style="color:blue;">删除</a>
                                </td>
                            </tr>
                            <?php
                        }
                        // 释放资源
                        mysqli_free_result($result);
                    }else{
                        echo "<div class='col-md-12 text-center'>暂无订单</div>";
                    }
                    ?>
                    </tbody>
					</table>
                  </div>
                </div>
              </div>

            <div class="col-md-4 col-xs-12" align="left">
                <div class="col-md-12 rightpart">
                    <?php include('recom_sight.php'); ?>
                </div>
            </div>
          </div>
        </div>

        <?php include("footer.php") ?>