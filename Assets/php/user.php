<?php
class User {
  protected $name;

  function getName()
  {
    return $this->$name;
  }

	function getUserID($userName)
	{
    require_once("db.php");
    require("config.php");
		$DB = sqlite_open($DB_PATH);
		$sql = "SELECT uid FROM users WHERE usr_name = '$userName';";
		//echo $sql;
		$result = sqlite_query($DB,$sql);
		$out = sqlite_fetch_array($result);
		return $out["uid"];
	}
	function getElementsFromID($uid,$element)
	{
    require_once("db.php");
    require("config.php");
		$DB = sqlite_open($DB_PATH);
		$sql = "SELECT * FROM users WHERE uid = $uid;";
		$result = sqlite_query($DB,$sql);
		$out = sqlite_fetch_array($result);
		return $out[$element];
	}
  function isPwdCorrect($usr_name,$pwd)
  {
    require_once("db.php");
    require("config.php");
    $DB = sqlite_open($DB_PATH);
		$sql = "SELECT pwd FROM users WHERE usr_name = '$usr_name';";
		//echo $sql;
		$result = sqlite_query($DB,$sql);
		$out = sqlite_fetch_array($result);
    return $pwd == $out["pwd"] ? true : false;

  }

}
?>
