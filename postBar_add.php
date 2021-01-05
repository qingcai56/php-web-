<?php
require_once('mysql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>留言添加</title>
</head>

<body>
<?php
$title = $_POST['title'];
$content = $_POST['content'];
if (!$title) {
    exit('<script>alert("请输入标题");history.back();</script>');
}
$sql = "insert into articleList(uid,title,addtime,content)
        values('" . $_SESSION['uid'] . "','" . $title . "','" . time() . "','" . $content . "')";
$query = $db->query($sql);
if ($query) {
    exit('<script>alert("发表成功");history.back();</script>');
} else {
    exit('<script>alert("发表失败");history.back();</script>');
}
?>
</body>
</html>

