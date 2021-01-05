<?php
require_once('mysql.php');
if (!$_SESSION['username']) {
    exit('<script>alert("当前用户未登录");window.location.href="login.php"</script>');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
    <meta charset="utf-8" />
        <title>Post Bar</title>
        <!-- <script src="scripts/modernizr-1.6.min.js"></script> -->
        <link rel="stylesheet" media="screen" href="css/basic.css" />
        <style>
         input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            width:300px;
            cursor: pointer;
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
            <p>用户:<?php echo $_SESSION['nickname'] ?></p>
            <a href="home.php">关于本网站</a>
            <a href="quit.php">退出登录</a>
            <div align="center">
                <h1>帖子内容
                    <h1>
                        <table width="1000px" border="1">
                            <tr>
                                <td width="100">用户名</td>
                                <td width="400">留言内容</td>
                            </tr>
                            <?php
                            $pagesize = 5;  # 页面大小
                            $p = 1;  # 当前页面
                            $offset = ($p - 1) * $pagesize;  # 页面指针
                            $pattern = '/\d+/';
                            preg_match_all($pattern, $_SERVER["QUERY_STRING"], $_SESSION['aid']);
            //                $aid = $_SERVER["QUERY_STRING"];
                            # 查询本页显示的数据
                            $sql = "select * from replyList where 
                            replyList.aid=".implode($_SESSION['aid'][0]) ." order by replyList.addtime desc limit $offset,$pagesize";
            //                echo $_SERVER["QUERY_STRING"];
            //                print(str$aid[0]);
            //                print_r($_SESSION['aid'][0]);
                            $list = $db->getRows($sql);
                            foreach ($list as $k => $one) {
                                ?>
                                <tr>  <!-- 表格 -->
                                    <td>
                                        <?php echo $one['nickname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $one['comment']; ?>
                                        <div style="text-align:right;">
                                            <?php echo date("Y-m-d H:i:s", $one['addtime']);
                                            ?>
                                            <?php
                                            if ($one['uid'] == $_SESSION['uid']) {
                                                ?>
                                                <a href="comment_update.php?rid=<?php echo $one['rid'] ?>">编辑</a>
                                                <a href="comment_delete.php?rid=<?php echo $one['rid'] ?>">删除</a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
            </div>
            <div align="center">
                <?php
                # 分页代码
                # 计算留言总数
                $sql = "select count(*) as count from replyList where replyList.aid=".implode($_SESSION['aid'][0])."";
                $lists = $db->getRows($sql);
                $lists = $lists[0];
                # 计算总页数
                $pagenum = ceil($lists['count'] / $pagesize);
                echo '共', $lists['count'], '条留言 ';
                echo '<a href="postBar.php">返回</a>';
                echo '<br>';
                echo '<a href="comment.php?p=1">首页</a>';
                echo '  ';
                echo '<a href="comment.php?p=', $p == 1 ? 1 : ($p - 1), '">上一页</a>';
                echo '  ';
                # 循环输出个页数及链接
                if ($pagenum >= 1) {
                    for ($i = 1; $i <= $pagenum; $i++) {
                        if ($i == $p) {
                            echo '[', $i, ']';
                            echo '  ';
                        } else {
                            echo ' <a href="comment.php?p=', $i, '">', $i, '</a>';  # p = i
                            echo '  ';
                        }
                    }
                }
                echo '<a href="comment.php?p=', $p == $pagenum ? $pagenum : ($p + 1), '">下一页</a>';  # 避免超出页数范围
                echo '  ';
                echo '<a href="comment.php?p=', $pagenum, '">尾页</a>';
                ?>
            </div>
            <div align="center">
                <form action="comment_add.php" method="post" enctype="multipart/form-data">
                    <div>
                        <textarea type="text" id="comment" name="comment" style="border:3;border-radius:5px;background-color:rgba(241,241,241,.98);width: 455px;height: 100px;padding: 10px;resize: none"; placeholder="友善的评论是交流的起点"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="submit" id="submit" value="发表">
                    </div>
                  
                </form>
            </div>
        </article>
            <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
            <script>
                L2Dwidget.init({
                "model": { "jsonPath":"https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json", "scale": 1, "hHeadPos":0.5, "vHeadPos":0.618 },
                "display": { "position": "right", "width": 200, "height": 200, "hOffset": 0, "vOffset": 0 },
                "mobile": { "show": true, "scale": 0.5 },
                "react": { "opacityDefault": 0.7, "opacityOnHover": 0.2 }
                });
            </script>
    </body>
</html>