<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Forms',
	array(
		'Forms' => 'list, show, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Forms' => 'create, update, delete',
		
	)
);

?>