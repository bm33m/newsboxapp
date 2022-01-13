--
-- Database: `newsletters`
--
CREATE DATABASE IF NOT EXISTS `newsletters` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `newsletters`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
    `id` mediumint(8) NOT NULL auto_increment,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL UNIQUE,
    `method` varchar(255) NOT NULL default 'method04',
    `action` varchar(255) NOT NULL default 'action01',
    `datep` datetime NOT NULL default '2000/02/02 00:00:00',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`) VALUES
('Basement Systems, Inc.', 'bsi@bsi.org'),
('CleanSpace', 'cs@cs.org'),
('Dr. Energy Saver, LLC', 'esl@esl.org'),
('Foundation Supportworks, Inc.', 'fsi@fsi.org'),
('Total Basement Finishing, Inc.', 'tbfi@tbfi.org');

-- --------------------------------------------------------

--
-- User for Database: `newsletters`
--

GRANT ALL ON newsletters.* to log022bv@localhost identified by 'myp2pw';
