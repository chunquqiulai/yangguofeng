<?php

include './lib/DbUtil.php';

$dbConnection = DbUtil::getInstance();

if ($dbConnection) {
    $query = $dbConnection->query('select * from yangguofeng_category  where pid<>0  order by sort');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $menus = $query->fetchAll();


    $query = $dbConnection->prepare('select password from yangguofeng_user where id=1');
    $query->execute();
    $password = $query->fetch(PDO::FETCH_ASSOC);
    if (isset($_GET['pwd']) && $password['password'] == md5($_GET['pwd'])) {
        if ($_POST) {
            $_POST['description'] = $_POST['description'] ? $_POST['description'] : mb_substr(strip_tags(htmlspecialchars_decode($_POST['content'])), 0, 700);

            $sth = $dbConnection->prepare('UPDATE yangguofeng_article SET title=:title,description=:description,content=:content,status=:status,updatetime=:updatetime where id=:id');
            $sth->bindParam(':title', $_POST['title'], PDO::PARAM_STR, 100);
            $sth->bindParam(':description', $_POST['description'], PDO::PARAM_STR, 255);
            $sth->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
            $sth->bindParam(':updatetime', $_SERVER['REQUEST_TIME']);
            $sth->bindParam(':status', $_POST['status'], PDO::PARAM_INT);
            $sth->bindParam(':id', $_GET['articleid']);
            $ret = $sth->execute();
            header('Location: /article.php?articleid=' . $_GET['articleid']);
        } else {
            $query = $dbConnection->prepare('select  * from yangguofeng_article where id=?');
            $query->execute([$_GET['articleid']]);
            $article = $query->fetch(PDO::FETCH_ASSOC);
            if (false == $article) {
                include('tpl/error.tpl.php');
            } else {
                include('tpl/update.tpl.php');
            }
        }
    } else {
        include('tpl/error.tpl.php');
    }
} else {
    echo "<center><h1>杨国锋正在修理中...联系方式email：514074752@qq.com</h1></certer>";
}

