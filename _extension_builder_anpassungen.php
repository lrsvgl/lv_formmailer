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





