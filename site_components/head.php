<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel='stylesheet' href='site_components/style/style.css'>
    <title><?php echo $title?></title>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(55679959, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/55679959" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

 <script>
    function patch(){
        let div = document.createElement('div');
        div.innerHTML = `<div class="card badge-warning" style="position:absolute;left:400px;top:250px; width:500px;background-color:#daa520;font-size:20px;"><div class="card-body"><p class="h5 text-center">В настоящий момент данный пункт меню находится в разработке</p></div></div>`;
        document.body.append(div);
        setTimeout(() => div.remove(), 2000);
    }
</script>
   </head>
  
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.php">Главная</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
              
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
               <a class="nav-link" href="slider.php">Мои фото<span class="sr-only">(current)</a> 
              </li>
              <?php if(empty($_SESSION['id'])): ?>
                <li class="nav-item">
                <a class="nav-link disabled" href="lk.php">Личный кабинет</a>
                </li> 
             <?php else: ?>
                 <li class="nav-item">
                <a class="nav-link" href="lk.php">Личный кабинет</a>
                </li> 
             <?php endif ?>
             
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="patch()">Контакты</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="patch()">Отзывы</span></a>  
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Список проектов</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="desknote/desknote.php">DeskNote</a>
                  <a class="dropdown-item" href="#" onclick="patch()">Кофе-машина</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" onclick="patch()">Парсер</a>
                </div>
              </li>
            </ul>
            <?php if(empty($_SESSION['id'])): ?>
            <a class ="btn btn-outline-primary mr-sm-2" href="auth.php">Вход</a> <!--btn btn-primary -->
            <a class ="btn btn-outline-primary my-2 my-sm-0" href="reg.php">Регистрация</a>
             <?php else: ?>
             <a class ="btn btn-outline-primary my-2 my-sm-0" href="exit.php">Выход</a>
             <?php endif ?>
        </div>
     </nav>