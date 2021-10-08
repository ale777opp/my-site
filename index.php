<?php
session_start();
//$_SESSION['PATH_MAIN'] = $_SERVER['DOCUMENT_ROOT']; //dirname(__FILE__);
//echo "<pre>";print_r($_SERVER);echo "</pre>";
require_once($_SERVER['DOCUMENT_ROOT']."/const.php");
/*
spl_autoload_register(function($controller){
require_once PATH_CONTROL.$controller. '.php';
});
*/

$title='Сайт - презентация';
include PATH_MAIN.PATH_COMPONENTS.'head.php';
?>

<div class="container-fluid">
	<div class="row align-items-center align-self-center">
	  <div class="col-xl-4 col-md" align="center">
      	<img src="<?=PATH_IMG?>IMG-20190801_300.jpg" class="photo_main" alt='IMG-20190801_300.jpg'>
      </div>
	  <div class="col-xl-6 col-md align-self-center">
        <p> Привет!<br>Меня зовут Александр.<br> Это мой сайт-портфолио для поиска работы. Он демонстрирует, что я могу сделать в области фотографии, Photoshop-а, дизайна, back-end сайтов. Буду благодарен всем, кто зарегистрируется и оставит конструктивные замечания. Регистрация на сайте и личный кабинет –элементы back-end сайта.
        </p>
      </div>
	</div>
</div>

<?php include PATH_MAIN.PATH_COMPONENTS.'footer.php'; ?>

</body>
</html>