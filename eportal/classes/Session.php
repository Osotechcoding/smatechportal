<?php  
require_once 'initialize.php';
class Session {
	public static function init_ses(){
	return @session_start();
	}

	 public static function web_root(){
	 	return APP_ROOT;
		//https://eportal.smapp.com/
	}
	public static function redirect_root($flink) {
		header("Location: ".self::web_root().$flink);
    exit();
    //https://eportal.smapp.com/index
	}
	
	public static function set($k,$v){
		$_SESSION[$k] = $v;
	}
	public static function set_Cookie($name,$value,$time){
		return setcookie($name,$value,$time,"/");
	}
	public static function remove_Cookie($name,$value="",$time=100){
		return setcookie($name,$value,$time,"/");
	}
	public static function set_xss_token(){
		$_SESSION['XSS_TOKEN'] =  md5(uniqid(mt_rand(102098,21341009),true));
		return $_SESSION['XSS_TOKEN'];
	}
	public static function check_xss_token($xss_token){
		self::init_ses();
		if (self::get("XSS_TOKEN") !== $xss_token) {
   			self::destroy();
  }
	}

	public static function get($k){
		if (isset($_SESSION[$k])) {
   return $_SESSION[$k];
  } else {
   return false;
  }
	}

public static function check_session_data($key){
	if (!isset($_SESSION[$key]) || empty($_SESSION[$key])) {
		self::destroy();
	}
}

	public static function lock_screen(){
		self::redirect_root("lock-screen");
	}
	
	public static function destroy(){
		@session_destroy();
  @header("Location:".self::web_root());
  exit();
	}
}