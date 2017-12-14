<?php
$dbms='mysql';     //数据库类型
$host='mysql'; //数据库主机名
$dbName='test';    //使用的数据库
$user='dev';      //数据库连接用户名
$pass='dev';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";

echo "test for pdo_mysql<br/>";
try {
    $pdo = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";
    $row = [
            'wechat_id' => 1,
            'lxg_id' => 100,
            'mtime' => 2,
            'ctime' => 3
                ];
    $sql = "INSERT INTO wechat_to_lxg SET wechat_id=:wechat_id, lxg_id=:lxg_id, mtime=:mtime, ctime=:ctime;";
    $succ = $pdo->prepare($sql)->execute($row);

    if ($succ) {
        echo "execute succ, sql=$sql<br/>";
    } else {
        echo "execute fail,  sql=$sql<br/>";
    }
     
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
//默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：
//$db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
