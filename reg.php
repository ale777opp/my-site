<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/const.php");
$title='Регистрация';
include PATH_MAIN.PATH_COMPONENTS.'head.php';
?>

<div id="content" style="display: flex;justify-content: center;align-items: center;height: 100vh;">
    <form class="form" onsubmit="send(this);return false;"> <!--  action="site_components/controllers/reg_obr.php" method="POST"     -->
	   <h1 class="form_title"> Регистрация </h1>
     <span id="info" style="color:red;"> </span>
				 <div class="form_group">
                    <input required name="name" type="text" class="form_input" placeholder=" ">
					<label class="form_label">Имя</label>
               </div>

			 <div class="form_group">
                    <input required name="lastname" type="text" class="form_input" placeholder=" ">
					<label class="form_label">Фамилия</label>
               </div>

	          <div class="form_group">
                    <input required name="login" type="text" class="form_input" placeholder=" ">
					<label class="form_label">Логин</label>
               </div>
			   <div class="form_group">
				    <input required name="pass" type="password" class="form_input" placeholder=" ">
					<label class="form_label">Пароль</label>
         </div>
	
			   <input class="form-control btn btn-primary form_button" type="submit" value="Отправить" style="margin-top:30px"> <!--  -->
	</form>
</div>

<script>
let content=document.getElementById('content');
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
  }
  return xmlhttp;
}
function send(form){
    let xmlhttp=getXmlHttp();
    let data='';
    for (let i=0;i<form.length-1;i++){
        data+=form.elements[i].name+'='+form.elements[i].value+'&';
    };
    xmlhttp.open("POST","site_components/controllers/reg_obr.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4)
            if (xmlhttp.status==200)
            if (xmlhttp.responseText==0) info.innerText= "Ошибка регистрации. Пользователь уже зарегистрирован";
            else content.innerHTML=`<i style="font-size:8rem; color:green; display: inline-block;" class="fa fa-check-circle-o fa-3x" aria-hidden="true"></i>
            <p class="h3">Вы успешно зарегистрированы, можете
            <a href="auth.php"> авторизоваться </a></p>`;
    };
};
</script>

<?php include PATH_MAIN.PATH_COMPONENTS.'footer.php'; ?>

    <!--
      Optional JavaScript
      jQuery first, then Popper.js, then Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
-->
</body>
</html>
