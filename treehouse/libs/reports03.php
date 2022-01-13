<?php
//
//reports03.php
//
include '../configs/dbconfig.php';

echo "<br><div class='dvinfo'>
-- 3.

SELECT DISTINCT temp_companiessites_test.sid, temp_companiessites_test.sname FROM temp_companiessites_test, domains WHERE temp_companiessites_test.sid = domains.site AND domains.is_deleted = 1;

</div><br>";
echo "<br>";
?>
