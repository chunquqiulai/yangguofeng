<?php
//http://1.yangguofeng.applinzi.com/update.php?articleid=13&pwd=yangguofeng

$link = mysql_connect(SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS); //官方提供的常量
if ($link) {
    $db = mysql_select_db(SAE_MYSQL_DB, $link);
    $query = mysql_query("select id,name from yangguofeng_category order by sort", $link);
    $menus = array();
    while ($row = mysql_fetch_assoc($query)) {
        $menus[] = $row;
    }
    mysql_free_result($query);

    
     if (isset($_GET['pwd']) && 'yangguofeng' == $_GET['pwd'] && is_numeric($_GET['articleid'])) {
            
            if ($_POST) {
               
                $_POST['description'] = $_POST['description']?$_POST['description']:mb_substr(strip_tags(htmlspecialchars_decode($_POST['content'])), 0, 700);
                
                
                $sql = 'UPDATE yangguofeng_article SET title="'.$_POST['title'].'",catid='.$_POST['catid'].',description="'.$_POST['description'].
                    '",content="'.$_POST['content'].'",updatetime='.$_SERVER['REQUEST_TIME'].' where id='.$_GET['articleid'];
                
                $ret = mysql_query($sql);
                 header('Location: /article.php?articleid=14&' . $_POST['catid']);
            } else {
                	$sql = 'select  * from yangguofeng_article where id=' . $_GET['articleid'];
                    $query = mysql_query($sql, $link);
                    if ($query) {
                        $article = mysql_fetch_assoc($query);
                       
                       include('tpl/update.tpl.php');
                    } else {
                        include('tpl/error.tpl.php');
                    }
                
                    
            }
     }else{      
         include('tpl/error.tpl.php');        
     }
} else {
    echo "<center><h1>杨国锋正在修理中...联系方式email：514074752@qq.com</h1></certer>";
}

mysql_close($link);
