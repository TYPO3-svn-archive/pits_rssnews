<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pitsrssnews',
	array(
		'Pitsrssnews' => 'list, show',
		
	),

/**
 * non-cacheable actions
 */	
	array(
		'Pitsrssnews' => 'list, show',
		
	)
);

?>