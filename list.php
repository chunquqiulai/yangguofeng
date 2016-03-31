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

   
        $query = mysql_query("select description from yangguofeng_category where id=" . $_GET['catid'], $link);
 
    
    if ($query) {
        $category = mysql_fetch_assoc($query);
        mysql_free_result($query);

         	 if(isset($_GET['catid']) && 3 <> $_GET['catid']){
        		 $query = mysql_query("select id,title,description,inputtime from yangguofeng_article where catid=" . $_GET['catid'], $link);
             }else{
                 $query = mysql_query("select id,title,description,inputtime 
                 from yangguofeng_article a join yangguofeng_article_count ac on a.id = ac.articleid order by ac.hits desc",$link);
             }
        $articles = array();
        while ($row = mysql_fetch_assoc($query)) {
            $articles[] = $row;
        }
        mysql_free_result($query);


        include('tpl/list.tpl.php');
    } else {
        include('tpl/error.tpl.php');
    }
} else {
    echo "<center><h1>杨国锋正在修理中...联系方式email：514074752@qq.com</h1></certer>";
}

mysql_close($link);
