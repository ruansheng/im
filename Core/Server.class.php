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
		$count = 0;
		do {
			if (($msgsock = socket_accept(self::$handler)) < 0) {
				echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n";
				break;
			} else {
				//send to client 
				$msg ="yes !\n";
				socket_write($msgsock, $msg, strlen($msg));
		
				$buf = socket_read($msgsock,8192);
		
				$talkback = "message:$buf\n";
				echo $talkback;
		
				if(++$count >= 5){
					break;
				}
			}
			socket_close($msgsock);
		} while (true);
			
		socket_close(self::$handler);
	}
	
}