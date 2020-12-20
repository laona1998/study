<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2020/11/25
 * Time: 9:27
 */

//单例模式：确保所有对象都访问唯一实例。

class DB
{
        static private $_instance;   //创建静态私有的变量保存该类对象
        private $_pdo;//参数
        private $config = [
            'dsn' => 'mysql:host=localhost;dbname=myplatform2;port=3306;charset=utf8',
            'username' => 'root',
            'password' => 'root',
            'options'  => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //默认是PDO::ERRMODE_SILENT, 0, (忽略错误模式)
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 默认是PDO::FETCH_BOTH, 4
            ]
        ];

//构造函数
        private function __construct()
        {

        }


        static public function getInstance()
        {
            //判断$instance是否有对象
            //没有则创建

            //1.确保只链接一个数据库
            if (! self::$_instance instanceof self) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }


        public function connect()
        {
            //判断是否有pdo对象，没有则创建

            //2.确保pdo只有一个
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
