<?php

########################################################################
# Extension Manager/Repository config file for ext "pits_rssnews".
#
# Auto generated 08-04-2013 07:53
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'RSS News Feed',
	'description' => 'This extension is for handling rss news from external websites.',
	'category' => 'plugin',
	'author' => 'Arun Chandran',
	'author_email' => 'arun.c@pitsolutions.com',
	'author_company' => 'PIT Solutions Pvt Ltd.',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:34:{s:21:"ExtensionBuilder.json";s:4:"da22";s:12:"ext_icon.gif";s:4:"978f";s:17:"ext_localconf.php";s:4:"d56f";s:14:"ext_tables.php";s:4:"ff42";s:14:"ext_tables.sql";s:4:"b1c9";s:13:"locallang.xml";s:4:"d41d";s:44:"Classes/Controller/PitsrssnewsController.php";s:4:"186e";s:36:"Classes/Domain/Model/Pitsrssnews.php";s:4:"e459";s:51:"Classes/Domain/Repository/PitsrssnewsRepository.php";s:4:"229b";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"9fed";s:36:"Configuration/FlexForms/flexform.xml";s:4:"f8ee";s:33:"Configuration/TCA/Pitsrssnews.php";s:4:"a16e";s:38:"Configuration/TypoScript/constants.txt";s:4:"442c";s:34:"Configuration/TypoScript/setup.txt";s:4:"fb35";s:14:"doc/manual.sxw";s:4:"59f4";s:46:"Resources/Private/Backend/Layouts/Default.html";s:4:"a9bb";s:62:"Resources/Private/Backend/Partials/Pitsrssnews/Properties.html";s:4:"6c76";s:57:"Resources/Private/Backend/Templates/Pitsrssnews/List.html";s:4:"9d80";s:57:"Resources/Private/Backend/Templates/Pitsrssnews/Show.html";s:4:"ba97";s:40:"Resources/Private/Language/locallang.xml";s:4:"7b9c";s:84:"Resources/Private/Language/locallang_csh_tx_pitsrssnews_domain_model_pitsrssnews.xml";s:4:"a278";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"f2f2";s:52:"Resources/Private/Language/locallang_pitsrssnews.xml";s:4:"1fde";s:38:"Resources/Private/Layouts/Default.html";s:4:"871c";s:54:"Resources/Private/Partials/Pitsrssnews/Properties.html";s:4:"6c76";s:49:"Resources/Private/Templates/Pitsrssnews/List.html";s:4:"3898";s:30:"Resources/Public/css/style.css";s:4:"45f1";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:66:"Resources/Public/Icons/tx_pitsrssnews_domain_model_pitsrssnews.gif";s:4:"905a";s:47:"Resources/Public/js/jcarousellite_1.0.1.pack.js";s:4:"bedb";s:44:"Resources/Public/js/jcarousellite_1.0.1c4.js";s:4:"6b28";s:41:"Resources/Public/js/jquery-latest.pack.js";s:4:"7447";s:51:"Tests/Unit/Controller/PitsrssnewsControllerTest.php";s:4:"ccc3";s:43:"Tests/Unit/Domain/Model/PitsrssnewsTest.php";s:4:"d212";}',
);

?>