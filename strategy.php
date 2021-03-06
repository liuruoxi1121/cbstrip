<?php include("conn.php") ?>
<?php
        //医生信息（全部）
        $sql ="SELECT * FROM `strategy`";
        $title = "攻略";

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
        <!-- <div class="container margin5">
          <div class="row clearfix">
            <div class="col-md-12 column">
             <img class="img-responsive center-block" src="image/cbsimg.jpg">
            </div>
          </div>
        </div> -->
        <div class="container margin5">
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
                  
                  <?php
                    if(mysqli_affected_rows($conn)>0) {
                        mysqli_data_seek($result,0);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>

                            <div class="col-md-12 placerow">
                                <div class="col-md-4">
                                    <img src="image/strategy_<?=$row['id']?>.jpg" class="img-responsive margin6">
                                </div>
                                <div class="col-md-6">
                                    <h5><b>&nbsp;&nbsp;<?=$row['name']?></b></h5>
                                </div>
                                <div class="col-md-2 phonestyle1">
                                    <a href="strategy_detail.php?id=<?=$row['id']?>" class="btn btn-more">查看详情</a>
                                </div>
                            </div>
                            <?php
                        }
                        // 释放资源
                        mysqli_free_result($result);
                    }else{
                        echo "<div class='col-md-12 text-center'>尚无数据</div>";
                    }
                    ?>
                      <!-- <div class="col-md-12 column" align="center">
                        <ul class="pagination">
                          <li>
                            <a href="#">上一页</a>
                          </li>
                          <li>
                            <a href="#">1</a>
                          </li>
                          <li>
                            <a href="#">2</a>
                          </li>
                          <li>
                            <a href="#">3</a>
                          </li>
                          <li>
                            <a href="#">4</a>
                          </li>
                          <li>
                            <a href="#">5</a>
                          </li>
                          <li>
                            <a href="#">下一页</a>
                          </li>
                        </ul>
                      </div> -->
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