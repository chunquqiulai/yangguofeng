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

            $sth = $dbConnection->prepare('INSERT INTO yangguofeng_article (catid, title, description,content,inputtime) 
        VALUES (:catid,:title,:description,:content,:inputtime)');
            $sth->bindParam(':catid', $_POST['catid'], PDO::PARAM_INT);
            $sth->bindParam(':title', $_POST['title'], PDO::PARAM_STR, 100);
            $sth->bindParam(':description', $_POST['description'], PDO::PARAM_STR, 255);
            $sth->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
            $sth->bindParam(':inputtime', $_SERVER['REQUEST_TIME']);
            $ret = $sth->execute();

            if ($ret) {
                $dbConnection->query('INSERT INTO yangguofeng_article_count (articleid) VALUES (' . $dbConnection->lastInsertId() . ')');
                $query = $dbConnection->prepare('select pid from yangguofeng_category where id=' . $_POST['catid']);
                $query->execute();
                $pid = $query->fetch(PDO::FETCH_ASSOC);
                header('Location: /list.php?catid=' . $pid['pid']);
            } else {
                include('tpl/error.tpl.php');
            }
        } else {
            include('tpl/insert.tpl.php');
        }
    } else {
        include('tpl/error.tpl.php');
    }
} else {
    echo "<center><h1>杨国锋正在修理中...联系方式email：514074752@qq.com</h1></certer>";
}

  
    