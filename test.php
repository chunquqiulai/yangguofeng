<?php
echo 23456;
$serverName =   env("MYSQL_PORT_3306_TCP_ADDR", "localhost");
$databaseName = env("MYSQL_INSTANCE_NAME", "homestead");
$username =     env("MYSQL_USERNAME", "homestead");
$password =     env("MYSQL_PASSWORD", "secret");

/**
 * 获取环境变量
 * @param $key
 * @param null $default
 * @return null|string
 */
function env($key, $default = null)
{
    $value = getenv($key);
    if ($value === false) {
        return $default;
    }
    return $value;
}

var_dump($serverName);

$pdo = new PDO($serverName, $username, $password);
var_dump($pdo);
echo 'end';