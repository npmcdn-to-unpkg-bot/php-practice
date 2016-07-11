<?php

require_once 'counter.php';

$counter = new Counter();

$counter->increment();

$cnt = $counter->get();

?>

<html>
<head lang='ja'>
<title>かうんたー</title>
</head>

<body>
<p>あんたが <?php echo $cnt; ?> 人目だ</p>
</body>

</html>
