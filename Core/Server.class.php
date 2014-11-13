<?php
/**
 * Server Class
 * @author ruansheng
 */
class Server{
	
	/**
	 * Socket handler
	 * @var resource
	 */
	private static $handler='';
	
	/**
	 * Config 
	 * @var array
	 */
	private static $config=array();
	
	/**
	 * Welcome UI
	 */
	public function welcome(){
		echo '-------------------------------'.PHP_EOL;
		echo '|      Welcome to IM           |'.PHP_EOL;
		echo '|  The server is running ....  |'.PHP_EOL;
		echo '-------------------------------'.PHP_EOL;
	}
	
	/**
	 * run server
	 */
	public static function run(){
		self::welcome();
		self::createSocket();
		self::loop();
	}
	
	public static function loop(){
		$count = 0;
		do {
			if (($msgsock = socket_accept(self::$handler)) < 0) {
				echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n";
				break;
			} else {
				//�����ͻ���
				$msg ="���Գɹ���\n";
				socket_write($msgsock, $msg, strlen($msg));
		
				echo "���Գɹ��˰�\n";
				$buf = socket_read($msgsock,8192);
		
				$talkback = "�յ�����Ϣ:$buf\n";
				echo $talkback;
		
				if(++$count >= 5){
					break;
				}
			}
			socket_close($msgsock);
		} while (true);
			
		socket_close(self::$handler);
	}
	
	public function createSocket(){
		Global $config;
		self::$config=$config;
		$ip=self::$config['SERVER_ADDRESS'];
		$port=self::$config['SERVER_PORT'];
		if(($sock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) < 0) {
			echo "socket_create() ʧ�ܵ�ԭ����:".socket_strerror($sock)."\n";
		}
		
		if(($ret = socket_bind($sock,$ip,$port)) < 0) {
			echo "socket_bind() ʧ�ܵ�ԭ����:".socket_strerror($ret)."\n";
		}
		if(($ret = socket_listen($sock,4)) < 0) {
			echo "socket_listen() ʧ�ܵ�ԭ����:".socket_strerror($ret)."\n";
		}
		
		self::$handler=$sock;
	}
}