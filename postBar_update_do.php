<?php
require_once('mysql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>文章修改</title>
</head>

<body>
<?php
$title = $_POST['title'];
$content = $_POST['content'];
$aid = $_POST['aid'];
if (!$title) {
    exit('<script>alert("请输入标题");history.back();</script>');
}
if (!$content) {
    exit('<script>alert("请输入内容");history.back();</script>');
}
$sql = "update articlelist set title= '" . $title . "' , content = '" . $content . "' 
        where aid = " . $aid . " and uid = " . $_SESSION['uid'];
$query = $db->query($sql);
if ($query) {
    exit('<script>alert("编辑成功");window.history.go(-2);</script>');
} else {
    exit('<script>alert("编辑失败");history.back();</script>');
}
?>
</body>
</html>

