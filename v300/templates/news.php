<?php
session_start();
//require_once($_SERVER['DOCUMENT_ROOT'] . "/const.php");

$title = 'Новости';
include 'head.php';
?>
<div class="grid_container">

<header class="header"><h1> Новости </h1></header>
<article class="article"><h2>Текст основной</h2>

<div class="container">
	<div class="content">
		<div class="row">
			<div class="col">
			</div>
			<div class="col">
			</div>
		</div>
	</div>
</div>

</article>

<aside class="aside"><h2>Боковая панель</h2></aside>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
