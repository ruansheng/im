<?php
/**
 * Server Class
 * @author ruansheng
 */
class Server{
	
	/**
	 * $handler
	 * @var mixed
	 */
	private static $handler;
	
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
		self::$handler=Socket::createSocket();
		self::loop();
	}
	
	public static function loop(){
		do {
			if (($msgsock = socket_accept(self::$handler)) < 0) {
				echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n";
				break;
			} else {
				//send to client 
			}
			
			Socket::closeSocketConnect($msgsock);
		} while (true);
			
		Socket::closeSocketServer(self::$handler);
	}
	
}