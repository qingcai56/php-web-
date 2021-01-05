<?php
require_once('mysql.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>register </title>
</head>

<body>
<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];

    if (!$username) {
        exit('<script>alert("请输入用户名");history.back();</script>');
    } else
        if (!$password) {
            exit('<script>alert("请输入密码");history.back();</script>');
        } elseif (!$repassword) {
            exit('<script>alert("请输入密码");history.back();</script>');
        } elseif ($repassword != $password) {
            exit('<script>alert("两次输入密码不一致");history.back();</script>');
        } elseif (!$nickname) {
            exit('<script>alert("请输入昵称");history.back();</script>');
        }

    $sql = "select * from userlist where username = '" . $username . "'";
    $userinfo = $db->getRow($sql);
    if ($userinfo) {
        exit('<script>alert("用户名已存在");history.back();</script>');
    }

    $sql = "insert into userlist(username,password,nickname,regtime,email)
            values('" . $username . "','" . $password . "','" . $nickname . "','" . time() . "','" . $email . "')";
    $query = $db->query($sql);
    if ($query) {
        exit('<script>alert("注册成功,请登录");window.location.href="login.php"</script>');
    } else {
        exit('<script>alert("注册失败");history.back();</script>');
    }
?>
</body>
</html>

