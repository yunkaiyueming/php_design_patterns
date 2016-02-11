<?php
	class Mysql{
		//该属性用来保存实例
		private static $conn;

		//构造函数为private,防止创建对象
		private function __construct(){
			$this->conn = mysql_connect('localhost','root','');
		}

		//创建一个用来实例化对象的方法
		public static function getInstance(){
			if(!(self::$conn instanceof self)){
				self::$conn = new self;
			}
			return self::$conn;
		}

		//防止对象被复制
		public function __clone(){
			trigger_error('Clone is not allowed !');
		}
		
	}
    
	//只能这样取得实例，不能new 和 clone
	$mysql = Mysql::getInstance();
?>