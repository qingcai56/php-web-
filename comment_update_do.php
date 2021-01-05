<?php
require_once('mysql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>留言修改</title>
</head>

<body>
<?php
$comment = $_POST['comment'];
$rid = $_POST['rid'];
if (!$comment) {
    exit('<script>alert("请输入留言");history.back();</script>');
}
$sql = "update replyList set comment= '" . $comment . "' where rid = " . $rid . " and uid = " . $_SESSION['uid'];
$query = $db->query($sql);
if ($query) {
    exit('<script>alert("编辑成功");window.history.go(-2);</script>');
} else {
    exit('<script>alert("编辑失败");history.back();</script>');
}
?>
</body>
</html>

