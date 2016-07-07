<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>phpカリキュラム1</title>
</head>

<body>

<?php
	echo "Hello world!";
?>

<p>こんにちは！<?php echo "hi!"; ?></p>

<?php
	$message = "Hello World!";
	echo $message;
?>

<p><?php
	$x = 5;
	$y =1.234;
	$flag = true;
	$n = null;
	
	var_dump($message);		echo "<br>"; //string:文字列
	var_dump($x); 	echo "<br>"; //int:整数値
	var_dump($y); 	echo "<br>"; //float:浮動小数点
	var_dump($flag); 	echo "<br>"; //boolean:真偽値
	var_dump($n); //何もない(データ型ではない)
?></p>

<p><?php
  define("ADMIN_EMAIL", "gizumo@gmail.com");
  define("LIST_COUNT", 15);
  echo ADMIN_EMAIL;		echo "<br>";
  echo LIST_COUNT;
?></p>

<p><?php
	$x = 5;
	echo $x;
?></p>

<p><?php
	echo (10 % 3) * 5;
?></p>

<p><?php
	echo "hello" ."world";
?></p>

<p><?php
	$x++;
	echo $x;	echo "<br>";

	++$x;
	echo $x;
?></p>

<p><?php
	$x += 5;
	echo $x;	echo "<br>";
	
	$x *= 5;
	echo $x;
?></p>

<p><?php
	$name = "Gizumo";
	echo "hello \n\t\\$name";
?></p>

<?php
	$num = 5 * 5;
	echo $num;
echo "<br>";
	$num = 25;
	$num /= 5;
	echo $num;
echo "<br>";
	$num = 25/5;
	echo $num;
?>

<p><?php
	$age = 23;
	if($age >=20){
		echo "おとな";
	} else {
		echo "こびと";
	}
echo "<br>";
	$device = "mac";
	if($device == "mac"){
		echo $device . "です";
	}else if($device == "windows"){
		echo $device . "です";
	}else{
		echo "どこの子よ！";
	}
?></p>

<p><?php
	$array = ["東京都" => "東京", "埼玉県" => "さいたま", "千葉県" => "千葉", "長野" => "松本", "大阪" => "おばちゃん", "" => ""];
	foreach($array as $japan => $kencho){
		if($japan == "長野" || $japan == "大阪"){
			echo "関東地方じゃない";
		}else if($japan == null){
			echo "空っぽ";
		}else{
			echo $japan . "の県庁所在地は" . $kencho . "です";
		}
	}
?></p>


<p><?php
	function hello(){
		echo "Hello World!";	
	}
	hello();
echo "<br>";
	function getSumNumbeR($n){
		return $n * 1.08;
	}
	
	$apple = 150;
	echo getSumNumbeR($apple);
	
?></p>




</body>
</html>