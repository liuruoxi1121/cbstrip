<?php include("conn.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
if(isset($_SESSION["username"])){
    header("Location: index.php"); exit;
}
$username = $_POST["username"];
$password = $_POST["password"];

$check = "SELECT * FROM `user` where username = ".$username." ";
$result = mysqli_query($conn,$check);
if(mysqli_affected_rows($conn)>0) {
    mysqli_free_result($result);
    echo("<script>alert('该用户已被注册!');location.href='register.php';</script>");
}else{
    mysqli_free_result($result);
    $addtime = date("Y-m-d H:i:s");
    $insert = "INSERT INTO `user` (`id`, `username`, `password`, `addtime`) VALUES (null, '$username', '$password', '$addtime' )";
    //$result = mysqli_query($conn,$insert);
    $result = mysqli_query($conn,$insert) or die("Error in query: $insert. ".mysqli_error());  
    if(mysqli_affected_rows($conn)==0) {
        mysqli_free_result($result);
        echo("<script>alert('写入失败!');location.href='register.php';</script>");
      }else{
        echo("<script>alert('注册成功，请登录!');location.href='login.php';</script>");
      }
}

?>