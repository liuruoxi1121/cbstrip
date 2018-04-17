<?php include("../conn.php") ?>
<?php
header('Content-Type: text/html; charset=UTF-8');
if(isset($_SESSION["useridA"])){
    session_destroy();
    
    echo("<script>alert('用户已退出登录！');location.href='login.php';</script>");
    
}else{
    echo("<script>location.href='login.php';</script>");
}

?>