<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="GO、PHP、SQL、Mysql、ORACLE、mongodb、redis、C/C++、JAVA、LINUX、Nginx、Apache、SHELL、hadoop、Storm、Kafka、Zookeeper、Spark、JAVASCRIPT、HTML/CSS...">
        <meta name="description" content="GO、PHP、SQL、Mysql、ORACLE、mongodb、redis、C/C++、JAVA、LINUX、Nginx、Apache、SHELL、hadoop、Storm、Kafka、Zookeeper、Spark、JAVASCRIPT、HTML/CSS...">
        <meta name="author" content="杨国锋" />
        <link rel="stylesheet" href="/static/css/index.css" media="all" />
        <title>杨国锋</title>
    </head>
    <body>
        <form action="/update.php?pwd=<?php echo $_GET['pwd'] . '&articleid=' . $_GET['articleid']; ?>" method="post">
            <p>title:<input type="text" name="title" value="<?php echo $article['title'] ?>"></p>
            <p>category:<select name="catid">
                    <?php foreach ($menus as $key => $menu) { ?>
                        <option value="<?php echo $menu['id'] ?>"
                        <?php
                        if ($menu['id'] == $article['catid']) {
                            echo 'selected';
                        }
                        ?>
                                ><?php echo $menu['name']; ?></option>
                            <?php } ?>
                </select></p>
            <p>description:<textarea rows="5" cols="100" name="description"><?php echo $article['description'] ?></textarea></p>
            <p>content:<textarea rows="30" cols="150" name="content"><?php echo $article['content'] ?></textarea></p>
            <p>权限设置:
                <select name="status">
                    <option value="1">大家可见</option>
                    <option value="2">自己可见</option>
                </select>
            </p>
            <p><input type="submit" value="submit"></p>
        </form>
    </body>
</html>