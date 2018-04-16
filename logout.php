<?php include("conn.php") ?>
<?php
header('Content-Type: text/html; charset=UTF-8');
$userid = $_SESSION["userid"];
$username = $_SESSION["username"];
if((isset($userid))&&(isset($username))){
    session_destroy();
}
echo("<script>alert('已退出登录!');location.href='index.php';</script>");