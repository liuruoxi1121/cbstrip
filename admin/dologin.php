<?php include("../conn.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
if(isset($_SESSION["usernameA"])){
    header("Location: login.php"); exit;
}
$username = $_POST["usernameA"];
$password = $_POST["passwordA"];

$check = "SELECT * FROM `admin` where username = '".$username."' AND `password` = '".$password."' ";

$result = mysqli_query($conn,$check);
if(mysqli_affected_rows($conn)>0) {
    mysqli_data_seek($result,0);
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION["useridA"] = $row["id"];
        $_SESSION["usernameA"] = $row["username"];
    }
    mysqli_free_result($result);
    echo("<script>alert('登录成功!');location.href='index.php';</script>");
}else{
    mysqli_free_result($result);
    echo("<script>alert('该用户不存在！');location.href='login.php';</script>");
}

?>