<?php include("conn.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
if(!isset($_SESSION["username"])){
    echo("<script>alert('请登录后进行预订!');location.href='login.php';</script>");
}

$gid = $_POST["gid"];
$uid = $_SESSION["uid"];
$type = $_POST["type"];

$check = "SELECT * FROM `user` where username = ".$username." ";
$result = mysqli_query($conn,$check);
if(mysqli_affected_rows($conn)==0) {
    mysqli_free_result($result);
    echo("<script>alert('请登录后进行预订!');location.href='login.php';</script>");
}else{
    mysqli_free_result($result);
    $addtime = date("Y-m-d H:i:s");
    $insert = "INSERT INTO `orders` (`id`, `gid`, `uid`, `type`, `addtime`) VALUES (null, '$gid', '$uid', '$type', '$addtime')";
    $result = mysqli_query($conn,$insert) or die("Error in query: $insert. ".mysqli_error());
    if(mysqli_affected_rows($conn)==0) {
        echo("<script>alert('写入失败!');javascript:history.back(-1);</script>");
      }else{
        // $sql = "UPDATE `doctor` SET ordercount = ordercount+1 where id='$docid' ";
        // mysqli_query($conn,$sql);
        echo("<script>alert('预订成功!');javascript:history.back(-1);</script>");
      }
}

?>