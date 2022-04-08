<?php
function inc()
{
    include "./incs/class_db.php";
}
inc();
$dblib = new dblib();

$post_id = intval($_GET["id"]);

$sql = "SELECT title,content,image FROM posts WHERE post_id = $post_id";
$data = $dblib->get_list($sql);

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php" type="button"> Trang chủ</a>
    <?php
    for ($i = 0; $data != 0 && $i < count($data); $i++) {

    ?>
    <h1><?php echo $data[$i]["title"]; ?></h1>
    <td><img src="./images/<?php echo $data[$i]["image"]; ?>" width="1000px" height="500px"></td>
    <h4><?php echo $data[$i]["content"]; ?></h4>
    <?php
    }
    ?>

</html>