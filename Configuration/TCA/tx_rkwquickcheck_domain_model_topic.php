<?php
return [
	'ctrl' => [
		'title'	=> 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_topic',
		'hideTable' => 1,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [

		],
		'searchFields' => 'name,description,tx_check,question',
		'iconfile' => 'EXT:rkw_quickcheck/Resources/Public/Icons/tx_rkwquickcheck_domain_model_topic.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, name, description, tx_check, question',
	],
	'types' => [
		'1' => ['showitem' => 'name, description, tx_check, question'],
	],
	'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					]
				],
				'default' => 0,
			],
		],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['', 0],
				],
				'foreign_table' => 'tx_rkwquickcheck_domain_model_topic',
				'foreign_table_where' => 'AND tx_rkwquickcheck_domain_model_topic.pid=###CURRENT_PID### AND tx_rkwquickcheck_domain_model_topic.sys_language_uid IN (-1,0)',
			],
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
		'name' => [
			'exclude' => false,
			'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_topic.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
		'description' => [
			'exclude' => false,
			'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_topic.description',
			'config' => [
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim',
			],
		],
		'question' => [
			'exclude' => false,
			'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_topic.question',
			'config' => [
				'type' => 'inline',
				'foreign_table' => 'tx_rkwquickcheck_domain_model_question',
				'foreign_field' => 'topic',
				'maxitems' => 9999,
				'appearance' => [
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				],
			],
		],
		'tx_check' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
	],
];
