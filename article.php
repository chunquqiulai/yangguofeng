<?php

include './lib/DbUtil.php';

$dbConnection = DbUtil::getInstance();

if ($dbConnection) {
    $query = $dbConnection->query('select * from yangguofeng_category  where pid=0 order by sort');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $menus = $query->fetchAll();


    $query = $dbConnection->prepare('select  * from yangguofeng_article where id=?');
    $query->execute([$_GET['articleid']]);
    if ($article = $query->fetch()) {
        $query = $dbConnection->prepare('select description from yangguofeng_category where id=?');
        $query->execute([$article['catid']]);
        $category = $query->fetch();

        $dbConnection->query("update yangguofeng_article_count set hits=hits+1 where articleid=".$_GET['articleid']);
        include('tpl/article.tpl.php');
    } else {
        include('tpl/error.tpl.php');
    }
} else {
    echo "<center><h1>杨国锋正在修理中...联系方式email：514074752@qq.com</h1></certer>";
}
