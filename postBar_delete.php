<?php
require_once('mysql.php');
if (!$_SESSION['username']) {
    exit('<script>alert("当前用户未登录");window.location.href="login.php"</script>');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>留言</title>
    <style>
        #comment {
            width: 500px;
            height: 200px
        }
    </style>
</head>
<body>
<?php
$aid = intval($_GET['aid']);
$sql1 = "delete from articlelist where aid=" . $aid . " and uid = " . $_SESSION['uid'];
$sql2 = "delete from replyList where aid=" . $aid;  # 回复也删除
$info1 = $db->query($sql1);
$info2 = $db->query($sql2);
if ($info1 && $info2) {
    exit('<script> alert("删除成功");window.history.back(-1);</script>');
}
?>
</body>
</html>