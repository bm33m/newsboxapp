<?php

/*
* dbconn.php
* @author Brian
*/
function connDB01(){
  try {
    $mysqli = new mysqli(DBHOST, DBUSER, DBPWD ,DBNAME01);
    if($mysqli->errno){
      print "Connection#: $mysqli->error <br>";
      echo '<div><a href="../index.php">Exit</a></div>';
      exit();
    } else {
      print "Processing..<br>";
    }
    if($mysqli->connect_errno){
      print "Connection Offline: $mysqli->connect_errno <br>";
      print "Connection1: $mysqli->connect_error <br>";
      echo '<div><a href="../index.php">Exit</a></div>';
      exit();
    }
    return $mysqli;
  } catch (Exception $ex) {
    echo $ex;
  }
}

function connDB02(){
  try {
    $mysqli = new mysqli(DBHOST, DBUSER, DBPWD ,DBNAME02);
    if($mysqli->errno){
      print "Connection#: $mysqli->error <br>";
      echo '<div><a href="../index.php">Exit</a></div>';
      exit();
    } else {
      print "Processing..<br>";
    }
    if($mysqli->connect_errno){
      print "Connection Offline: $mysqli->connect_errno <br>";
      print "Connection1: $mysqli->connect_error <br>";
      echo '<div><a href="../index.php">Exit</a></div>';
      exit();
    }
    return $mysqli;
  } catch (Exception $ex) {
    echo $ex;
  }
}

?>
