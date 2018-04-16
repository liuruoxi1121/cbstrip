<div class="col-md-12 mainpart4">
    <a href="#" class="a2"><b>长白山</b></a>
    <a href="strategy.php" class="a3" title="进入攻略页">查看攻略</a>
</div>
<div class="col-md-12 padding1 padding3">
    <img src="image/cbsdetail.jpg" class="img-responsive margin5">
    <p><b>简介：</b></p>
    <p>长白山脉是鸭绿江、松花江和图们江的发源地。是中国满族的发祥地和满族文化圣山。长白山脉的“长白”二字还有一个美好的寓意，即为长相守，到白头，代表着人们对忠贞与美满爱情的向往与歌颂。</p>
    <div align="right">
    <a href="strategy.php" align="right">更多>></a>
    </div>
</div>
<div class="col-md-12 mainpart4">
    <a href="sight.php" class="a2"><b>当地推荐</b></a>
</div>
<?php 
    $re_sql = "SELECT * FROM `sight` WHERE TYPE = '1' ORDER BY rand() LIMIT 2";
    $re_result = mysqli_query($conn,$re_sql);
    if(mysqli_affected_rows($conn)>0) {
        mysqli_data_seek($re_result,0);
        while ($re_row = mysqli_fetch_array($re_result)) {
            ?>

<div class="col-md-12 padding1 padding3">
    <div class="col-md-6 padding1">
    <a href="sight_detail.php?id=<?=$re_row['id']?>"><img src="image/sight_<?=$re_row['id']?>.jpg" class="img-responsive" ></a>
    </div>
    <div class="col-md-6 padding1">
    <p class="zhoubian"><?=$re_row['name']?></p>
    <p class="star2 zhoubian"><?=$re_row['star']?>星级</p>
    <p class="font4 zhoubian">¥<?=$re_row['price']?></p>
    </div>
</div>

<?php
                        }
                        // 释放资源
                        mysqli_free_result($re_result);
                    }else{
                        echo "<div class='col-md-12 text-center'>尚无数据</div>";
                    }
                    ?>
<!-- <div class="col-md-12 padding1 padding3">
    <div class="col-md-6 padding1">
    <img src="image/p2.jpg" class="img-responsive">
    </div>
    <div class="col-md-6 padding1">
    <p class="zhoubian">日本东京+箱根+大阪9日自由行·赏富士美景</p>
    <p class="star2 zhoubian">★★★★</p>
    <p class="font4 zhoubian">¥5572</p>
    </div>
</div> -->