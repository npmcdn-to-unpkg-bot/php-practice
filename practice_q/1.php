<?php

if (isset($_REQUEST['sum'])) {
	$a = $_REQUEST['A'];
	$b = $_REQUEST['B'];
	$c = $a + $b;
}
?>

<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>電卓</title>

</head>

<body>
<form action="1.php" method="post">
    <p>
        <input type="text" name="A" value="<?php htmlspecialchars($a); ?>"> +
        <input type="text" name="B" value="<?php htmlspecialchars($b); ?>"> =
        
        <span><?php echo htmlspecialchars($c); ?></span>
        <input type="submit" name="sum" value="計算する">
    </p>
</form>
</body>
</html>

