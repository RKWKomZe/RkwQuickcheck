<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
	function($extKey)
	{

        //=================================================================
        // Register Plugin
        //=================================================================
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
			'RKW.RkwQuickcheck',
			'Check',
			'RKW Quickcheck'
		);

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

        //=================================================================
        // Add TypoScript
        //=================================================================
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            $extKey,
            'Configuration/TypoScript',
            'RKW QuickCheck'
        );

		//=================================================================
		// Add Flexform
		//=================================================================
		$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($extKey));
		$pluginName = strtolower('Check');
		$pluginSignature = $extensionName.'_'.$pluginName;
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		    $pluginSignature,
            'FILE:EXT:'.$extKey . '/Configuration/FlexForms/Quickcheck.xml'
        );

	},
	$_EXTKEY
);
