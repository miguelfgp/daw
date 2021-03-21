<?php

  if(isset($_POST['producto1']) && !is_null($_POST['producto1'])){
    setcookie("producto1",$_POST['numero1'],time()+86400);
    if($_COOKIE['producto2']==null){
      setcookie("producto2",0,time()+86400);
    }
    if($_COOKIE['producto3']==null){
      setcookie("producto3",0,time()+86400);
    }
    if($_COOKIE['producto4']==null){
      setcookie("producto4",0,time()+86400);
    }
  }

  else if(isset($_POST['producto2']) && !is_null($_POST['producto2'])){
    setcookie("producto2",$_POST['numero2'],time()+86400);
    if($_COOKIE['producto1']==null){
      setcookie("producto1",0,time()+86400);
    }
    if($_COOKIE['producto3']==null){
      setcookie("producto3",0,time()+86400);
    }
    if($_COOKIE['producto4']==null){
      setcookie("producto4",0,time()+86400);
    }
  }

  else if(isset($_POST['producto3']) && !is_null($_POST['producto3'])){
    setcookie("producto3",$_POST['numero3'],time()+86400);
    if($_COOKIE['producto1']==null){
      setcookie("producto1",0,time()+86400);
    }
    if($_COOKIE['producto2']==null){
      setcookie("producto2",0,time()+86400);
    }
    if($_COOKIE['producto4']==null){
      setcookie("producto4",0,time()+86400);
    }
  }

  else if(isset($_POST['producto4']) && !is_null($_POST['producto4'])){
    setcookie("producto4",$_POST['numero4'],time()+86400);
    if($_COOKIE['producto1']==null){
      setcookie("producto1",0,time()+86400);
    }
    if($_COOKIE['producto2']==null){
      setcookie("producto2",0,time()+86400);
    }
    if($_COOKIE['producto3']==null){
      setcookie("producto3",0,time()+86400);
    }
  }

  else{
    if($_COOKIE['producto1']==null){
      setcookie("producto1",0,time()+86400);
    }
    if($_COOKIE['producto2']==null){
      setcookie("producto2",0,time()+86400);
    }
    if($_COOKIE['producto3']==null){
      setcookie("producto3",0,time()+86400);
    }
    if($_COOKIE['producto4']==null){
      setcookie("producto4",0,time()+86400);
    }  
  }

  //Llamamos al carrito
  header('Location:carrito.php');
?>
