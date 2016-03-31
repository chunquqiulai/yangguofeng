<?php

/**
 * Description of DbUtil
 *
 * @author yangguofeng
 */
class DbUtil {

    private static $instance;

    private function __construct() {
        $serverName = ToolsUtil::env("MYSQL_PORT_3306_TCP_ADDR", "localhost");
        $databaseName = ToolsUtil::env("MYSQL_INSTANCE_NAME", "homestead");
        $username = ToolsUtil::env("MYSQL_USERNAME", "homestead");
        $password = ToolsUtil::env("MYSQL_PASSWORD", "secret");
        self::$instance = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);
    }

    private function __clone() {
        
    }

    public static function getInstance() {
        if (self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}
