<?php
	function C($name, $method) {
		require_once('testController.class.php');
		$testController = new testController();
		$testController->show();
	}
?>
