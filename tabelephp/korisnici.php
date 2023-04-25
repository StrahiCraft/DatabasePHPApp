<?php
include_once dirname(__FILE__, 2).'\dbconfig.php';

$connection = mysqli_connect("$host", "$username", "$password", "baza");

if(!$connection){
    mysqli_close($connection);
    echo "Greska";
}

$currentTable = "korisnici";

echo "Uspesno uspostavljena konekcija ka bazi";

if(isset($_GET['delete_id'])){
    $sql_query = "DELETE FROM ".$currentTable." WHERE id_korisnika =".$_GET['delete_id'];
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
    <nav class= "navigation">
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/igrice.php">IGRICE</a>
        </div>
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/korisnici.php">KORISNICI</a>
        </div>
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/moderatori_igrice.php">MODERATORI IGRICE</a>
        </div>
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/moderatori.php">MODERATORI</a>
        </div>
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/run_ovi_korisnici.php">RUNOVI KORISNICI</a>
        </div>
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/run_ovi.php">RUNOVI</a>
        </div>
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/socijalne_medije.php">SOCIJALNE MEDIJE</a>
        </div>
    </nav>
    <body>
        <script type="text/javascript">
            javascript:set_current_table_name("korisnici");
        </script>
        <table align = "center" class = "tabela">
            <tr>
                <th colspan="5"><a href = "/DatabasePHPApp/add_data.php">Dodaj podatak</a></th>
            </tr>
            <tr>
                <th>Korisnicko ime</th>
                <th>Lozinka</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Email adresa</th>
                <th>id_socijalnih_medija</th>
                <th colspan = "2">Operacija</th>
            </tr>
            <?php
            $sql_query = "SELECT * FROM korisnici";
            $result_set = mysqli_query($connection, $sql_query);

            while($row = mysqli_fetch_row($result_set)){
                ?>
                <tr class = "row">
                    <script type = "text/javascript">
                        javascript:create_row(<?php echo json_encode($row)?>, <?php echo count($row)?>);
                    </script>
                    <td align = "center"><a href = "javascript:edit_id('<?php echo $row[0]; ?>')"><img src = "/DatabasePHPApp/Images/b_edit.png" align = "EDIT"></a></td>
                    <td align = "center"><a href = "javascript:delete_id('<?php echo $row[0]; ?>')"><img src = "/DatabasePHPApp/Images/b_drop.png" align = "DELETE"></a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
