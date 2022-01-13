<?php
/*
* index.php
* @author Brian
*/
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Treehouse</title>
    <link href="./public/css/main.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <header class="navbar">
      <ul>
        <li><a href="views/signup.php">signup</a></li>
        <li><a href="views/newsletter.php">newsletter</a></li>
        <li><a href="views/reporting01.php">reporting01</a></li>
        <li><a href="views/reporting02.php">reporting02</a></li>
        <li><a href="views/reporting03.php">reporting03</a></li>
      </ul>
    </header>
    <div>
    <?php echo "Welcome to Treehouse";  ?>
    </div>
    <div id="info" class="gdvuiprofile">
      <a href="./views/signup.php"><img src="./public/graph.png"/>users</a>
    </div>
    <div class="dvinfo">
      <p>1) Provide a list (association name, company name, domain) of all active primary
supercharged domains belonging to the Basement Systems, Inc. association.
      </p>
      <div class="dvanswer">
        <p><b>1.</b></p>
        <p>//$associatioName = 'Basement Systems, Inc.'; </p>
        <p>Step 01.</p>
        <p>SELECT id FROM `associations` WHERE name = 'Basement Systems, Inc.'; </p>
        <p>//$associationId = 1; </p>
        <p>//$association = $associationId; </p>
        <p>//$is_supercharged = true; </p>
        <p>//$is_deleted = false; </p>
        <p>Step 02.</p>
        <p>SELECT id, company FROM `sites` WHERE association = 1 AND is_supercharged = 1 AND is_deleted = 0; </p>
        <p>//Now we have the list of sitesIDs and sitesCompanies</p>
        <p>//We use this list to get the domain and company names...</p>
        <p>Step 03. </p>
        <p>//Get the domains.</p>
        <p>SELECT domain FROM `domains` WHERE site = 1 AND is_primary = 1 AND is_deleted = 0; </p>
        <p>SELECT domain FROM `domains` WHERE site = 2 AND is_primary = 1 AND is_deleted = 0; </p>
        <p>SELECT domain FROM `domains` WHERE site = 3 AND is_primary = 1 AND is_deleted = 0; </p>
        <p>SELECT domain FROM `domains` WHERE site = 30 AND is_primary = 1 AND is_deleted = 0; </p>
        <p>SELECT domain FROM `domains` WHERE site = 45 AND is_primary = 1 AND is_deleted = 0; </p>
        <p>SELECT domain FROM `domains` WHERE site = 57 AND is_primary = 1 AND is_deleted = 0; </p>
        <p>SELECT domain FROM `domains` WHERE site = 82 AND is_primary = 1 AND is_deleted = 0; </p>
        <p>Step 04.</p>
        <p>//Get company names.</p>
        <p>SELECT name FROM `companies` WHERE id = 82 AND is_on_hold = 0 AND is_deleted = 0; </p>
        <p>SELECT name FROM `companies` WHERE id = 38 AND is_on_hold = 0 AND is_deleted = 0; </p>
        <p>SELECT name FROM `companies` WHERE id = 64 AND is_on_hold = 0 AND is_deleted = 0; </p>
        <p>SELECT name FROM `companies` WHERE id = 66 AND is_on_hold = 0 AND is_deleted = 0; </p>
        <p>SELECT name FROM `companies` WHERE id = 91 AND is_on_hold = 0 AND is_deleted = 0; </p>
        <p>SELECT name FROM `companies` WHERE id = 74 AND is_on_hold = 0 AND is_deleted = 0; </p>
        <p>SELECT name FROM `companies` WHERE id = 4 AND is_on_hold = 0 AND is_deleted = 0; </p>
        <p>Step 05.</p>
        <p>Repeat Step 04 and Step 03 simultaneously.</p>
        <p>Filter the results according to the requirements.</p>
        <p><b>./views/reporting01.php and ./libs/reports01.php implements this solution.</b></p>
        <p>Step 06.</p>
        <p> Showing rows 0 - 12 (13 total, Query took 0.1370 seconds.)</p>
        <p>SELECT companies.id AS cid, companies.name AS cname, sites.id AS sid, sites.name AS sname, sites.company, sites.association FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0 AND sites.is_deleted = 0 AND sites.is_supercharged = 1; </p>
        <p> MySQL returned an empty result set (i.e. zero rows). (Query took 0.0840 seconds.)<p>
        <p>CREATE VIEW temp01_companiessites_test AS SELECT companies.id AS cid, companies.name AS cname, sites.id AS sid, sites.name AS sname, sites.company, sites.association FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0 AND sites.is_deleted = 0 AND sites.is_supercharged = 1; </p>
        <p> Showing rows 0 - 0 (1 total, Query took 0.0160 seconds.)</p>
        <p>SELECT temp01_companiessites_test.cid, temp01_companiessites_test.cname, temp01_companiessites_test.sid, temp01_companiessites_test.sname, temp01_companiessites_test.company, temp01_companiessites_test.association, domains.domain FROM temp01_companiessites_test, domains WHERE temp01_companiessites_test.sid = domains.site AND domains.is_primary = 1 AND domains.is_deleted = 0; </p>
        <p> MySQL returned an empty result set (i.e. zero rows). (Query took 0.0630 seconds.)</p>
        <p>CREATE VIEW temp01_sitesdomains_test AS SELECT temp01_companiessites_test.cid, temp01_companiessites_test.cname, temp01_companiessites_test.sid, temp01_companiessites_test.sname, temp01_companiessites_test.company, temp01_companiessites_test.association, domains.domain FROM temp01_companiessites_test, domains WHERE temp01_companiessites_test.sid = domains.site AND domains.is_primary = 1 AND domains.is_deleted = 0; </p>
        <p> Showing rows 0 - 0 (1 total, Query took 0.0100 seconds.)</p>
        <p>SELECT associations.name, temp01_sitesdomains_test.cname, temp01_sitesdomains_test.domain FROM temp01_sitesdomains_test, associations WHERE temp01_sitesdomains_test.association = associations.id AND associations.name = 'Basement Systems, Inc.'; </p>
        <p>for more queries: .db/reports.sql</p>
      </div>
    </div>
    <hr>
    <div class="dvinfo">
      <p>2) Provide a list (association name, company name, site name) of all active sites that do
