<?php
return [
	'ctrl' => [
		'title'	=> 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_question',
		'hideTable' => 1,
		'label' => 'question',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [

		],
		'searchFields' => 'question,description,topic',
		'iconfile' => 'EXT:rkw_quickcheck/Resources/Public/Icons/tx_rkwquickcheck_domain_model_question.gif'
	],
	'types' => [
		'1' => ['showitem' => 'question, topic'],
	],
	'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					]
				],
				'default' => 0,
			],
		],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['', 0],
				],
				'foreign_table' => 'tx_rkwquickcheck_domain_model_question',
				'foreign_table_where' => 'AND tx_rkwquickcheck_domain_model_question.pid=###CURRENT_PID### AND tx_rkwquickcheck_domain_model_question.sys_language_uid IN (-1,0)',
			],
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
		'question' => [
			'exclude' => false,
			'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_question.question',
			'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 8,
                'eval' => 'trim',
			],
		],
		'description' => [
			'exclude' => false,
			'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_question.description',
			'config' => [
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
			],
		],
		'topic' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
	],
];
