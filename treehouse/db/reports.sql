-- reports.sql

-- 1.

DROP VIEW IF EXISTS temp01_companiessites_test;
DROP VIEW IF EXISTS temp01_sitesdomains_test;
CREATE VIEW temp01_companiessites_test AS SELECT companies.id AS cid, companies.name AS cname, sites.id AS sid, sites.name AS sname, sites.company, sites.association FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0 AND sites.is_deleted = 0 AND sites.is_supercharged = 1;
CREATE VIEW temp01_sitesdomains_test AS SELECT temp01_companiessites_test.cid, temp01_companiessites_test.cname, temp01_companiessites_test.sid, temp01_companiessites_test.sname, temp01_companiessites_test.company, temp01_companiessites_test.association, domains.domain FROM temp01_companiessites_test, domains WHERE temp01_companiessites_test.sid = domains.site AND domains.is_primary = 1 AND domains.is_deleted = 0;
SELECT associations.name, temp01_sitesdomains_test.cname, temp01_sitesdomains_test.domain FROM temp01_sitesdomains_test, associations WHERE temp01_sitesdomains_test.association = associations.id AND associations.name = 'Basement Systems, Inc.';


-- 2.

DROP VIEW IF EXISTS temp_companiessites_test;
DROP VIEW IF EXISTS temp_sitesnodomains_test;
CREATE VIEW temp_companiessites_test AS SELECT companies.id AS cid, companies.name AS cname, sites.id AS sid, sites.name AS sname, sites.company, sites.association FROM companies, sites WHERE companies.id = sites.company AND companies.is_on_hold = 0 AND companies.is_deleted = 0 AND sites.is_deleted = 0;
CREATE VIEW temp_sitesnodomains_test AS SELECT DISTINCT temp_companiessites_test.cid, temp_companiessites_test.cname, temp_companiessites_test.sid, temp_companiessites_test.sname, temp_companiessites_test.company, temp_companiessites_test.association FROM temp_companiessites_test, domains WHERE temp_companiessites_test.sid != domains.site;
SELECT associations.name, temp_sitesnodomains_test.cname, temp_sitesnodomains_test.sname FROM temp_sitesnodomains_test, associations WHERE temp_sitesnodomains_test.association = associations.id;


-- 3.

SELECT DISTINCT temp_companiessites_test.sid, temp_companiessites_test.sname FROM temp_companiessites_test, domains WHERE temp_companiessites_test.sid = domains.site AND domains.is_deleted = 1;



-- Enjoy:-)
