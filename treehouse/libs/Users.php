<?php
/*
*Users.php
*@author: Brian
*/

session_start();
if(!isset($_REQUEST["signup"]))
{
  header("Location: ../views/signup.php");
  exit();
}
include '../configs/dbconfig.php';
$app = new Users($_REQUEST["formMethod"], $_REQUEST["formAction"]);

/**
*Allows a user to sign up for a monthly newsletter.
*Allow users to enter their name and their email address.
*/
class Users
{
  var $name;
  var $email;
  var $method;
  var $action;
  var $submit;
  var $datep;
  var $registered;

  function __construct($formMethod, $formAction)
  {
    $this->method = filter_var($formMethod, FILTER_SANITIZE_STRIPPED);
    $this->action = filter_var($formAction, FILTER_SANITIZE_STRIPPED);
    $_SESSION["method"] = trim($this->method);
    $_SESSION["action"] = trim($this->action);
    $this->signup($_REQUEST);
  }

  function signup($user){
    $this->name = filter_var($user["name"], FILTER_SANITIZE_STRIPPED);
    $this->email = filter_var($user["email"], FILTER_VALIDATE_EMAIL);
    $this->submit = filter_var($user["register"], FILTER_SANITIZE_STRIPPED);
    $_SESSION["name"] = trim($this->name);
    $_SESSION["email"] = trim($this->email);
    if($this->submit == "false"){
      header("Location: ../views/register.php");
    } else {
      $this->register($_REQUEST);
    }
  }

  function register($user){
    $this->name = filter_var($user["name"], FILTER_SANITIZE_STRIPPED);
    $this->email = filter_var($user["email"], FILTER_VALIDATE_EMAIL);
    $this->method = filter_var($user["formMethod"], FILTER_SANITIZE_STRIPPED);
    $this->action = filter_var($user["formAction"], FILTER_SANITIZE_STRIPPED);
    $this->name = trim($this->name);
    $this->email = trim($this->email);
    $this->method = trim($this->method);
    $this->action = trim($this->action);
    if(($this->name == "") or ($this->email == "")){
      header("Location: ../views/register.php");
    } else {
      $this->save();
    }
  }

  function save(){
    try {
      include_once '../configs/dbconn.php';
      $mysqli = connDB02();
      echo "$mysqli->host_info <br>";
      echo "$mysqli->server_info <br>";
      $this->datep = time();
      $datepp = date("Y/m/d H:i:s", $this->datep);
      echo "$datepp <br>";
      $query = "INSERT INTO users(name, email, method, action, datep)"
        ."VALUES(?,?,?,?,?)";
        $smt = $mysqli->prepare($query);
        $smt->bind_param("sssss", $this->name, $this->email, $this->method,
        $this->action, $datepp);
        $this->registered = $smt->execute();
        $smt->close();
        $mysqli->close();
        echo $this->registered;
        $_SESSION["datep"] = $this->datep;
        $_SESSION["registered"] = $this->registered;
        header("Location: ../views/newsletter.php");
        exit();
    } catch (Exception $ex) {
      echo "<br> Ex:.......... <br>";
      echo $ex->getMessage();
    }
    header("Location: ../views/register.php");
  }
}
