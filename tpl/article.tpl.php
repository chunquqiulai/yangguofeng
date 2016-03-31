<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="杨国锋的记事本,GO,PHP,SQL,C/C++,JAVA,LINUX,HTML/CSS/JAVASCRIPT/JSON...">
        <meta name="description" content="杨国锋的记事本_<?php echo $category['description']; ?>">
        <meta name="author" content="杨国锋" />
        <link rel="stylesheet" href="/static/css/index.css" media="all" />
        <title>杨国锋的记事本</title>

    </head>
    <body>
        <header>
            <div class="menu">
                <?php foreach ($menus as $key => $menu) { ?>
                    <a href="list.php?catid=<?php echo $menu['id'] ?>">
                        <h2 <?php echo $menu['id'] == $_GET['catid'] || 3 == $menu['catid'] ? '' : "class='cur'"; ?>><?php echo $menu['name']; ?></h2>
                    </a>
                <?php } ?>
            </div>
        </header>
        <section class="list">
                    <h1><?php echo $article['title'] ?></h1>
                    <article><?php echo $article['content'] ?>
            </article>    
        </section>

    </body>
</html>