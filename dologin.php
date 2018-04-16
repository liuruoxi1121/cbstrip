<?php include("conn.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
if(isset($_SESSION["username"])){
    header("Location: index.php"); exit;
}
$username = $_POST["username"];
$password = $_POST["password"];

$check = "SELECT * FROM `user` where `username` = '".$username."' AND `password` = '".$password."' ";
$result = mysqli_query($conn,$check);
if(mysqli_affected_rows($conn)>0) {
    mysqli_data_seek($result,0);
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["username"];
    }
    mysqli_free_result($result);
    echo("<script>alert('登陆成功!');location.href='index.php';</script>");
}else{
    mysqli_free_result($result);
    echo("<script>alert('该用户未注册，请注册后登陆！');location.href='register.php';</script>");
}

?>