plugin.tx_rkwquickcheck {
	view {
		# cat=plugin.tx_rkwquickcheck/file; type=string; label=Path to template root (FE)
		templateRootPath = EXT:rkw_quickcheck/Resources/Private/Templates/
		# cat=plugin.tx_rkwquickcheck/file; type=string; label=Path to template partials (FE)
		partialRootPath = EXT:rkw_quickcheck/Resources/Private/Partials/
		# cat=plugin.tx_rkwquickcheck/file; type=string; label=Path to template layouts (FE)
		layoutRootPath = EXT:rkw_quickcheck/Resources/Private/Layouts/
	}
	persistence {
		# cat=plugin.tx_rkwquickcheck//a; type=string; label=Default storage PID
		storagePid =
	}
	settings {
		# cat=plugin.tx_rkwquickcheck//a; type=integer; label=Default terms PID
		termsPid =
	}
}
