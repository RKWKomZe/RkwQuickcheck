<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
	function($extKey)
	{

		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
			'RKW.RkwQuickcheck',
			'Check',
			[
				'Check' => 'index ,show, result'
			],
			// non-cacheable actions
			[
				'Check' => 'index ,show, result'
			]
		);

	    // wizards
        /*
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        check {
                            icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_check.svg
                            title = LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkw_quickcheck_domain_model_check
                            description = LLL:EXT:rkw_quickcheck/Resources/Private/Language/locallang_db.xlf:tx_rkw_quickcheck_domain_model_check.description
                            tt_content_defValues {
                                CType = list
                                list_type = rkwquickcheck_check
                            }
                        }
                    }
                    show = *
                }
            }'
        );
        */
	},
	$_EXTKEY
);
