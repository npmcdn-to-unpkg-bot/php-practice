<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>twitterを見てみる</title>
</head>

<body>
<h1>自分のツイートを検索</h1>
<p>直近200件のツイートから探したいワードで検索！</p>
<form action="myresult.php" method="post">
    <input type="radio" name="user" value="1"{$checked["test_c"][1]}>自分のツイート
    <input type="radio" name="user" value="2"{$checked["test_c"][2]}>自分のTL
    
    <input type="text" name='tweet'>
    <input type="submit" value="検索">
</form>


</body>
</html>