<?php

/*
* register.php
* @author Brian
*/

include './header.php';
echo "<b>Register...</b><br>";
try {
  if (!empty($_SESSION['name'])){
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $method = $_SESSION['method'];
    $action = $_SESSION['action'];
    echo "<b>name: ".$name."</b><br>";
    echo "<b>email: ".$email."</b><br>";
  } else {
    $name = "";
    $email = "";
    $method = 0;
    $action = 0;
  }
} catch (Exception $ex) {
  echo $ex;
}
?>
<div>
  <form action='../libs/Users.php' method='POST'>
    <div>
      <p><label id="lblName">Name:</label>
      <input name="name" id="name" type="text" value="<?php echo $name; ?>" required="true" maxlength="199"/>
      </p>
      <p><label id="lblEmail">Email:</label>
      <input name="email" id="email" type="email" value="<?php echo $email; ?>" required="true" maxlength="199"/>
      </p>
    </div>
    <div>
      <label>form method:</label><br>
      <label><?php echo $method; ?></label>
      <input name="formMethod" id="formMethod" type="radio" value="<?php echo $method; ?>" checked/>
    </div>
    <div>
      <label>form action:</label><br>
      <label><?php echo $action; ?></label>
      <input name="formAction" id="formAction" type="radio" value="<?php echo $action; ?>" checked/>
    </div>
    <div>
      <br>
      <input name="register" type="text" value="true" maxlength="199" hidden/>
      <input type="submit" name="signup" value="Submit"/>
      <br>
    </div>
  </form>
  <script src="../public/app.js"></script>
<?php
include './footer.php';
?>
