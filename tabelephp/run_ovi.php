<?php
include_once dirname(__FILE__, 2).'\dbconfig.php';

$connection = mysqli_connect("$host", "$username", "$password", "baza");

if(!$connection){
    mysqli_close($connection);
    echo "Greska";
}

$currentTable = "run_ovi";

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
        <table align = "center" class = "tabela">
            <tr>
                <th colspan="5"><a href = "/DatabasePHPApp/add_data.php">Dodaj podatak</a></th>
            </tr>
            <tr>
                <th>Vreme</th>
                <th>Kategorija</th>
                <th>Datum</th>
                <th>Platforma</th>
                <th>id_igrice</th>
                <th>id_moderatora</th>
                <th colspan = "2">Operacija</th>
            </tr>
            <?php
            $sql_query = "SELECT * FROM run_ovi";
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
