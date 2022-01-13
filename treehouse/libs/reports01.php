<?php
//
//reports01.php
//
include '../configs/dbconfig.php';

function report01($query, $name){
  $id = null;
  try{
    include_once '../configs/dbconn.php';
    $mysqli = connDB01();
    $smt = $mysqli->prepare($query);
    $smt->bind_param("s", $name);
    $info = $smt->execute();
    $resultb = $smt->bind_result($id);
    $fetch = $smt->fetch();
    $smt->close();
    $mysqli->close();
    echo "id: $id <br>";
    return $id;
  } catch (Exception $xe){
    print($xe);
  }
  return $id;
}

function report02($query, $associationId, $isSupercharged, $isDeleted){
  $sites = [];
  $id = null;
  $company = null;
  $y = 0;
  try{
    include_once '../configs/dbconn.php';
    $mysqli = connDB01();
    $smt = $mysqli->prepare($query);
    $smt->bind_param("sss", $associationId, $isSupercharged, $isDeleted);
    $info = $smt->execute();
    $resultb = $smt->bind_result($id, $company);
    $fetch = $smt->fetch();
    while($smt->fetch()){
      $y += 1;
      echo " #$y, $id, $company";
      $sites[] = array($id, $company);
    }
    $smt->close();
    $mysqli->close();
    echo "<br>id: $id <br>";
    echo "company: $company <br>";
    return $sites;
  } catch (Exception $xe){
    print($xe);
  }
  return $sites;
}

function report03($query, $id, $isPrimary, $isDeleted){
  $domain = null;
  try{
    include_once '../configs/dbconn.php';
    $mysqli = connDB01();
    $smt = $mysqli->prepare($query);
    $smt->bind_param("sss", $id, $isPrimary, $isDeleted);
    $info = $smt->execute();
    $resultb = $smt->bind_result($domain);
    $fetch = $smt->fetch();
    $smt->close();
    $mysqli->close();
    echo "domain: $domain <br>";
    return $domain;
  } catch (Exception $xe){
    print($xe);
  }
  return $domain;
}

function report04($query, $id, $isOnHold, $isDeleted){
  $company = null;
  try{
    include_once '../configs/dbconn.php';
    $mysqli = connDB01();
    $smt = $mysqli->prepare($query);
    $smt->bind_param("sss", $id, $isOnHold, $isDeleted);
    $info = $smt->execute();
    $resultb = $smt->bind_result($company);
    $fetch = $smt->fetch();
    $smt->close();
    $mysqli->close();
    echo "company: $company <br>";
    return $company;
  } catch (Exception $xe){
    print($xe);
  }
  return $company;
}

echo "<br><div class='dvinfo'>
-- 1.

DROP VIEW IF EXISTS temp01_companiessites_test;
DROP VIEW IF EXISTS temp01_sitesdomains_test;
CREATE VIEW temp01_companiessites_test AS SELECT companies.id AS cid, companies.name AS cname, sites.id AS sid, sites.name AS sname, sites.company, sites.association FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0 AND sites.is_deleted = 0 AND sites.is_supercharged = 1;
CREATE VIEW temp01_sitesdomains_test AS SELECT temp01_companiessites_test.cid, temp01_companiessites_test.cname, temp01_companiessites_test.sid, temp01_companiessites_test.sname, temp01_companiessites_test.company, temp01_companiessites_test.association, domains.domain FROM temp01_companiessites_test, domains WHERE temp01_companiessites_test.sid = domains.site AND domains.is_primary = 1 AND domains.is_deleted = 0;
SELECT associations.name, temp01_sitesdomains_test.cname, temp01_sitesdomains_test.domain FROM temp01_sitesdomains_test, associations WHERE temp01_sitesdomains_test.association = associations.id AND associations.name = 'Basement Systems, Inc.';

</div>";
echo "<br><hr>";

?>
