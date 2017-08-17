<?php
	function loginForUsr($usrname,$uid)
	{
			if (session_status() == PHP_SESSION_NONE) session_start();
			$_SESSION['login_user']= $uid;
			$_SESSION['login_name']= $usrname; 
	}
	function isLog()
	{
		if (session_status() == PHP_SESSION_NONE) session_start();
  		if(isset($_SESSION['login_user'])) return true;
  		else return false;
	}
	function getUID()
	{
		if (session_status() == PHP_SESSION_NONE) session_start();
  		if(isset($_SESSION['login_user'])){
  			return $_SESSION['login_user'];
  		}
	}

	function getName()
	{
		if (session_status() == PHP_SESSION_NONE) session_start();
  		if(isset($_SESSION['login_name'])){
  			return $_SESSION['login_name'];
  		}
	}

?>
