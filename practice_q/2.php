<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
</head>

<?php

class Cards{
	
	public function deal($players, $cards_num) {
		$cards_ary = array();	//容器を作る
		$cards_len = strlen($cards_num);	//int(個数)を取る
		
		if($players > 0) {
			for($cnt = 0; $cnt < $cards_len; $cnt++) {	//何回目かcountします。
				if($cnt % $players == 0 && $cards_len - $cnt < $players) {
					break;	//playerとcardの数が割り切れない時、cardよりplayerが多い時はbreak
				}
				
				$mem = $cnt % $players;	//一人が持てるカードの枚数
				if (!isset($cards_ary[$mem])) {	//容器がnullの時
					$cards_ary[$mem] = "";	//容器はnullを返す
				}
				$cards_ary[$mem] = substr($cards_num, $cnt, 1);	//文字列の一部分を返す。 substr(文字列, 返す文字列の位置, ←の位置から何文字分)
			}
		}
		return $cards_ary;
	}
	
}

$a = new Cards;
var_dump($a ->deal(1,"123456"));


?>

<body>
</body>
</html>