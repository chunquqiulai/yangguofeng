<?php

include './lib/DbUtil.php';

$dbConnection = DbUtil::getInstance();
if ($dbConnection) {
    $query = $dbConnection->query('select * from yangguofeng_category order by sort');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $menus = $query->fetchAll();

    $query = $dbConnection->prepare('select description from yangguofeng_category where id=?');
    $query->execute([$_GET['catid']]);
    if ($category = $query->fetch()) {

        if (isset($_GET['catid']) && 3 <> $_GET['catid']) {
            $query = $dbConnection->prepare('select id,title,description,inputtime from yangguofeng_article where catid=:catid');
            $query->bindParam(':catid', $_GET['catid'], PDO::PARAM_INT);
            $query->execute();
        } else {
            $query = $dbConnection->prepare('select id,title,description,inputtime 
                 from yangguofeng_article a join yangguofeng_article_count ac on a.id = ac.articleid order by ac.hits desc');
        }
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);

        include('tpl/list.tpl.php');
    } else {
        include('tpl/error.tpl.php');
    }
} else {
    echo "<center><h1>杨国锋正在修理中...联系方式email：514074752@qq.com</h1></certer>";
}

