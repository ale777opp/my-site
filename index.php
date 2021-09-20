<?php
session_start();
$_SESSION['PATH_MAIN'] =__DIR__;
//echo "<pre>сессия";print_r($_SESSION['PATH_MAIN']."\const.php");echo "</pre><br>";
require_once($_SESSION['PATH_MAIN']."\const.php");

spl_autoload_register(function($controller){
    require_once PATH_CONTROL.$controller. '.php';
});
//echo "<pre>";print_r(PATH_COMPONENTS);echo "</pre>";
$title='Сайт - презентация';
//echo "<pre>head";print_r(PATH_COMPONENTS.'head.php');echo "</pre><br>";
include PATH_COMPONENTS.'head.php';
?>

<div class="container-fluid"> <!-- style="height: calc(100vh - 100px)" -->
	<div class="row" style="align-items:center;">
	  <div class="col-md col-xl-5 text-center">
      <img src="<?=PATH_IMG?>IMG-20190801_300.jpg" class="photo_main" alt='IMG-20190801_300.jpg'>
    </div>
	    <div class="col-md col-xl-7 text-center">
        <p> Привет!<br>Меня зовут Александр.<br> Это мой сайт-портфолио для поиска работы. Он демонстрирует, что я могу сделать в области фотографии, Photoshop-а, дизайна, back-end сайтов. Буду благодарен всем, кто зарегистрируется и оставит конструктивные замечания. Регистрация на сайте и личный кабинет –элементы back-end сайта.
        </p>
      </div>
	</div>
</div>

<?php include PATH_COMPONENTS.'footer.php'; ?>

</body>
</html>