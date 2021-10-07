<?php
session_start();
require_once($_SESSION['PATH_MAIN']."\const.php");
$title = 'Слайд-шоу';
include PATH_MAIN.PATH_COMPONENTS.'head.php';

    $max_size =IMG_SIZE;
    //echo "<pre>PATH_SLIDER => ";print_r(PATH_MAIN.PATH_SLIDER);echo "</pre><br>";
    try {
    $dir_content = scandir(PATH_MAIN.PATH_SLIDER);
    }
    catch(Exception $e){
    echo "Ошибка сканирования: $e <br>";
    }
    finally{}
?>
<!--
<script type="text/javascript">
    $(img).on("load", function(){
                $('.img').css('background-image', 'url(' + imglist[index-1] + ')');
                $('.loading').hide();
            });
</script>
-->
<div class="container">
  <!-- <div class="content"> -->
    <div id="my_modal" class="modal">
    <div id="modal_content" class="modal_content">
      <span id="close_modal_window">×</span>
    </div>
  </div>

<div class="table"> <!-- style="width: 100%" -->

<?php
foreach ($dir_content as $file_name) {
    $file_name = "../image/slider/".$file_name;
    if (!is_dir($file_name)) {
       if (!is_file($file_name)) {echo 'Ошибка: файл не найден';
    }else{
    echo "<div class='photo_thumbnails' align=center>";
    echo "<img onclick='selected()' src='preview.php?src=${file_name}' alt='webcam_5629'>";
    echo "</div>";
    }
    }
}
?>

</div> <!-- table-->
<!--</div>  content -->
</div> <!-- container -->

<?php include PATH_MAIN.PATH_COMPONENTS.'footer.php'; ?>

<script> //type="text/javascript"

function selected() {
let url = event.target.src;
let basename = url.split('slider');
let filename = "../image/slider/"+ basename[1].slice(1);
//let filename = "<?=PATH_SLIDER?>"+ basename[1].slice(1);
let modal = $('#my_modal')[0];
let span = $('#close_modal_window')[0];
modal.style.display = "block";
//modal.attr('style', 'display = "block";');
$('#modal_content').attr('style', `background: url(${filename}) no-repeat; background-size: contain;background-position: center center;`);

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