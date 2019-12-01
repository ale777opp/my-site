<?php session_start();
$title='Личный кабинет';  
include 'site_components/head.php';?> 

<div class="container"><!-- my-5--> 
    <h3 class="text-center"><br>Личный кабинет<br></h3>
   <!--  <h2 class="text-center"><?php echo $_SESSION['name'];?> <?php echo $_SESSION['lastname'];?></h2> -->
    <div class="row">
        <div class="col-md-4 my-5"> 
            <div class="row">
                <p>Имя<br> 
                <span class="letter"> <?php echo $_SESSION['name'];?> </span>
                <i class="fa fa-check-circle-o" aria-hidden="true"></i> 
                <i class="fa fa-ban" aria-hidden="true"></i>
                <br><span class="edit" style="cursor: pointer;"> Редактировать </span>
                </p>
            </div>
            <div class="row">
                <p>Фамилия<br>
                <span class="letter"><?php echo $_SESSION['lastname'];?> </span>
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                <i class="fa fa-ban" aria-hidden="true"></i>
                <br><span class="edit" style="cursor: pointer;"> Редактировать</span>
            </div>
        </div>   
    <div class="col-md-1 my-5"></div>
    <div class="col-md-6 my-5">
        <form onsubmit="send_comment(this);return false;"> <!--action="textarea1.php" method="post" -->
           <div class="form-group"> 
            <p class="btn btn-primary btn-lg btn-block">Введите ваш отзыв</p>
            <p><textarea rows="5" cols="45" name="comment" wrap="hard"><?php echo $_SESSION['comment'];?></textarea></p>
            <input type="submit" value="Отправить" class="btn btn-primary btn-lg btn-block">
           </div>
        </form>
    </div>    
    
    </div>
</div>    

<footer class="fixed-bottom" style="background-color: #dfdfdf; height: 50px; font-size: 1em; font-family: sans-serif; font-style:italic"> <!-- page-footer font-small blue  -->
 <div class="footer-copyright text-center py-3">© Copyright Шувалов Александр, <?php echo date("F Y");?> </div>
</footer>

<script>
    let edits=document.getElementsByClassName('edit');
    let cancels=document.getElementsByClassName('fa-ban');
    let confirms=document.getElementsByClassName('fa-check-circle-o');
    for (let i=0;i<edits.length;i++){
        let text=edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText; 
        edits[i].addEventListener("click",()=>{
        text=edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText; 
        edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML=`<input type="text" style="width:220px;" value="${text}">`;    
        edits[i].style.opacity='0.2';
        confirms[i].style.display='inline';
        cancels[i].style.display='inline';
        });
        cancels[i].addEventListener("click",()=>{
        edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText=text;   
        edits[i].style.opacity='1';
        confirms[i].style.display='none';
        cancels[i].style.display='none';
        });
        confirms[i].addEventListener("click",()=>{
        let text=edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.value;   //firstElementChild
        send(text,i);  
        edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText=text; 
        });
    }
    
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
function send(text,i){
    let xmlhttp=getXmlHttp();
    xmlhttp.open("POST","lk_obr.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('text='+text+'&field='+i);
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4)
            if (xmlhttp.status==200){
                edits[i].previousElementSibling.innerText=text;   
                edits[i].style.opacity='1';;
                confirms[i].style.display='none';
                cancels[i].style.display='none';
            }
    };
};
function send_comment(form){
    let xmlhttp=getXmlHttp();
    let comment='';
    comment=form.elements[0].name+'='+form.elements[0].value+'&';
    xmlhttp.open("POST","add_comm.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(comment);
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4)
            if (xmlhttp.status==200) {
        let div = document.createElement('div');
        div.innerHTML = `<div class="card badge-pill badge-info" style="position:absolute;left:500px;top:250px; width:300px;font-size:20px;"><div class="card-body"><p class="h5" style="text-align: center;"> Спасибо за отзыв.<br>  Комментарий добавлен. </p></div></div>`;
        document.body.append(div);
        setTimeout(() => div.remove(), 1000);
       };
    };
};

