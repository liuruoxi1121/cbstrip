<?php
//数据库的位置

define('DB_HOST', 'localhost');
//用户名
define('DB_USER', 'root');
//口令
define('DB_PASSWORD', '');
//数据库名
define('DB_NAME','travel') ;

try{
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
}catch (Exception $e){
	die ("无法连接至数据库".$e->errorMessage());
}
mysqli_set_charset($conn,'utf8');

session_start();

function mysqli_result($result,$row,$field=0) {
    if ($result===false) return false;
    if ($row>=mysqli_num_rows($result)) return false;
    if (is_string($field) && !(strpos($field,".")===false)) {
        $t_field=explode(".",$field);
        $field=-1;
        $t_fields=mysqli_fetch_fields($result);
        for ($id=0;$id<mysqli_num_fields($result);$id++) {
            if ($t_fields[$id]->table==$t_field[0] && $t_fields[$id]->name==$t_field[1]) {
                $field=$id;
                break;
            }
        }
        if ($field==-1) return false;
    }
    mysqli_data_seek($result,$row);
    $line=mysqli_fetch_array($result);
    return isset($line[$field])?$line[$field]:false;
}

//$file = $file
//$path = "../images"
function uploadimg($file,$path=""){
if($path==""){
    $path="../image/";
}
if ((($file["type"] == "image/gif")
|| ($file["type"] == "image/jpeg")
|| ($file["type"] == "image/png")
|| ($file["type"] == "image/pjpeg"))
&& ($file["size"] < 20000))
    {
    if ($file["error"] > 0)
    {
    echo "返回错误码: " . $file["error"] . "<br />";
    return false;
    }
    else
    {
        move_uploaded_file($file["tmp_name"],
        $path . $file["name"]);
        echo "存储于: " . $path . $file["name"];
        return $path.$file["name"];
    }
    }
else
    {
    echo "文件不符合要求";
    return false;
    }
}




?>