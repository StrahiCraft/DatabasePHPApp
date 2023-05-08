<?php
include_once dirname(__FILE__, 2).'\dbconfig.php';

$connection = mysqli_connect("$host", "$username", "$password", "$database");

if(!$connection){
    mysqli_close($connection);
    echo "Greska";
}

$currentTable = "moderatori";

echo "Uspesno uspostavljena konekcija ka bazi";

if(isset($_GET['delete_id'])){
    $sql_query = "DELETE FROM ".$currentTable." WHERE id_moderatora =".$_GET['delete_id'];
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
            <a href = "http://localhost/DatabasePHPApp/index.html">HOME</a>
        </div>
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/igrice.php">IGRICE</a>
        </div>
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/korisnici.php">KORISNICI</a>
        </div>
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/tabelephp/moderatori_igrice.php">MODERATORI IGRICE</a>
        </div>
        <div class = "link" id = "current-table">
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
        <div class = "tabela">
            <table align = "center">
                <tr>
                    <th colspan="8"><a href = "javascript:add_data('<?php echo $currentTable; ?>')" class = "add-data">Dodaj podatak</a></th>
                </tr>
                <tr class = "row-header">
                    <th>Korisnicko ime</th>
                    <th>Lozinka</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>E mail adresa</th>
                    <th>Drzava porekla</th>
                    <th colspan = "2">Operacija</th>
                </tr>
                <?php
                $sql_query = "SELECT * FROM ".$currentTable;
                $result_set = mysqli_query($connection, $sql_query);
    
                while($row = mysqli_fetch_row($result_set)){
                    ?>
                    <tr class = "row">
                        <script type = "text/javascript">
                            javascript:create_row(<?php echo json_encode($row)?>, <?php echo count($row)?>);
                        </script>
                        <td align = "center"><a href = "javascript:edit_id('<?php echo $row[0]; ?>', '<?php echo $currentTable; ?>')"><img src = "/DatabasePHPApp/Images/b_edit.png" align = "EDIT"></a></td>
                        <td align = "center"><a href = "javascript:delete_id('<?php echo $row[0]; ?>')"><img src = "/DatabasePHPApp/Images/b_drop.png" align = "DELETE"></a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </body>
