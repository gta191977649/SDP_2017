<?php
  require_once("config.php");
  require_once("db.php");

  require_once("notify.php");

  //判定表单完整度
  $user = null;
  $pwd = null;
  $gender = null;
  if(isset($_POST["usr"]) || isset($_POST["pwd"]))
  {
      $user = $_POST["usr"];
      $pwd = $_POST["pwd"];
  }
  else { // 当注册表单没有填入要求的东西时
    die("ERROR"); // 结束程序...
  }
  //debug
  //echo $user." : ".$pwd;
  //Gender判断
  if(isset($_POST["gender"]))
  {
    switch ($_POST["gender"])
    {
      case "M":
      {
        $gender = 0;
        break;
      }
      case "F":
      {
        $gender = 1;
      }
      default://保密
      {
        $gender = "NULL";
        break;
      }

    }
  }

  require_once("Users.php");
  //Check if user exisit
  $t = new Users();
  if ($t->isUserExsit($user))
  {
    notify("Error".$user,"Sorry, the username is unable to use!","../../register.php","panel-danger");
    die();
  }

  //插入数据到数据库
  $DB = sqlite_open($DB_PATH);
  //鲁莽的方法- -这样会有SQL注入等安全问题= =需要改进以后
  $SQL = "INSERT INTO users (usr_name,pwd,reg_date,gender,activated) VALUES ('$user', '$pwd', datetime(),$gender,1 );";
  //echo($SQL);
  sqlite_query($DB,$SQL);

  //断开连接
  sqlite_close($DB);
  require_once("user.php");
  $usr = new User();
  $uid = $usr->getUserID($user);
  //保存 Session (登录信息)
  session_start();

  $_SESSION['login_user']= $uid;
  $_SESSION['login_name']= $user;
  //Redirect to home page
  notify("Welcome, ".$user,"You have registed, you will be redirect to home.","../../home.php");


?>
