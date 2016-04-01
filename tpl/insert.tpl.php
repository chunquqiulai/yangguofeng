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
        <form action="/insert.php?pwd=<?php echo false ==$_GET['pwd']?'':$_GET['pwd'] ?>" method="post">
            <p>title:<input type="text" name="title"></p>
            <p>category:<select name="catid">
                 <?php foreach($menus as $key=>$menu){ ?>
                <option value="<?php echo $menu['id']?>"><?php echo $menu['name'];?></option>
                <?php }?>
                </select></p>
            <p>description:<textarea rows="5" cols="100" name="description"></textarea></p>
            <p>content:<textarea  rows="30" cols="150" name="content"></textarea></p>
            <p><input type="submit" value="submit"></p>
        </form>
    </body>
</html>