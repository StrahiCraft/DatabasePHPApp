
<html>
    <head>
        <title>CRUD Operacije</title>
        <link rel = "stylesheet" href = "tabelephp/Style/style.css">
        <script src = "tabelephp/script.js"></script>
    </head>
    <script type = "text/javascript">
        javascript:get_current_table_name();
    </script>
    <?php
    include_once dirname(__FILE__).'\dbconfig.php';
    include_once dirname(__FILE__).'\phpfunctions.php';

    $connection = mysqli_connect("$host", "$username", "$password", "baza");

    if(!$connection){
        mysqli_close($connection);
        echo "Greska";
    }
    
    echo "Uspesno uspostavljena konekcija ka bazi";

    $columnNames = GetColumnNames($_COOKIE['tableName'], $connection);
    //vraceno kao 2D niz kod kog je 1. dimenzija kolone, a u 2. ^
    //staviti 0 za ime kolone i 1 za tip podataka

    if(isset($_POST['btn-save'])){
        $columnIndex = 1;
        $columnCount = sizeof($columnNames);

        $columnData = [];

        while($columnIndex < $columnCount){
            $columnData[$columnIndex] = $_POST[$columnNames[$columnIndex][0]];
            $columnIndex++;
        }
        $sql_query = CreateInsertIntoQuery($_COOKIE['tableName'], $columnNames, $columnData, $columnCount);
        //$sql_query = "INSERT INTO run_ovi(vreme, kategorija, datum, platforma, id_igrice, id_moderatora) VALUES('01:37:35', 'any percent', '2022-11-22', 'N64', '1', '1')";
        if(mysqli_query($connection, $sql_query)){
            ?>
            <script type = "text/javascript">
                //javascript:try_to_insert_into(true);
                alert('Podatak je sacuvan ');
                window.location.href = 'tabelephp/run_ovi.php';
            </script>
            <?php
        }
        else{
            ?>
            <script type = "text/javascript">
                //javascript:try_to_insert_into(false);
                alert('Greska! Podatak nije dodat! ');
            </script>
            <?php
        }
    }
    ?>
    <header>
        CRUD Operacije
    </header>
    <body>
        <form method = "post">
            <table align = "center">
                <?php
                $columnIndex = 1;
                $columnCount = sizeof($columnNames);
                while($columnIndex < $columnCount){
                    
                    ?>
                    <tr>
                        <td>
                            <input type = "text" name = "<?php echo $columnNames[$columnIndex][0]?>" placeholder= "<?php echo $columnNames[$columnIndex][0]?>" /*required*/>
                        </td>
                    </tr>
                    <?php
                    $columnIndex++;
                }
                ?>
                <tr>
                    <td>
                        <button type = "submit" name = "btn-save"><strong>Sacuvaj</strong></button>
                    </td>
                </tr>
            </table>
        </form>
    </body>
