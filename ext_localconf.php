<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
	function($extKey)
	{

        //=================================================================
        // Configure Plugin
        //=================================================================
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

	},
	$_EXTKEY
);
