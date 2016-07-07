<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>phpカリキュラム2</title>
</head>

<body>

<?php
	
	require_once('user_class.php');
	
	$tom = new User("tom", "dummy@dummy.com");
	$bob = new SuperUser("bob", "dummydddddd.com");
	
	$tom->sayHi();		echo "<br>";
	$bob->superSayHi();
	
?>


</body>
</html>