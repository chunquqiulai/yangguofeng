<?php

$link = mysql_connect(SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS); //官方提供的常量
if ($link) {
    $db = mysql_select_db(SAE_MYSQL_DB, $link);
    $query = mysql_query("select id,name from yangguofeng_category order by sort", $link);
    $menus = array();
    while ($row = mysql_fetch_assoc($query)) {
        $menus[] = $row;
    }
    mysql_free_result($query);

    $sql = 'select  * from yangguofeng_article where id=' . $_GET['articleid'];
    $query = mysql_query($sql, $link);
    if ($query) {
        $article = mysql_fetch_assoc($query);
       
        $sql = 'update yangguofeng_article_count set hits=hits+1 where articleid=' . $_GET['articleid'];
    	mysql_query($sql, $link);
        
		include('tpl/article.tpl.php');
    } else {
        include('tpl/error.tpl.php');
    }
} else {
    echo "<center><h1>杨国锋正在修理中...联系方式email：514074752@qq.com</h1></certer>";
}

mysql_close($link);
