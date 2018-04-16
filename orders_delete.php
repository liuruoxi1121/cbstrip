<?php include("conn.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
if(!isset($_SESSION['userid'])||!isset($_SESSION['username'])) {
    echo("<script>alert('请注册后进行操作！');location.href='login.php';</script>");
}
if(!isset($_GET['id'])) {
    echo("<script>alert('参数错误！');history.back(-1);</script>");
}

//$uid = $_SESSION['userid'];
$id = $_GET['id'];
//$date = date("Y-m-d H:i:s");

$sql ="DELETE FROM `orders` WHERE `id` = $id";

$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if(mysqli_affected_rows($conn)>0) {
    echo("<script>alert('删除成功！');history.back(-1);</script>");
}else{
    echo("<script>alert('删除失败！');history.back(-1);</script>");
}

?>