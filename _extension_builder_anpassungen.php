<?php

========================
ext_localconf.php
========================
           
        
if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvformmailer_cache'])) {
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvformmailer_cache'] = array();
}


========================
ext_tables.php
========================

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_formmailer';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_formmailer.xml');


========================
TCA/Forms.php
========================
        
        
        
        
        
        
========================
TCA/Articles.php
========================
		'cat' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lv_formmailer/Resources/Private/Language/locallang_db.xlf:tx_lvformmailer_domain_model_artikel.cat',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('-- Wählen --', 0),
                                        array('Plakate', 1),
                                        array('Infoblätter', 2),
                                        array('Sonstiges', 3),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),



