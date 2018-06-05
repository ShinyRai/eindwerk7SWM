<?php
	session_start();

//include beveiligd.php op alle paginas die alelen mogen gezien worden alsje ben ingelod

	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
		exit;
	}
?>