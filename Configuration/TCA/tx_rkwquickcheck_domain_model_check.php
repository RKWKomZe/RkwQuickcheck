<?php
return [
	'ctrl' => [
		'title'	=> 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_check',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'default_sortby' => 'ORDER BY crdate DESC',
		'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		],
		'searchFields' => 'name,description,result_a,result_b,result_c,topic',
		'iconfile' => 'EXT:rkw_quickcheck/Resources/Public/Icons/tx_rkwquickcheck_domain_model_check.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, topic, result_a, result_b, result_c',
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, topic, result_a, result_b, result_c, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
				'foreign_table' => 'tx_rkwquickcheck_domain_model_check',
				'foreign_table_where' => 'AND tx_rkwquickcheck_domain_model_check.pid=###CURRENT_PID### AND tx_rkwquickcheck_domain_model_check.sys_language_uid IN (-1,0)',
			],
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
		'hidden' => [
			'exclude' => false,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => [
				'type' => 'check',
				'items' => [
					'1' => [
						'0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
					]
				],
			],
		],
		'starttime' => [
			'exclude' => false,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => [
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'default' => 0,
			]
		],
		'endtime' => [
			'exclude' => false,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => [
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'default' => 0,
				'range' => [
					'upper' => mktime(0, 0, 0, 1, 1, 2038)
				]
			],
		],
		'name' => [
			'exclude' => false,
			'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_check.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
		'topic' => [
			'exclude' => false,
			'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_check.topic',
			'config' => [
				'type' => 'inline',
				'foreign_table' => 'tx_rkwquickcheck_domain_model_topic',
				'foreign_field' => 'tx_check',
				'maxitems' => 9999,
				'appearance' => [
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				],
			],
		],
        'description' => [
            'exclude' => false,
            'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_check.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
        'result_a' => [
            'exclude' => false,
            'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_check.result_a',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
        'result_b' => [
            'exclude' => false,
            'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_check.result_b',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
        'result_c' => [
            'exclude' => false,
            'label' => 'LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkwquickcheck_domain_model_check.result_c',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
        ],
	],
];
