<?php
class Socket{
	
	/**
	 * Config
	 * @var array
	 */
	private static $config=array();
	
	/**
	 * 创建socket
	 */
	public static function createSocket(){
		Global $config;
		self::$config=$config;
		$ip=self::$config['SERVER_ADDRESS'];
		$port=self::$config['SERVER_PORT'];
		if(($sock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) < 0) {
			Log::write("socket_create() fail reason:".socket_strerror($sock));
		}
	
		if(($ret = socket_bind($sock,$ip,$port)) < 0) {
			Log::write("socket_bind() fail reason:".socket_strerror($ret));
		}
		if(($ret = socket_listen($sock,4)) < 0) {
			Log::write("socket_listen() fail reason:".socket_strerror($ret));
		}
	
		return $sock;
	}
	
	/**
	 * 接收内容
	 */
	public static function receiveSocketContent($msgsock){
		$buf = socket_read($msgsock,8192);
	}
	
	/**
	 * 发送内容
	 */
	public static function sendSocketContent($msgsock,$msg){
		socket_write($msgsock, $msg, strlen($msg));
	}
	
	/**
	 * 关闭Socket
	 * @param mixed $handler
	 */
	public static function closeSocketConnect($msgsock){
		socket_close($msgsock);
	}
	
	/**
	 * 关闭Socket Server
	 * @param mixed $handler
	 */
	public static function closeSocketServer($handler){
		socket_close($handler);
	}
	
}