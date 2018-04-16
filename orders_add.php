<?php include("conn.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
if(!isset($_POST['gid'])||!isset($_POST['name'])||!isset($_POST['type'])||!isset($_SESSION['userid'])) {
    echo("<script>alert('请注册后进行操作！');location.href='login.php';</script>");
}

$uid = $_SESSION['userid'];
$gid = $_POST['gid'];
$name = $_POST['name'];
$type = $_POST['type'];
$date = date("Y-m-d H:i:s");

$sql ="INSERT INTO `orders` (`id`, `uid`, `gid`, `name`, `type`, `addtime`) VALUES (NULL, '$uid', '$gid', '$name', '$type', '$date')";

$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if(mysqli_affected_rows($conn)>0) {
    echo("<script>alert('预定成功！');history.back(-1);</script>");
}else{
    echo("<script>alert('预定失败！');history.back(-1);</script>");
}

?>