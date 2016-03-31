<?php
//http://1.yangguofeng.applinzi.com/insert.php?pwd=yangguofeng

$link = mysql_connect(SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS); //官方提供的常量
if ($link) {
    $db = mysql_select_db(SAE_MYSQL_DB, $link);
    $query = mysql_query("select id,name from yangguofeng_category order by sort", $link);
    $menus = array();
    while ($row = mysql_fetch_assoc($query)) {
        $menus[] = $row;
    }
    mysql_free_result($query);

    
     if (isset($_GET['pwd']) && 'yangguofeng' == $_GET['pwd']) {
            
            if ($_POST) {
                $_POST['description'] = $_POST['description']?$_POST['description']:mb_substr(strip_tags(htmlspecialchars_decode($_POST['content'])), 0, 700);
                $sql = 'INSERT INTO yangguofeng_article (catid, title, description,content,inputtime) 
        VALUES (' . $_POST['catid'] . ',"' . $_POST['title'] . '","' . $_POST['description'] . '","' . $_POST['content'] . '","' . $_SERVER['REQUEST_TIME'] . '")';
                mysql_query($sql);
                
                
                $sql = 'INSERT INTO yangguofeng_article_count (articleid) VALUES (' . mysql_insert_id() .')';
                mysql_query($sql);
                
                
                 header('Location: /list.php?catid=' . $_POST['catid']);
            } else {
                    include('tpl/insert.tpl.php');
            }
     }else{      
         include('tpl/error.tpl.php');        
     }
} else {
    echo "<center><h1>杨国锋正在修理中...联系方式email：514074752@qq.com</h1></certer>";
}

mysql_close($link);
