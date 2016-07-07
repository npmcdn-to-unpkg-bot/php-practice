<?php
require_once ('controller.php');

var_dump($month);
var_dump($last_day);
var_dump($calender);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
</head>

<body>

<p><?php echo $year; ?>年<?php echo $month; ?>月のカレンダー</p>
<br>
<br>
<table>
	<tr>
    	<th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
		<th>土</th>
    </tr>
    
    <tr>
    	<?php $cnt = 0; ?>
        <?php foreach ($calender as $key => $value): ?>
        
		<td>
        	<?php $cnt++; ?>
            <a href=""><?php echo $value['day']; ?></a>
        </td>
        
    	<?php if ($cnt == 7): ?>
    </tr>
    <tr>
    	<?php $cnt = 0; ?>
        <?php endif; ?>
        
        <?php endforeach; ?>
    </tr>
</table>
		    
    
    
    
<style type="text/css">
table {
    width: 100%;
}
table th {
    background: #EEEEEE;
}
table th,
table td {
    border: 1px solid #CCCCCC;
    text-align: center;
    padding: 5px;
}
</style>
</body>
</html>