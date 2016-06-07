<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table addjs(addjs_id int not null auto_increment, name varchar(100), js_script text, enabled smallint, primary key(addjs_id));

SQLTEXT;

$installer->run($sql);
//demo
//Mage::getModel('core/url_rewrite')->setId(null);
//demo
$installer->endSetup();
