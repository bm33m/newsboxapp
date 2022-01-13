<?php

/*
* reporting01.php
* @author Brian
*/

include './header.php';
include '../libs/reports01.php';

echo "<b>Reporting01...</b><br>";

$associationName = 'Basement Systems, Inc.';
$query01 = "SELECT id FROM `associations` WHERE name = ?;";
$associationId = report01($query01, $associationName);
echo "associationId: $associationId <br>";

$isSupercharged = 1;
$isDeleted = 0;
$query02 = "SELECT id, company FROM `sites` WHERE association = ? AND is_supercharged = ? AND is_deleted = ?;";
$sites = report02($query02, $associationId, $isSupercharged, $isDeleted);

$activeDomainList = [];
$domain = null;
$isPrimary = 1;
$query03 = "SELECT domain FROM `domains` WHERE site = ? AND is_primary = ? AND is_deleted = ?;";

$companyList = [];
$company = null;
$isOnHold = 0;
$query04 = "SELECT name FROM `companies` WHERE id = ? AND is_on_hold = ? AND is_deleted = ?;";

foreach ($sites as $site){
  $siteId = $site[0];
  $domain = report03($query03, $siteId, $isPrimary, $isDeleted);
  $companyId = $site[1];
  $company = report04($query04, $companyId, $isOnHold, $isDeleted);
  echo "domain: $domain, company: $company <br>";
  echo "sitesID: $siteId, companyID: $companyId <br>";
  if ($domain and $company){
    echo "<br><div class='dvinfo'>###############################<br>";
    echo "#$associationId associationName: $associationName <br>";
    echo "#$companyId company: $company <br>";
    echo "#$siteId domain: $domain <br>";
    $activeDomainList[] = array($associationName, $company, $domain);
    echo "#################################</div><br>";
  }
}
include './footer.php';
?>
