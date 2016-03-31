<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8" />
    <meta name="keywords" content="杨国锋的记事本,GO,PHP,SQL,C/C++,JAVA,LINUX,HTML/CSS/JAVASCRIPT/JSON...">
    <meta name="description" content="杨国锋的记事本_<?php echo $category['description'];?>">
<meta name="author" content="杨国锋" />
    <link rel="stylesheet" href="/static/css/index.css" media="all" />
<title>杨国锋的记事本</title>

</head>
    <body>
        <form action="/update.php?pwd=<?php echo $_GET['pwd'].'&articleid='.$_GET['articleid'];?>" method="post">
            <p>title:<input type="text" name="title" value="<?php echo $article['title']?>"></p>
            <p>category:<select name="catid">
                 <?php foreach($menus as $key=>$menu){ ?>
                <option value="<?php echo $menu['id']?>"
                <?php if($menu['id']==$article['catid']){ echo 'selected';}?>
                ><?php echo $menu['name'];?></option>
                <?php }?>
                </select></p>
            <p>description:<textarea rows="5" cols="100" name="description"><?php echo $article['description']?></textarea></p>
            <p>content:<textarea rows="30" cols="150" name="content"><?php echo $article['content']?></textarea></p>
            <p><input type="submit" value="submit"></p>
        </form>
    </body>
</html>