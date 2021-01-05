<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>alter_info</title>
</head>

<body>

<?php

    include "mysql.php";

    $uid = $_SESSION['uid'];

    $new_nickname = $_POST['new_nickname'];
    $new_email = $_POST['new_email'];
    $new_major = $_POST['new_major'];
    $new_habit = $_POST['new_habit'];
    $new_sex = $_POST['new_sex'];
    $new_introduce = $_POST['new_introduce'];

    $sql = "UPDATE userlist SET nickname = '$new_nickname', email = '$new_email', major = '$new_major' , habit = '$new_habit' , introduce = '$new_introduce' ,sex = '$new_sex'
                WHERE uid = '$uid';";

    $result = $db->query($sql);

    if ($result) {

        $_SESSION['email'] = $new_email;
        $_SESSION['nickname'] = $new_nickname;
        $_SESSION['major'] = $new_major;
        $_SESSION['habit'] = $new_habit;
        $_SESSION['sex'] = $new_sex;
        $_SESSION['introduce'] = $new_introduce;

        exit('<script>alert("信息修改成功");window.location.href="userinfo.php"</script>');
    } else {
        exit('<script>alert("信息修改失败");history.back();</script>');
    }
?>

</body>
</html>