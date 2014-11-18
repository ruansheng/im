<?php
/**
 * User Model
 * @author ruansheng
 */
class UserModel {
	
	/**
	 * user_id
	 * @var int
	 */
	private $userId;
	
	/**
	 * user_name
	 * @var string
	 */
	private $userName;
	
	/**
	 * password
	 * @var string
	 */
	private $password;
	
	/**
	 * login_status
	 * @var int
	 */
	private $loginStatus;
	
	/**
	 * __set
	 * @param mixed $name
	 * @param mixed $value
	 */
	public function __set($name,$value){
		$this->$name=$value;
	}
	
	/**
	 * __get 方法
	 * @param mixed $name
	 */
	public function __get($name){
		return $this->$name;
	}
	
}