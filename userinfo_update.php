<?php
require_once('mysql.php');
if (!$_SESSION['username']) {
    exit('<script>alert("当前用户未登录");window.location.href="login.php"</script>');
}
?>

<html>
    <head>
      <meta charset="utf-8" />
      <title>CQUPT Make Friend Post Bar</title>
      <script src="scripts/modernizr-1.6.min.js"></script>
      <link rel="stylesheet" media="screen" href="css/basic.css" />
      <style>
        input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: #45a049;
        }

        article div {
        float:
        border-rad us: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        width: 400px
        }
    </style>
    </head>
    <body>

    <header>
        <div>
          <img src="img/blog_header.png" alt="blog_log"  width="350px" height="250px">
          <div style="float: right;width: 550px; height:250px;">
            <h1 style="position: relative; top: 40%; right: 40%; color:#336699;">CQUPT Make Friend Post Bar </h1>
          </div>
        </div>
        <div>
          <nav>
            <ul>
              <li><a href="home.php">Home</a></li>
              <li><a href="postBar.php">Post Bar</a></li>
              <li><a href="video.php">Have a fun</a></li>
              <li><a href="userinfo.php">User Information</a></li>
            </ul>
          </nav>
       </div>
      </header>


<?php
    $sql = "select * from userList where uid=" . $_SESSION['uid'];
    $info = $db->getRow($sql);
    if (!$info) {
        exit('<script>alert("参数错误");history.back();</script>');
    }
?>

    <article>
        <div align="center">
            <form action="userinfo_update_do.php" method="post" enctype="multipart/form-data">
                <h5>Nickname: </h5>
                <input type="text" id="textbox" name="new_nickname"></textarea><br>
                <h5>Email: </h5>
                <input type="text" id="textbox" name="new_email"></textarea><br>
                <h5>Major: </h5>
                <input type="text" id="textbox" name="new_major"></textarea><br>
                <h5>Habit: </h5>
                <input type="text" id="textbox" name="new_habit"></textarea><br>
                <h5>Sex: </h5>
                    <select id="textbox" name="new_sex">
                        <option value="boy">boy</option>
                        <option value="girl">girl</option>
                    </select>
                <h5>Introduce: </h5>
                <textarea type="text" id="textbox" name="new_introduce" style="border:3;border-radius:5px;background-color:rgba(241,241,241,.98);width: 355px;height: 100px;padding: 10px;resize: none";><?php echo $info['introduce']; ?></textarea>
                <br>
                <input type="hidden" id="uid" name="uid" value=<?php echo $_SESSION['uid'] ?>>
                <input type="submit" name="submit" id="submit" value="确定">
            </form>
        </div>
    </article>

      <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
      <script>
        L2Dwidget.init({
          "model": { "jsonPath":"https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json", "scale": 1, "hHeadPos":0.5, "vHeadPos":0.618 },
          "display": { "position": "right", "width": 400, "height": 400, "hOffset": 0, "vOffset": 0 },
          "mobile": { "show": true, "scale": 0.5 },
          "react": { "opacityDefault": 0.7, "opacityOnHover": 0.2 }
        });
      </script>
</body>
</html>