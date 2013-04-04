<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pitsrssnews',
	'RSS News Feed'
);
$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
/*
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'pitsrssnews',	// Submodule key
		'',						// Position
		array(
			'Pitsrssnews' => 'list,xmltoarray',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_pitsrssnews.xml',
		)
	);
*/

}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'RSS News Feed');

t3lib_extMgm::addLLrefForTCAdescr('tx_pitsrssnews_domain_model_pitsrssnews', 'EXT:pits_rssnews/Resources/Private/Language/locallang_csh_tx_pitsrssnews_domain_model_pitsrssnews.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_pitsrssnews_domain_model_pitsrssnews');
$TCA['tx_pitsrssnews_domain_model_pitsrssnews'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:pits_rssnews/Resources/Private/Language/locallang_db.xml:tx_pitsrssnews_domain_model_pitsrssnews',
		'label' => 'news',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'news,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Pitsrssnews.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_pitsrssnews_domain_model_pitsrssnews.gif'
	),
);

$pluginSignature = str_replace('_','',$_EXTKEY).'_'.pitsrssnews;
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform.xml');

?>