not have a domain.
      </p>
      <div class="dvanswer">
        <p><b>2</b></p>
        <p>//Get sitesIDs, sitesNames, companyIDs, associationIDs.</p>
        <p>Step 01.</p>
        <p>SELECT id, name, company, association FROM `sites` WHERE is_deleted = 0; </p>
        <p>// Showing rows 0 - 24 (53 total, Query took 0.0090 seconds.) </p>
        <p>Step 02.</p>
        <h1>Selecting from multiple tables.</h1>
        <p>With small results we could get away with selecting one table at a time.</p>
        <p>On the other hand with big data, that would make our programming long and tedious task.</p>
        <p>We can join multiple tables and use a select statement...</p>
        <p>Cool...Awesome :-)</p>
        <p><b>Computer Lab Experiments...</b></p>
        <p>Step 03. Start with small queries... and check the results.</p>
        <p> Showing rows 0 - 21 (22 total, Query took 0.3410 seconds.)</p>
        <p>SELECT * FROM associations, companies, sites WHERE sites.is_deleted = 0 AND companies.is_deleted = 0 AND companies.is_on_hold = 0 AND sites.company = companies.id AND sites.association = associations.id; </p>
        <p>Step 04. Add more...</p>
        <p> Showing rows 0 - 16 (17 total, Query took 0.0400 seconds.)</p>
        <p>SELECT * FROM associations, companies, sites, domains WHERE sites.is_deleted = 0 AND companies.is_deleted = 0 AND companies.is_on_hold = 0 AND sites.company = companies.id AND sites.association = associations.id AND sites.id = domains.site; </p>
        <p>Step 05. Work towards solving the problem at hand... </p>
        <p> Showing rows 0 - 16 (17 total, Query took 0.0200 seconds.)</p>
        <p>SELECT associations.name, companies.name, sites.name, domains.domain FROM associations, companies, sites, domains WHERE sites.is_deleted = 0 AND companies.is_deleted = 0 AND companies.is_on_hold = 0 AND sites.company = companies.id AND sites.association = associations.id AND sites.id = domains.site; </p>
        <p>We want active sites that don't have a domain..</p>
        <p>Step 06</p>
        <p><b>Steps by steps... two tables at a time...</b></p>
        <p>06.01</p>
        <p> Showing rows 0 - 99 (100 total, Query took 0.0070 seconds.)</p>
        <p>SELECT * FROM companies, sites WHERE companies.id = sites.company; </p>
        <p>06.02</p>
        <p> Showing rows 0 - 36 (37 total, Query took 0.0090 seconds.)</p>
        <p>SELECT * FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0; </p>
        <p>06.03</p>
        <p> Showing rows 0 - 21 (22 total, Query took 0.0110 seconds.)</p>
        <p>SELECT * FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0 AND sites.is_deleted = 0; </p>
        <p>06.04</p>
        <p> Showing rows 0 - 21 (22 total, Query took 0.0280 seconds.)</p>
        <p>SELECT companies.id, companies.name, sites.id, sites.name, sites.company, sites.association FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0 AND sites.is_deleted = 0; </p>
        <p>Step 07.</p>
        <p>07.01</p>
        <p> MySQL returned an empty result set (i.e. zero rows). (Query took 0.0240 seconds.)</p>
        <p>CREATE VIEW temp_companiessites_test AS SELECT companies.id AS cid, companies.name AS cname, sites.id AS sid, sites.name AS sname, sites.company, sites.association FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0 AND sites.is_deleted = 0; </p>
        <p>07.02</p>
        <p> Showing rows 0 - 16 (17 total, Query took 0.0270 seconds.)</p>
        <p>SELECT * FROM temp_companiessites_test, domains WHERE temp_companiessites_test.sid = domains.site; </p>
        <p>07.03</p>
        <p> Showing rows 0 - 21 (22 total, Query took 0.0200 seconds.) [sid: 1... - 96...]</p>
        <p>SELECT DISTINCT temp_companiessites_test.cid, temp_companiessites_test.cname, temp_companiessites_test.sid, temp_companiessites_test.sname, temp_companiessites_test.company, temp_companiessites_test.association FROM temp_companiessites_test, domains WHERE temp_companiessites_test.sid != domains.site ORDER BY `temp_companiessites_test`.`sid` ASC  </p>
        <p>Step 08.<p/>
        <p>08.01</p>
        <p> MySQL returned an empty result set (i.e. zero rows). (Query took 0.0250 seconds.)</p>
        <p>CREATE VIEW temp_sitesnodomains_test AS SELECT DISTINCT temp_companiessites_test.cid, temp_companiessites_test.cname, temp_companiessites_test.sid, temp_companiessites_test.sname, temp_companiessites_test.company, temp_companiessites_test.association FROM temp_companiessites_test, domains WHERE temp_companiessites_test.sid != domains.site; </p>
        <p>08.02</p>
        <p> Showing rows 0 - 21 (22 total, Query took 0.0060 seconds.)</p>
        <p>SELECT * FROM temp_sitesnodomains_test, associations WHERE temp_sitesnodomains_test.association = associations.id; </p>
        <p>08.03</p>
        <p> Showing rows 0 - 21 (22 total, Query took 0.0110 seconds.)</p>
        <p>SELECT associations.name, temp_sitesnodomains_test.cname, temp_sitesnodomains_test.sname FROM temp_sitesnodomains_test, associations WHERE temp_sitesnodomains_test.association = associations.id; </p>
        <p><b>Finally: .db/reports.sql have all the queries.</b></p>
      </div>
    </div>
    <hr>
    <div class="dvinfo">
      <p>3) Provide a list (site id, site name) of distinct active sites who have one or more domain,
and whose domains are all deleted.
      </p>
      <div class="dvanswer">
        <p><b>3</b></p>
        <p> Showing rows 0 - 8 (9 total, Query took 0.0200 seconds.)</p>
        <p>SELECT DISTINCT temp_companiessites_test.sid, temp_companiessites_test.sname FROM temp_companiessites_test, domains WHERE temp_companiessites_test.sid = domains.site AND domains.is_deleted = 1; </p>
        <p><i>More info @: .db/reports.sql</i></p>
      </div>
    </div>
    <hr>
  </body>
</html>
