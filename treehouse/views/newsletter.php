<?php

/*
* newsletter.php
* @author Brian
*/

include './header.php';
include '../libs/submissions.php';
/*
* A page that lists all submissions.
* Ordered by date (descending).
*/
echo "<b>newsletter </b><br>";
try {
  if (!empty($_SESSION['name'])){
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $method = $_SESSION['method'];
    $action = $_SESSION['action'];
    $datep = $_SESSION['datep'];
    $registered = $_SESSION['registered'];
    echo "name: $name <br>";
    echo "email: $email <br>";
    echo "method: $method <br>";
    echo "action: $action <br>";
    echo "date: $datep <br>";
    echo "registered: $registered <br>";
  }
} catch (Exception $ex) {
  echo $ex;
}
?>
<div>
  <hr>
  <?php echo view($table); ?>
</div>
<?php
include './footer.php';
?>
