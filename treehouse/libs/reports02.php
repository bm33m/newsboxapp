<?php
//
//reports02.php
//
include '../configs/dbconfig.php';

echo "<br><div class='dvinfo'>
-- 2.

DROP VIEW IF EXISTS temp_companiessites_test;
DROP VIEW IF EXISTS temp_sitesnodomains_test;
CREATE VIEW temp_companiessites_test AS SELECT companies.id AS cid, companies.name AS cname, sites.id AS sid, sites.name AS sname, sites.company, sites.association FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0 AND sites.is_deleted = 0;
CREATE VIEW temp_sitesnodomains_test AS SELECT DISTINCT temp_companiessites_test.cid, temp_companiessites_test.cname, temp_companiessites_test.sid, temp_companiessites_test.sname, temp_companiessites_test.company, temp_companiessites_test.association FROM temp_companiessites_test, domains WHERE temp_companiessites_test.sid != domains.site;
SELECT associations.name, temp_sitesnodomains_test.cname, temp_sitesnodomains_test.sname FROM temp_sitesnodomains_test, associations WHERE temp_sitesnodomains_test.association = associations.id;

</div><br>";
echo "<br>";
?>
