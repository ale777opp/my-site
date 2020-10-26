<?php session_start();
$title='Сайт - презентация';
include 'site_components/head.php';
?>

<div class="container-fluid"> <!-- style="height: calc(100vh - 100px)" -->
	    <div class="row" style="align-items:center;">
	        <div class="col-md col-xl-5 text-center">
      	    <img src='site_components/image/IMG-20190801_300.jpg' class="photo_main" alt='IMG-20190801_300.jpg'>
      	    </div>
		    <div class="col-md col-xl-7 text-center">
            <p> Привет!<br>Меня зовут Александр.<br> Это мой сайт-портфолио для поиска работы. Он демонстрирует, что я могу сделать в области фотографии, Photoshop-а, дизайна, back-end сайтов.
            Буду благодарен всем, кто зарегистрируется и оставит конструктивные замечания.
                Регистрация на сайте и личный кабинет –элементы back-end сайта.</p>
            </div>
		</div>
</div>
<footer class="fixed-bottom"> 
 <div class="footer-copyright text-center py-3">© Copyright Шувалов Александр, <?php echo date("F Y");?> </div>
</footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>