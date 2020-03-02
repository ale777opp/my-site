<?php
session_start();
$title='Авторизация';
include 'site_components/head.php';
?> 

<div class="container my-5">
    <h1 class="text-center"> Вход на сайт </h1>
    <div class="row justify-content-center" >
        <div class="col-5 text-center" id="content">
            <form onsubmit="send(this);return false;">
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                        </div>
                    <input required name="login" type="text" class="form-control" placeholder="Логин"> <!--id="inlineFormInputGroup" -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                        </div>
                    <input required name="pass" type="password" class="form-control" placeholder="Пароль">
                    </div> 
                </div>
                <input class="form-control btn btn-primary" type="submit" value="Войти">
            </form>
            <span id="info" style="color:red;"> </span>
        </div>
    </div>
</div>

<footer class="fixed-bottom" style="background-color: #dfdfdf; height: 50px; font-size: 1em; font-family: sans-serif; font-style:italic"> <!-- page-footer font-small blue  -->
 <div class="footer-copyright text-center py-3">© Copyright: <?php echo date("F Y");?> Шувалов Александр</div>
</footer>

<script>
function getXmlHttp(){
  let xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  };
  return xmlhttp;
}
function send(form){
    let xmlhttp=getXmlHttp();
    let data='';
    for (let i=0;i<form.length-1;i++){
        data+=form.elements[i].name+'='+form.elements[i].value+'&';
    };
    xmlhttp.open("POST","auth_obr.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4)
            if (xmlhttp.status==200)
                if (xmlhttp.responseText==0) info.innerText="Неверный логин/пароль";//window.open("lk.php") content.innerHTML=window.location.href="lk.php";
                    else location.href="lk.php";
    };
};
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>