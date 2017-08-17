<?php
  //debug
  require_once("user.php");
  require_once("auth.php");
  require_once("notify.php");
  //echo "U: ".$_POST["usr"]. "P: ".$_POST["pwd"];
  if(!isset($_POST["usr"]) && !isset($_POST["pwd"]))
  {
    notify("Plese fill the form","please enter your username & password!","../../login.php","panel-danger");
    die();
  }

  $usr = new User();
  $pwdCK = $usr->isPwdCorrect($_POST["usr"],$_POST["pwd"]);

  if($pwdCK) //密碼正確
  {
    ////////////// 登陆用户 //////////////
    $uid = $usr->getUserID($_POST["usr"]);
    loginForUsr($_POST["usr"],$uid);
    notify("Welcome back ".getName(),"Login Successful, you will be redirect to home.","../../home.php");
  }
  else
  {
    //密码错误
    //die("Wrong PWD or username");
    notify("Wrong Username or Password!","You entered username or password is wrong.","../../login.php","panel-danger");
  }



  //echo $uid;

  //if(correct )
?>
