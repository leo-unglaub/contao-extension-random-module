-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `rm_active_modules` blob NULL,
  `rm_indexer` varchar(20) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;