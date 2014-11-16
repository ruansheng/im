<?php
/**
 * Log Class
 * @author ruansheng
 */
class Log{
	
	/**
	 * Log Path
	 * @var string $log_path
	 */
	private static $logPath='./RunLog/';

	/**
	 * record log
	 */
	public static function write($content){
		if(!is_dir(self::$logPath)){
			@mkdir(self::$logPath,0777,true);
		}
		$year=date('Y',time());
		$month=date('m',time());
		$day=date('d',time());
		$logName=self::$logPath."{$year}-{$month}-{$day}".'.log';
		if(!is_file($logName)){
			$hd=fopen($logName,'w+');
			fclose($hd);
		}
		//log format
		$logFormat="[".date('Y-m-d H:i:s')."]:".$content.PHP_EOL;
		file_put_contents($logName,$logFormat,FILE_APPEND);
	}
	
}