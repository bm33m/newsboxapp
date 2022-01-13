<?php

/*
* signup.php
* @author Brian
*/

include './header.php';
echo "<b>Signup</b>";
?>
<div>
  <form action='../libs/Users.php' method='POST'>
    <div>
      <p><label>Name:</label>
      <input name="name" type="text" value="" placeholder="name" required="true" maxlength="199"/>
      </p>
      <p><label>Email:</label>
      <input name="email" type="email" value="" placeholder="email" required="true" maxlength="199"/>
      </p>
    </div>
    <div>
      <label>form method:</label><br>
      <label>Method 01</label>
      <input name="formMethod" type="radio" value="method01" checked/>
      <label>Method 02</label>
      <input name="formMethod" type="radio" value="method02"/>
      <label>Method 03</label>
      <input name="formMethod" type="radio" value="method03"/>
    </div>
    <div>
      <label>form action:</label><br>
      <label>Validate</label>
      <input name="formAction" type="radio" value="true" checked/>
      <label>No validation</label>
      <input name="formAction" type="radio" value="false" />
    </div>
    <div>
      <br>
      <input name="register" type="text" value="false" maxlength="199" hidden/>
      <input type="submit" name="signup" value="Signup"/>
      <br>
    </div>
  </form>
</div>
<?php
include './footer.php';
?>
