<?php

require_once 'bubble_sort.php';

$bubble = new BubbleSort(5);
$bubble->max = 10;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Сортировка</title>
</head>
<body>
	<pre>
		<?= var_dump($bubble->sort())?>
	</pre>
</body>
</html>