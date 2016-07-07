<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
</head>

<body>

<?php
echo "曜日を知りたい日にちをxxxxxxxx（半角数字8ケタ）で入力してください。 ";
?>
<form action="7.php" method="post">
	<input type="date" name="time">
    <input type="submit" value="送信">
</form>

<p>
<?php
$date = $_POST['time'];
$date = new DateTime($date);
echo $date->format('Y/m/dは<b>l</b>です');
?>
</p>

</body>
</html>