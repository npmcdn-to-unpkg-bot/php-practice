<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
</head>

<body>

<?php
function card_deal($player_nums, $cards) {
    if ($player_nums == 0) {
        exit("プレイヤーが0人です");
    }
    $cards_ary = str_split($cards);
    $length = count($cards_ary);
 
    $cards = array();   // return値
    if ($player_nums > $length) {
        for ($j = 0; $j < $player_nums; $j++) {
            $cards[$j] = "";
        }
    } else {
        $length = $length - ($length % $player_nums);
        // n人目のカードを求める
        for ($n = 0; $n < $player_nums; $n++) {
            for ($i = 0; $i < $length; $i++) {
                if (($i % $player_nums) == $n) {
                    $cards[$n] .= $cards_ary[$i];
                }
            }
        }
    }
    return $cards;
}
 
var_dump(card_deal(3, "123123123"));
echo "<br>";
var_dump(card_deal(4, "123123123"));
echo "<br>";
var_dump(card_deal(6, "01234"));
echo "<br>";
var_dump(card_deal(0, "123456789"));
?>

</body>
</html>