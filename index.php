<?php

include './lib/DbUtil.php';

$dbConnection = DbUtil::getInstance();    

if ($dbConnection) {
    $query = $dbConnection->query('select * from yangguofeng_category order by sort');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $menus = $query->fetchAll();

    include('tpl/index.tpl.php');
} else {
    echo "<center>杨国锋正在修理中...</certer>";
}

