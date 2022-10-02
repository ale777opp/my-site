<?php
session_start();
//require_once($_SERVER['DOCUMENT_ROOT'] . "/const.php");

$title = 'Основная страница';
include 'head.php';
?>

<header><h1> Основная страница </h1></header>
<aside>Боковая панель</aside>

<article>Текст основной

<div class="container-fluid">
	<div class="row align-items-center align-self-center">
		<div class="col-xl-4 col-md" align="center">
			<img src="images/IMG-20190801_300.jpg" class="photo_main" alt='IMG-20190801_300.jpg'>
		</div>
		<div class="col-xl-6 col-md align-self-center">
			<p> Привет!</p>
		</div>
	</div>
</div>

</article>

<?php include 'footer.php'; ?>

</body>

</html>