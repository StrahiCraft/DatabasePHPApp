
<html>
    <head>
        <title>CRUD Operacije</title>
        <link rel = "stylesheet" href = "tabelephp/Style/style.css">
        <script src = "tabelephp/script.js"></script>
        <meta name="viewport" content="width=device-width">
    </head>

    <header>
        CRUD Operacije
    </header>
    <nav class= "navigation">
        <div class = "link">
            <a href = "http://localhost/DatabasePHPApp/index.html">HOME</a>
        </div>
    </nav>
    <body>
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
    
    if(isset($_GET['edit_id'])){
        $sql_query = "SELECT * FROM ".$_GET['tableName']." WHERE ".$columnNames[0][0]."=".$_GET['edit_id'];
        $result_set = mysqli_query($connection, $sql_query);
        $fetched_row = mysqli_fetch_array($result_set);
    }

    if(isset($_POST['btn-update'])){
        $columnIndex = 1;
        $columnCount = sizeof($columnNames);

        $columnData = [];

        while($columnIndex < $columnCount){
            $columnData[$columnIndex] = $_POST[$columnNames[$columnIndex][0]];
            $columnIndex++;
        }
        $sql_query = CreateUpdateQuery($_GET['tableName'], $columnNames, $columnData, $columnCount);
        echo $sql_query;
        if(mysqli_query($connection, $sql_query)){
            ?>
            <script type = "text/javascript">
                javascript:try_to_update(true, '<?php echo $_GET['tableName'] ;?>');
            </script>
            <?php
        }
        else{
            ?>
            <script type = "text/javascript">
                javascript:try_to_update(false, '<?php echo $_GET['tableName'] ;?>');
            </script>
            <?php
        }
    }

    if(isset($_POST['btn-cancel'])){
        header("Location: tabelephp/".$_GET['tableName'].".php");
    }
    ?>
        <form method = "post">
            <table align = "center">
                <?php
                $columnIndex = 1;
                $columnCount = sizeof($columnNames);
                while($columnIndex < $columnCount){
                    
                    ?>
                    <tr>
                        <td>
                            <input type = "text" name = "<?php echo $columnNames[$columnIndex][0]?>" placeholder= "<?php echo $columnNames[$columnIndex][0]?>" value= "<?php echo $fetched_row[$columnIndex]?>">
                        </td>
                    </tr>
                    <?php
                    $columnIndex++;
                }
                ?>
                <tr>
                    <td>
                        <button type = "submit" name = "btn-update">PROMENI</button>
                        <button type="submit" name = "btn-cancel">Odustani</button>
                    </td>
                </tr>
            </table>
        </form>
    </body>
