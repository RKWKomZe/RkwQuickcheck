plugin.tx_rkwquickcheck {
	view {
		templateRootPaths.0 = EXT:rkw_quickcheck/Resources/Private/Templates/
		templateRootPaths.1 = {$plugin.tx_rkwquickcheck.view.templateRootPath}
		partialRootPaths.0 = EXT:rkw_quickcheck/Resources/Private/Partials/
		partialRootPaths.1 = {$plugin.tx_rkwquickcheck.view.partialRootPath}
		layoutRootPaths.0 = EXT:rkw_quickcheck/Resources/Private/Layouts/
		layoutRootPaths.1 = {$plugin.tx_rkwquickcheck.view.layoutRootPath}
	}
	persistence {
		storagePid = {$plugin.tx_rkwquickcheck.persistence.storagePid}
		#recursive = 1
	}
	settings {
		termsPid = {$plugin.tx_rkwquickcheck.settings.termsPid}
	}
	features {
		#skipDefaultArguments = 1
	}
	mvc {
		#callDefaultActionIfActionCantBeResolved = 1
	}
}

page.includeJSFooter.txRkwQuickcheck = EXT:rkw_quickcheck/Resources/Public/Scripts/Quickcheck.js
page.includeCSS.txRkwQuickcheck = EXT:rkw_quickcheck/Resources/Public/Styles/Quickcheck.css

plugin.tx_rkwquickcheck._CSS_DEFAULT_STYLE (
	.typo3-messages .message-error {
		color:red;
	}

	.typo3-messages .message-ok {
		color:green;
	}
)
