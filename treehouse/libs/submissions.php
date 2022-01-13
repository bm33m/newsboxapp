<?php
//
//submisions.php
//

include '../configs/dbconfig.php';

/*
*Lists all submissions.
*Ordered by date (descending).
*/
$table = "
<div><table>
<tr>
<th>#</th>
<th>id</th>
<th>name</th>
<th>email</th>
<th>method</th>
<th>action</th>
<th>datep</th>
</tr>
";
function view($data){
  $y = 0;
  try {
    $code;
    $name;
    $email;
    $method;
    $action;
    $date;
    include_once '../configs/dbconn.php';
    $mysqli = connDB02();
    $query = $sql = "SELECT * FROM `users`   ORDER BY `datep` DESC;";
    $smt = $mysqli->prepare($query);
    $info = $smt->execute();
    $resultb = $smt->bind_result($code, $name, $email, $method, $action, $date);
    while($smt->fetch()){
      $y += 1;
      $data .= "<tr>
        <td>$y:</td><td>$code</td><td>$name</td><td>$email</td>
        <td>$method</td><td>$action</td><td>$date</td>
      </tr>";
    }
    $smt->close();
    $mysqli->close();
    $data .= "</table></div>";
    echo "data: $data <br>";
    echo "info: $info <br>";
    echo "results: $y <br>";
    return $resultb;
  }
  catch (Exception $ex) {
    echo "<br> EXCEPT:....... <br>";
    echo "$ex->getMessage()";
  }
  return $y;
}
?>
