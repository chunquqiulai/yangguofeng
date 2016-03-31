<?php

include 'ToolsUtil.php';

/**
 * Description of DbUtil
 *
 * @author yangguofeng
 */
class DbUtil {

    private static $instance;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    public static function getInstance() {
        if (false == self::$instance || self::$instance instanceof self) {
            $serverName = ToolsUtil::env("MYSQL_PORT_3306_TCP_ADDR", "127.0.0.1");
            $databaseName = ToolsUtil::env("MYSQL_INSTANCE_NAME", "yangguofeng");
            $username = ToolsUtil::env("MYSQL_USERNAME", "root");
            $password = ToolsUtil::env("MYSQL_PASSWORD", "");
            self::$instance = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);
        }
        self::$instance->exec('set names utf8');
        return self::$instance;
    }

}
