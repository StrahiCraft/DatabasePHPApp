<?php
include_once dirname(__FILE__, 2).'\dbconfig.php';

$connection = mysqli_connect("$host", "$username", "$password", "baza");

if(!$connection){
    mysqli_close($connection);
    echo "Greska";
}

echo "Uspesno uspostavljena konekcija ka bazi";

if(isset($_GET['delete_id'])){
    $sql_query = "DELETE FROM run_ovi WHERE id_runa =".$_GET['delete_id'];
    mysqli_query($connection, $sql_query);
    header("Location: $_SERVER[PHP_SELF]");
}

?>

<html>
    <head>
        <title>CRUD Operacije</title>
        <link rel = "stylesheet" href = "Style/style.css">
        <script src = "script.js"></script>
    </head>
    <header>
        CRUD Operacije
    </header>
    <body>
        <table align = "center">
            <tr>
                <th colspan="5"><a href = "/add_data.php">Dodaj podatak</a></th>
            </tr>
            <tr>
                <th>Vreme</th>
                <th>Kategorija</th>
                <th>Datum</th>
                <th>Platforma</th>
                <th>id_igrice</th>
                <th>id_moderatora</th>
            </tr>
            
        </table>
    </body>
