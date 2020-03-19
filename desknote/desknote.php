<?php session_start();
$title='Проект "DeskNote"';
?> 

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
    <title>Проект "DeskNote"</title>
  <style>
  body{
    background-image: url(../site_components/image/cork-board-background.jpg);      
    background-position: center center;      
    background-repeat: no-repeat;      
    background-attachment: fixed;      
    background-size: cover;      
    } 
   .pack {
      width:150px;
      height:50px;
      margin:5px;
      background:#dfdfdf;
      padding: 7px;
      border: solid 2px black;
      border-radius: 10px;
      box-shadow: 0.4em 0.4em 10px rgba(122,122,122,0.5);
      cursor:pointer;
    } 
    .note {
      width:200px;
      height:200px;
      background: #ffff00;
      color: #0000ff;
	  text-align:center;
      border: solid 2px black;
      box-shadow: 0.4em 0.4em 10px rgba(122,122,122,0.5);
      position:fixed;
      cursor:pointer;
      word-break: break-all;
    } 
    .pencil,.del{
        cursor:pointer;
        color:blue;
    }
    .pencil:hover,.del:hover{
    color:DeepSkyBlue;
    }
    .refreshEdit{
        cursor:pointer;
        color:green;
    }
    .refreshEdit:hover {
        color:lime;
    }
    .banEdit{
        cursor:pointer;
        color:darkred;
    }
    .banEdit:hover {
        color:red;
    }
  </style>
</head>

<body scroll="no">

<div class="pack" style="color:#daa520" onclick="is_New()"><i class="fa fa-book fa-3x" aria-hidden="true"></i> Личные </div>  
<div class="pack" style="color:#FF3300" onclick="is_New()"><i class="fa fa-book fa-3x" aria-hidden="true"></i> Работа </div> 
<div class="pack" style="color:#228b22" onclick="is_New()"><i class="fa fa-book fa-3x" aria-hidden="true"></i> Дом </div> 
<div class="pack" onclick="location.href ='../index.php'"><i class="fa fa-sign-out fa-3x" aria-hidden="true"></i> Выход </div> 

<?php 
$dbhost='localhost';// хост базы
$dbuser='v903177m_edu';// пользователь базы
$dbpass='';//пароль входа в БД
$dbname='v903177m_edu';//имя БД
$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli-> set_charset("utf8");

$result = $mysqli->query("SELECT * FROM `text_note`");

while ($row = $result->fetch_assoc()) {
    echo '<div class="note" id="'.$row['id'].'" style="background:#'.$row['color'].'; top:'.$row['y_coord'].'px; left:'.$row['x_coord'].'px;">  
            <div title="Элементы редактирования" style="padding-top:4px;">
            <button class="pencil"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button class="refresh" disabled><i class="fa fa-refresh" aria-hidden="true"></i></button>
            <button class="ban" disabled><i class="fa fa-ban" aria-hidden="true"></i></button>
            <button class="del"; onclick="is_Del()"><i>DEL</i></button>
            &nbsp;#<span>'.$row['id'].'</span>
            <hr>
            </div>
            <div>
                <span> '.$row['text_note'].' </span> 
            </div>
          </div>';
}
?>

<script>
/*$('.el').click(function(){
    $(this).toggleClass('active');
}); */
    let notes=document.getElementsByClassName("note");
    let pencils=document.getElementsByClassName('pencil');
    let cancels=document.getElementsByClassName('ban');
    let confirms=document.getElementsByClassName('refresh'); 
    let dels=document.getElementsByClassName('del');
    
for (let i=0;i<notes.length;i++){
    //("редакция");
        pencils[i].addEventListener('click',()=>{
        text=notes[i].children[1].innerText;     
        notes[i].children[1].innerHTML=`<textarea class="form-control" aria-label="With textarea" maxlength="210" cols="24" rows="9">${text}</textarea>`; 
       
        pencils[i].style.display='none';
        dels[i].style.display='none';
        
        cancels[i].disabled=false;
        confirms[i].disabled=false;
        
        cancels[i].classList.add('banEdit');
        confirms[i].classList.add('refreshEdit');
        });
    //("отмена");        
        cancels[i].addEventListener('click',()=>{
        notes[i].children[1].innerHTML=`<span>${text}</span>`;
        
        pencils[i].style.display='inline';
        dels[i].style.display='inline';
        
        cancels[i].disabled=true;
        confirms[i].disabled=true;
        
        cancels[i].classList.remove('banEdit');
        confirms[i].classList.remove('refreshEdit');
        });
    //("подтверждение");    
        confirms[i].addEventListener('click',()=>{ 
        text=notes[i].children[1].children[0].value;
        send(id,text,note.offsetLeft,note.offsetTop);
        notes[i].children[1].innerHTML=`<span>${text}</span>`;
        
        pencils[i].style.display='inline';
        dels[i].style.display='inline';
        
        cancels[i].disabled=true;
        confirms[i].disabled=true;
        
        cancels[i].classList.remove('banEdit');
        confirms[i].classList.remove('refreshEdit');
        });
notes[i].addEventListener('mousedown', dragAndDrop);        
}
        function dragAndDrop(event) {
        note = event.currentTarget;
        id = note.children[0].children[4].innerText;
        if (event.target!=note) {return false};
        note.ondragstart = function() {return false;};
       
        moveAt(event.pageX, event.pageY);
        
        function moveAt(pageX, pageY) {
        coord_x=pageX-note.offsetWidth/2;
        coord_y=pageY-note.offsetHeight/2; 
          note.style.left = coord_x +'px';
          note.style.top = coord_y+'px';
        };
        
        function onMouseMove(event) {
          moveAt(event.pageX, event.pageY);
        };
        document.addEventListener('mousemove', onMouseMove);
        note.onmouseup = function() {
          document.removeEventListener('mousemove', onMouseMove);
          text=note.children[1].innerText;
          send(id,text,coord_x,coord_y);
          note.onmouseup = null;
        };
     }; 

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
function send(id,text,pageX,pageY){
    let xmlhttp=getXmlHttp();
    xmlhttp.open("POST","desknote_obr.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('id='+id+'&'+'text='+text+'&'+'x_coord='+pageX+'&'+'y_coord='+pageY+'&');
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4)
            if (xmlhttp.status!=200)  console.log('Ошибка базы данных');  
    };
};  

function is_New (){
       
        let color = event.currentTarget.style.color;  
        switch (color) {
        case "rgb(218, 165, 32)":
            color="FFFF00";
            break;
        case "rgb(34, 139, 34)":
            color="00FF00";
            break;
        case "rgb(255, 51, 0)":
            color="FF3300";
        break;
        };
        
    let xmlhttp=getXmlHttp();
    xmlhttp.open("POST","new_note.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('color='+color+'&');
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4)
            if (xmlhttp.status!=200)  console.log('Ошибка базы данных');
            else location.href ="desknote.php";
        };

};

function is_Del (){

    id = note.children[0].children[4].innerText;
    let xmlhttp=getXmlHttp();
    xmlhttp.open("POST","del_note.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('id='+id+'&');
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4)
            if (xmlhttp.status!=200)  console.log('Ошибка базы данных');  
            else location.href ="desknote.php";
        };
};
</script>    
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
</html>
