<?php include("../conn.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
if(!isset($_SESSION['useridA'])||!isset($_SESSION['usernameA'])){
    echo("<script>alert('请登录后进行操作！');location.href='login.php';</script>");
}

if(!isset($_POST["id"])){
    echo("<script>alert('参数不足');history.back(-1);</script>");
}
$id = $_POST["id"];
$name = $_POST["name"];

if(isset($_FILES["poster"])){
    $poster = uploadimg($_FILES["poster"]);
}else{
    $poster = "";
}
$detail = $_POST["detail"];
$addtime = date("Y-m-d H:i:s");

if($poster == ""){
    $sql ="UPDATE `strategy` SET `name` = '$name',  `detail` = '$detail', `addtime` = '$addtime' WHERE `strategy`.`id` = $id;";
}else{
    $sql ="UPDATE `strategy` SET `name` = '$name',  `poster` = '$poster',  `detail` = '$detail', `addtime` = '$addtime' WHERE `strategy`.`id` = $id;";
}

$result = mysqli_query($conn,$sql);
// $count = mysqli_num_rows($result);

if(mysqli_affected_rows($conn)>0) {
    echo("<script>alert('修改成功！');location.href='strategy.php';</script>");
}else{
    echo("<script>alert('修改失败！');history.back(-1);</script>");
}

?>