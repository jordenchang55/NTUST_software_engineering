<?php
	require '../UserDAO.php';
	$dao = new UserDAO('Test');

	if($dao->isExistUser($_POST['username'], $_POST['password'])) {
		header('HTTP/1.0 200');
	} else {
		header('HTTP/1.0 400');
	}
 ?>