<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title?></title>
  <link rel="stylesheet" type="text/css" href="css/main_style.css">
<!--[if lt IE 9]>
 <script>
  var e = ("article,aside,figcaption,figure,footer,header,hgroup,nav,section,time").split(',');
  for (var i = 0; i < e.length; i++) {
    document.createElement(e[i]);
  }
 </script> 
<![endif]-->
</head>

<body>
  <nav>
    <ul>
      <li>
        <button type="button"><span class="icon">Кнопка</span></button>
        <a href="/main">Главная</a>
      </li>  
      <li><a href="/photo">Мои фото</a></li>
      <li><a href="/news">Новости</a></li>
      <li><a href="/projects">Проекты</a></li>
      <li><a href="/contacts">Контакты</a></li>
        <?php if(empty($_SESSION['id'])): ?>
        <li><a href="/accounts">Личный кабинет</a></li>
        <?php else: ?>
        <li><a href="/accounts">Личный кабинет</a></li>
        <?php endif ?>
    </ul>
    <div class="buttons">
      <?php if(empty($_SESSION['id'])): ?>
      <button type="button"><a href="/auth">Вход</a></button>
      <button type="button"><a href="/reg">Регистрация</a></button>
      <?php else: ?>
      <button type="button"><a href="/exit">Выход</a></button>
        <?php endif ?>
    </div>  
  </nav>
