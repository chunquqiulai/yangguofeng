<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="GO、PHP、SQL、Mysql、ORACLE、mongodb、redis、C/C++、JAVA、LINUX、Nginx、Apache、SHELL、hadoop、Storm、Kafka、Zookeeper、Spark、JAVASCRIPT、HTML/CSS...">
        <meta name="description" content="杨国锋,GO,PHP,SQL,C/C++,JAVA,LINUX,HTML/CSS/JAVASCRIPT/JSON...">
        <meta name="author" content="杨国锋" />
        <link rel="stylesheet" href="/static/css/index.css" media="all" />
        <title>杨国锋</title>
    </head>
    <body>
        <header>
            <div class="menu">
                <?php foreach ($menus as $key => $menu) { ?>
                    <a href="list.php?catid=<?php echo $menu['id'] ?>">
                        <?php echo $menu['name']; ?>
                    </a>
                <?php } ?>
            </div>
        </header>
        <ol class="list">
            <?php foreach ($articles as $key => $article) { ?>
                <li onclick="window.location.href = '/article.php?articleid=<?php echo $article['id']; ?>'"> 
                    <h4><?php echo $article['title'] ?></h4>
                    <p><?php echo $article['description'] ?></p>
                </li>
            <?php } ?>
        </ol>

    </body>
</html>