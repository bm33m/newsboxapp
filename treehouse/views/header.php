<?php
session_start();

/*
 * header.php
 * @author Brian
 */

define('COMPANY', 'Treehouse');
print ('
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>'.COMPANY.'</title>
    <link href="../public/css/main.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <header class="navbar">
      <ul>
        <li><a href="../" class="dvuiprofile"><img src="../public/home.jpg"/>home</a></li>
        <li><a href="./signup.php">signup</a></li>
        <li><a href="./newsletter.php">newsletter</a></li>
        <li><a href="./reporting01.php">reporting01</a></li>
        <li><a href="./reporting02.php">reporting02</a></li>
        <li><a href="./reporting03.php">reporting03</a></li>
      </ul>
    </header>
');
?>
