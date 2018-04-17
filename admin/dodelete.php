<?php include("../conn.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
if(!isset($_SESSION['useridA'])||!isset($_SESSION['usernameA'])){
    echo("<script>alert('请登录后进行操作！');location.href='login.php';</script>");
}

if(!isset($_GET["type"])||!isset($_GET["id"])){
    echo("<script>alert('参数不足');history.back(-1);</script>");
}

$type = $_GET["type"];
$id = $_GET["id"];

$sql ="DELETE FROM `$type` WHERE `id` = $id";

$result = mysqli_query($conn,$sql);
// $count = mysqli_num_rows($result);

if(mysqli_affected_rows($conn)>0) {
    echo("<script>alert('删除成功！');history.back(-1);</script>");
}else{
    echo("<script>alert('删除失败！');history.back(-1);</script>");
}

?>