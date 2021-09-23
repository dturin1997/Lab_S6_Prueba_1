<?php
include_once 'db.php';  //Llamada de un archivo, 
                        //el one lo carga una vez
/* Codigo para realizar insercion */
if(isset($_POST['save'])){
    $fn=$MySQLiconn->real_escape_string($_POST['fn']);
    $ln=$MySQLiconn->real_escape_string($_POST['ln']);

    $SQL=$MySQLiconn->query("INSERT INTO data(fn,ln) VALUES('$fn','$ln')");

    if(!$SQL){
        echo $MySQLiconn->error;
    }
}
/* Codigo para el Delete */
if(isset($_GET['del'])){
    $SQL=$MySQLiconn->query("DELETE FROM data WHERE id=".$_GET['del']);
    //Enviar cosas por header
    header("Location: index.php");
    
}
/* Codigo para el Update */
//Parte 1
if(isset($_GET['edit'])){
    $SQL=$MySQLiconn->query("SELECT * FROM data WHERE id=".$_GET['edit']);
    $getRow=$SQL->fetch_array();  
}
//Parte 2
if(isset($_POST['update'])){
    $SQL=$MySQLiconn->query("UPDATE data SET 
    fn='".$_POST['fn']."', ln='".$_POST['ln']."' WHERE id=".$_GET['edit']);
    header("Location: index.php");
}
?>