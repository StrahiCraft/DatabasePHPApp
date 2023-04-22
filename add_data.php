<?php
include_once dirname(__FILE__).'\dbconfig.php';

$connection = mysqli_connect("$host", "$username", "$password", "baza");

if($connection){
    echo $currentTable;
}

if(isset($_POST['btn-save'])){
    
}
?>

<html>
    <head>
        <title>CRUD Operacije</title>
        <link rel = "stylesheet" href = "tabelephp/Style/style.css">
        <script src = "tabelephp/script.js"></script>
    </head>
    <header>
        CRUD Operacije
    </header>
    <body>
        
    </body>
