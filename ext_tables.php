<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
	function($extKey)
	{

        //=================================================================
        // Add tables
        //=================================================================
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
		    'tx_rkwquickcheck_domain_model_check'
        );

		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
		    'tx_rkwquickcheck_domain_model_topic'
        );

		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
		    'tx_rkwquickcheck_domain_model_question'
        );

	},
	$_EXTKEY
);
