<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="杨国锋的记事本,GO,PHP,SQL,C/C++,JAVA,LINUX,HTML/CSS/JAVASCRIPT/JSON...">
        <meta name="description" content="杨国锋的记事本">
        <meta name="author" content="杨国锋" />
        <link rel="stylesheet" href="/static/css/index.css" media="all" />
        <title>杨国锋的记事本</title>

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
        <section>
            <center><img src= '../../static/img/404.jpg' /></center>
        </section>
    </body>
</html>