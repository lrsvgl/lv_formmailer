<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_lvformmailer_domain_model_forms'] = array(
	'ctrl' => $TCA['tx_lvformmailer_domain_model_forms']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, formname, senderemail, sendername, receiveremail, receivername, subject',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, formname, senderemail, sendername, receiveremail, receivername, subject,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_lvformmailer_domain_model_forms',
				'foreign_table_where' => 'AND tx_lvformmailer_domain_model_forms.pid=###CURRENT_PID### AND tx_lvformmailer_domain_model_forms.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'formname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lv_formmailer/Resources/Private/Language/locallang_db.xlf:tx_lvformmailer_domain_model_forms.formname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'senderemail' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lv_formmailer/Resources/Private/Language/locallang_db.xlf:tx_lvformmailer_domain_model_forms.senderemail',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'sendername' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lv_formmailer/Resources/Private/Language/locallang_db.xlf:tx_lvformmailer_domain_model_forms.sendername',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'receiveremail' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lv_formmailer/Resources/Private/Language/locallang_db.xlf:tx_lvformmailer_domain_model_forms.receiveremail',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'receivername' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lv_formmailer/Resources/Private/Language/locallang_db.xlf:tx_lvformmailer_domain_model_forms.receivername',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'subject' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lv_formmailer/Resources/Private/Language/locallang_db.xlf:tx_lvformmailer_domain_model_forms.subject',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
	),
);

?>