</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
<?php session_start();
$title='Личный кабинет';  
include 'site_components/head.php';?> 

<div class="container"><!-- my-5--> 
    <h3 class="text-center"><br>Личный кабинет<br></h3>
   <!--  <h2 class="text-center"><?php echo $_SESSION['name'];?> <?php echo $_SESSION['lastname'];?></h2> -->
    <div class="row">
        <div class="col-md-4 my-5"> 
            <div class="row">
                <p>Имя<br> 
                <span class="letter"> <?php echo $_SESSION['name'];?> </span>
                <i class="fa fa-check-circle-o" aria-hidden="true"></i> 
                <i class="fa fa-ban" aria-hidden="true"></i>
                <br><span class="edit" style="cursor: pointer;"> Редактировать </span>
                </p>
            </div>
            <div class="row">
                <p>Фамилия<br>
                <span class="letter"><?php echo $_SESSION['lastname'];?> </span>
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                <i class="fa fa-ban" aria-hidden="true"></i>
                <br><span class="edit" style="cursor: pointer;"> Редактировать</span>
            </div>
        </div>   
    <div class="col-md-1 my-5"></div>
    <div class="col-md-6 my-5">
        <form onsubmit="send_comment(this);return false;"> <!--action="textarea1.php" method="post" -->
           <div class="form-group"> 
            <p class="btn btn-primary btn-lg btn-block">Введите ваш отзыв</p>
            <p><textarea rows="5" cols="45" name="comment" wrap="hard"><?php echo $_SESSION['comment'];?></textarea></p>
            <input type="submit" value="Отправить" class="btn btn-primary btn-lg btn-block">
           </div>
        </form>
    </div>    
    
    </div>
</div>    

<footer class="fixed-bottom" style="background-color: #dfdfdf; height: 50px; font-size: 1em; font-family: sans-serif; font-style:italic"> <!-- page-footer font-small blue  -->
 <div class="footer-copyright text-center py-3">© Copyright Шувалов Александр, <?php echo date("F Y");?> </div>
</footer>

<script>
    let edits=document.getElementsByClassName('edit');
    let cancels=document.getElementsByClassName('fa-ban');
    let confirms=document.getElementsByClassName('fa-check-circle-o');
    for (let i=0;i<edits.length;i++){
        let text=edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText; 
        edits[i].addEventListener("click",()=>{
        text=edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText; 
        edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML=`<input type="text" style="width:220px;" value="${text}">`;    
        edits[i].style.opacity='0.2';
        confirms[i].style.display='inline';
        cancels[i].style.display='inline';
        });
        cancels[i].addEventListener("click",()=>{
        edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText=text;   
        edits[i].style.opacity='1';
        confirms[i].style.display='none';
        cancels[i].style.display='none';
        });
        confirms[i].addEventListener("click",()=>{
        let text=edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstElementChild.value;   //firstElementChild
        send(text,i);  
        edits[i].previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText=text; 
        });
    }
    
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
function send(text,i){
    let xmlhttp=getXmlHttp();
    xmlhttp.open("POST","lk_obr.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('text='+text+'&field='+i);
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4)
            if (xmlhttp.status==200){
                edits[i].previousElementSibling.innerText=text;   
                edits[i].style.opacity='1';;
                confirms[i].style.display='none';
                cancels[i].style.display='none';
            }
    };
};
function send_comment(form){
    let xmlhttp=getXmlHttp();
    let comment='';
    comment=form.elements[0].name+'='+form.elements[0].value+'&';
    xmlhttp.open("POST","add_comm.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(comment);
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4)
            if (xmlhttp.status==200) {
        let div = document.createElement('div');
        div.innerHTML = `<div class="card badge-pill badge-info" style="position:absolute;left:500px;top:250px; width:300px;font-size:20px;"><div class="card-body"><p class="h5" style="text-align: center;"> Спасибо за отзыв.<br>  Комментарий добавлен. </p></div></div>`;
        document.body.append(div);
        setTimeout(() => div.remove(), 1000);
       };
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