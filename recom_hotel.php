<div class="col-md-12 mainpart4">
  <a href="#" class="a2"><b>周边有房酒店</b></a>
  <a href="hotel.php" id="youfang" class="a3"><b>查看更多</b></a>
</div>
<?php 
    $re_sql = "SELECT * FROM `hotel` ORDER BY rand() LIMIT 3";
    $re_result = mysqli_query($conn,$re_sql);
    if(mysqli_affected_rows($conn)>0) {
        mysqli_data_seek($re_result,0);
        while ($re_row = mysqli_fetch_array($re_result)) {
            ?>
<div class="col-md-12 padding1 padding3">
  <div class="col-md-6 padding1">
  <a href="hotel_detail.php?id=<?=$re_row['id']?>"><img src="image/hotel_<?=$re_row['id']?>.jpg" class="img-responsive">
  </div>
  <div class="col-md-6 padding1">
    <p class="zhoubian"><?=$re_row['name']?></p>
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
