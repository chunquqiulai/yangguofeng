<?php

include '/lib/DbUtil.php';

$dbConnection = DbUtil::getInstance();
var_dump($dbConnection);
$rs = $dbConnection->query('select * from yangguofeng_category order by sort');
$rs->setFetchMode(PDO::FETCH_ASSOC);
$result_arr = $rs->fetchAll();
print_r($result_arr);
exit;

$link = mysql_connect(SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS); //官方提供的常量
if ($link) {
    $db = mysql_select_db(SAE_MYSQL_DB, $link);
    $query = mysql_query("select id,name from yangguofeng_category order by sort", $link);


    $menus = array();
    while ($row = mysql_fetch_assoc($query)) {
        $menus[] = $row;
    }

    mysql_free_result($query);

    include('tpl/index.tpl.php');
} else {
    echo "<center>杨国锋正在修理中...</certer>";
}
mysql_close($link);
