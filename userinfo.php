
<?php

    include "mysql.php";

    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];
    $nickname = $_SESSION['nickname'];
    $email = $_SESSION['email']; 
    $major = $_SESSION['major'];   
    $habit = $_SESSION['habit'];   
    $sex = $_SESSION['sex'];   
    $introduce = $_SESSION['introduce'];   

?>


<html>
    <head>
      <meta charset="utf-8" />
      <title>CQUPT Make Friend Post Bar</title>
      <script src="scripts/modernizr-1.6.min.js"></script>
      <link rel="stylesheet" media="screen" href="css/basic.css" />
      <style>
        td {
            background-color: #336699;
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
                <li><a href="quit.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        </header>
        <article>
            <center>
            <h1>个人信息</h1>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><?php echo $username ?></td>
                </tr>
                <tr>
                    <td>Nikname: </td>
                    <td><?php echo $nickname ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $email ?></td>
                </tr>
                <tr>
                    <td>Major:</td>
                    <td><?php echo $major ?></td>
                </tr>
                <tr>
                    <td>Habit: </td>
                    <td><?php echo $habit ?></td>
                </tr>
                <tr>
                    <td>Sex:  </td>
                    <td><?php echo $sex ?></td>
                </tr>
                <tr>
                    <td>Introduce: </td>
                    <td> <?php echo $introduce ?></td>
                </tr>
            </table>
            <br>
            <br>
            <hr>
               
            <a href="userinfo_update.php">修改信息</a><br>
            <a href="postBar.php">返回</a>
            </center>
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