<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="GO、PHP、SQL、Mysql、ORACLE、mongodb、redis、C/C++、JAVA、LINUX、Nginx、Apache、SHELL、hadoop、Storm、Kafka、Zookeeper、Spark、JAVASCRIPT、HTML/CSS...">
        <meta name="description" content="<?php echo $article['description']; ?>">
        <meta name="author" content="杨国锋" />
        <link rel="stylesheet" href="/static/css/index.css" media="all" />
        <title><?php echo $article['title']; ?>-杨国锋</title>
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
        <section class="article">
            <h4><?php echo $article['title'] ?></h4>
            <article><?php echo $article['content'] ?>
            </article>    
        </section>

    </body>
</html>