<?php include("../conn.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
if(!isset($_SESSION['useridA'])||!isset($_SESSION['usernameA'])){
    echo("<script>alert('请登录后进行操作！');location.href='login.php';</script>");
}

// if(!isset($_POST["id"])){
//     echo("<script>alert('参数不足');history.back(-1);</script>");
// }
// $id = $_POST["id"];
$name = $_POST["name"];
$rank = $_POST["rank"];
$star = $_POST["star"];
$theme = $_POST["theme"];
if(isset($_FILES["poster"])){
    $poster = uploadimg($_FILES["poster"]);
}else{
    $poster = "";
}
$addressp = $_POST["addressp"];
$addressd = $_POST["addressd"];
$opentime = $_POST["opentime"];
$support = $_POST["support"];
$price = $_POST["price"];
$description = $_POST["description"];
$notice = $_POST["notice"];
$type = $_POST["type"];
$city = $_POST["city"];
$addtime = date("Y-m-d H:i:s");

$sql ="INSERT INTO `sight` (`id`, `name`, `rank`, `theme`, `poster`, `addressp`, `addressd`, `opentime`, `support`, `price`, `description`, `notice`, `star`, `type`, `city`, `addtime`) VALUES (NULL, '$name', '$rank', '$theme', '$poster', '$addressp', '$addressd', '$opentime', '$support', '$price', '$description', '$notice', '$star', '$type', '$city', '$addtime');";


$result = mysqli_query($conn,$sql);
// $count = mysqli_num_rows($result);

if(mysqli_affected_rows($conn)>0) {
    echo("<script>alert('添加成功！');location.href='sight.php';</script>");
}else{
    echo("<script>alert('添加失败！');history.back(-1);</script>");
}

?>