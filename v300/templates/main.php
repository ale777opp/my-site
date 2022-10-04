<?php
session_start();
//require_once($_SERVER['DOCUMENT_ROOT'] . "/const.php");

$title = 'Основная страница';
include 'head.php';
?>

<div class="grid_container">

<header class="header"><h1> Основная страница </h1></header>
<article class="article"><h2>Текст основной</h2>

	<div class="container">
		<div class="row">
			<div class="col">
				<img src="images/IMG-20190801_300.jpg" class="photo_main" alt='IMG-20190801_300.jpg'>
			</div>
			<div class="col">
				<p> Привет!</p>
			</div>
		</div>
	</div>

</article>

<aside class="aside"><h2>Боковая панель</h2></aside>
</div>

<?php include 'footer.php'; ?>
</body>
</html>