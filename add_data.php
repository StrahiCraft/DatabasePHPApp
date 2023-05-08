
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD Operacije</title>
        <link rel = "stylesheet" href = "tabelephp/Style/style.css">
        <script src = "tabelephp/script.js"></script>
        <meta name= "viewport" content="width=device-width">
    </head>
    <?php
    include_once dirname(__FILE__).'\dbconfig.php';
    include_once dirname(__FILE__).'\phpfunctions.php';

    $connection = mysqli_connect("$host", "$username", "$password", "baza");

    if(!$connection){
        mysqli_close($connection);
        echo "Greska";
    }
    
    echo "Uspesno uspostavljena konekcija ka bazi";

    $columnNames = GetColumnNames($_GET['tableName'], $connection);
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
        $sql_query = CreateInsertIntoQuery($_GET['tableName'], $columnNames, $columnData, $columnCount);
        if(mysqli_query($connection, $sql_query)){
            ?>
            <script type = "text/javascript">
                javascript:try_to_insert_into(true, '<?php echo $_GET['tableName'] ;?>');
            </script>
            <?php
        }
        else{
            ?>
            <script type = "text/javascript">
                javascript:try_to_insert_into(false, '<?php echo $_GET['tableName'] ;?>');
            </script>
            <?php
        }
    }
    ?>
    <header>
        CRUD Operacije
    </header>
    <nav class= "navigation">
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/index.html">HOME</a>
        </div>
    </nav>
    <body>
        <form method = "post">
            <div class = "inputi">
                <table align = "center">
                    <?php
                    $columnIndex = 1;
                    $columnCount = sizeof($columnNames);
                    while($columnIndex < $columnCount){
                        
                        ?>
                        <tr>
                            <td class = "input-field">
                                <input type = "text" name = "<?php echo $columnNames[$columnIndex][0]?>" placeholder= "<?php echo $columnNames[$columnIndex][0]?>" required*/>
                            </td>
                        </tr>
                        <?php
                        $columnIndex++;
                    }
                    ?>
                    <tr>
                        <td>
                            <button type = "submit" name = "btn-save">Sacuvaj</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
