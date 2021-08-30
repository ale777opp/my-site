  <!--
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/beacon.png" type="image/png">
    <link rel="icon" href="img/beacon.png" type="image/png">
    -->
<?php
session_start();
$title = 'Слайд-шоу';
include 'site_components/head.php';
?>


    <script defer src="js/jquery.min.js"></script>
<!-- <title>стартовая страница слайдера</title> -->
<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        overflow: visible;
    }
    .container {
        height: 100%;
        width: 100%;
    }
    .content {
        max-width: 950px;
        margin: 0 auto;
    }
    .photo_main {
        border:3px #7f7f7f solid;
        border-radius: 20px;
        margin:5px;
    }
    .modal {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.6);
        z-index: 1000;
    }
    .modal .modal_content {
        /* background-color: #fefefe; */
        margin: 50px auto 0 auto;
        padding: 10px;
        border: 1px solid #888;
        width: 80%;
        /*z-index: 99999;*/
        height: 50rem;
    }
    .modal .modal_content #close_modal_window {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .table{
        display:grid;
        grid-template-rows: repeat(auto-fit, 210px); /* 4 строки */
        /*grid-template-columns: 25% 25% 25% 25%; /* 4 столбца */
        grid-template-columns: repeat(auto-fit, 25%);
        justify-content: center;
        /* max-width: 400px; */
    }

</style>
</head>
<body>
<?php
    $max_size =200;
    //$IMG_PATH = str_replace('\thumbnails_2','\images',__DIR__);
    define ('IMG_PATH',str_replace('\thumbnails_2','\images',__DIR__));
    //echo IMG_PATH."\n";
    try {
    $dir_content = scandir(IMG_PATH);
    //echo "<pre>";print_r($dir_content);echo "</pre>";
    }
    catch(Exception $e){
    echo "Нераспознанная ошибка: $e";
    }
    finally{}
?>

<div class="container">
  <div class="content" style="align-items:center">
    <div id="my_modal" class="modal">
    <div id="modal_content" class="modal_content">
      <span id="close_modal_window">×</span>
    </div>
    </div>

<div class="table" style="width: 100%">

<?php
foreach ($dir_content as $file_name) {
    if (!is_dir($file_name)) {
//echo "Нераспознанная ошибка:$file_name";
    //$file_name = str_replace('..', '', $file_name);
    $file_name = IMG_PATH.'\\'.$file_name;
    //echo $file_name."\n";
    if (!is_file($file_name)) {
    echo 'Ошибка: файл не найден';
    exit();
    }
    echo "<div class='photo_main' align=center>";
    echo "<img onclick='selected()' src='preview.php?src=${file_name}' alt='webcam_5629.png'>";
    echo "</div>";
    }
}
?>

</div> <!-- table-->
</div> <!-- content -->
</div> <!-- container -->

<?php include 'site_components/footer.php'; ?>

<script type="text/javascript">

function selected() {
let url = event.target.src;
let basename = url.split('slider');
basename = basename[2].split('\\');
let filename = `../${basename.join('/')}`;
let modal = $('#my_modal')[0];
let span = $('#close_modal_window')[0];
modal.style.display = "block";
//modal.attr('style', 'display = "block";');
$('#modal_content').attr('style', `background: url(${filename}) 100% 100% no-repeat; background-size: contain; background-position:center`);

span.onclick = function () {
    modal.style.display = "none";
 }

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
}
</script>
</body>
</html>