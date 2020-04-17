<?php session_start();
$title='Сайт с back-end';
include 'site_components/head.php';
?>

<div class="container-fluid" style="height: calc(100vh - 200px)">
	    <div class="row" style="margin:7% auto;align-items:center;">
	        <div class="col col-xl-5 text-center">
      	    <img src='site_components/image/IMG-20190801_300.jpg' class="photo_main" alt='Cаня'><!-- <img src="..." class="img-fluid" alt="Адаптивные изображения"> -->
            </div>
		    <div class="col col-xl-7 text-center">
            <p> Привет!<br>Меня зовут Александр.<br> Это мой сайт-портфолио для поиска работы. Он демонстрирует, что я могу сделать в области фотографии, Photoshop-а, дизайна, back-end сайтов.
            Буду благодарен всем, кто зарегистрируется и оставит конструктивные замечания.
                Регистрация на сайте и личный кабинет –элементы back-end сайта.</p>
            </div>
		</div>
</div>
<footer class="fixed-bottom" style="background-color: #dfdfdf; height: 50px; font-size: 1em; font-family: sans-serif; font-style:italic"> <!-- page-footer font-small blue  -->
 <div class="footer-copyright text-center py-3">© Copyright Шувалов Александр, <?php echo date("F Y");?> </div>
</footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>