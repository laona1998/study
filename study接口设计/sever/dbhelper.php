<?php
////1、配置参数
//$pd0 = array(
//    'dsn' => 'mysql:host=localhost;dbname=ajax_practice;port=3316;charset=utf8',
//    'username' => 'root',
//    'password' => '',
//);
////连接属性
//$options = array(
//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //默认是PDO::ERRMODE_SILENT, 0, (忽略错误模式)
//    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 默认是PDO::FETCH_BOTH, 4
//);
//
////2、连接数据库
//try {
//    $pdo = new PDO($pd0['dsn'], $pd0['username'], $pd0['password'], $options);
//} catch (PDOException $e) {
//    die('数据库连接失败:' . $e->getMessage());
//}
class DB
{
    static private $_instance;
    private $_pdo;
    private $config = [
        'dsn' => 'mysql:host=localhost;dbname=ajax_practice;port=3316;charset=utf8',
        'username' => 'root',
        'password' => '',
        'options'  => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //默认是PDO::ERRMODE_SILENT, 0, (忽略错误模式)
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 默认是PDO::FETCH_BOTH, 4
        ]
    ];

    private function __construct()
    {

    }

    static public function getInstance()
    {
        if (! self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function connect()
    {
        if (!$this->_pdo){
            try{
                $this->_pdo = new PDO($this->config['dsn'], $this->config['username'], $this->config['password'], $this->config['options']);
            }catch(PDOException $e){
                die('数据库连接失败:' . $e->getMessage());
            }
        }
        return $this->_pdo;
    }
}