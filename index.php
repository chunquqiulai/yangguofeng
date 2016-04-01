<?php

include './lib/DbUtil.php';

$dbConnection = DbUtil::getInstance();

if ($dbConnection) {
    $query = $dbConnection->query('select * from yangguofeng_category where pid=0 order by sort');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $menus = $query->fetchAll();

    $query = $dbConnection->prepare('select id,title,description,inputtime 
                 from yangguofeng_article a join yangguofeng_article_count ac on a.id = ac.articleid order by a.id desc');
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);

    include('tpl/index.tpl.php');
} else {
    echo "<center>杨国锋正在修理中...</certer>";
}

