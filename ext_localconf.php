<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Formmailer',
	array(
		'Forms' => 'show, list, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Forms' => 'create, update, delete',
		
	)
);
if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvformmailer_cache'])) {
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvformmailer_cache'] = array();
}

?>