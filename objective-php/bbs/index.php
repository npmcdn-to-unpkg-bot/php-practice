<?php

require_once './bbs.php';

try {
	$bbs = new Bbs('.bbs.dat');
	
	$parentNo = 0;
	$message = '';
	
	if(true == isset($_POST['res'])) {
		$parenNo = $_POST['parent_no'];
		$message = sprintf('No.%sへの返信です', $parentNo);
	}
	if(true == isset($_POST['write'])) {
		$bbs->write($_POST);
		header('Location: ' .$_SERVER['SCRIPT_NAME']);
		exit;
	}
	if(true == isset($_POST['del'])) {
		$bbs->delete($_POST);
		header('Location: ' .$_SERVER['SCRIPT_NAME']);
		exit;
	}
	
	$data = $bbs->getThreadData();
	
} catch(Exception $e) {
	die($e->getmessage());
}

?>
<html>
<head>
<title>掲示板</title>
</head>
<body>

<form method="post" action="">
<input type="text" name="name" /><br />
<input type="text" name="title" /><br />
<textarea name="message"></textarea>
<input type="submit" value="send" /><br />
</form>

<?php var_dump($data); ?>

</body>
</html>