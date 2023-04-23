<?php
function GetColumnNames(string $tableName, $connection)
{
    $sql_query = "SHOW COLUMNS FROM ".$tableName;
    $result = mysqli_query($connection, $sql_query);

    $rows = [];
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}
function CreateInsertIntoQuery($tableName, $columnNames, $columnData, $columnCount){
    $sql_query = "INSERT INTO ".$tableName."(";
    $columIndex = 1;
    while($columIndex < $columnCount - 1){
        $sql_query .= $columnNames[$columIndex][0].", ";
        $columIndex++;
    }
    $sql_query .= $columnNames[$columnCount - 1][0].") VALUES(";
    $columIndex = 1;
    while($columIndex < $columnCount - 1){
        $sql_query .= "'".$columnData[$columIndex]."', ";
        $columIndex++;
    }
    $sql_query .= $columnData[$columnCount - 1].")";
    return $sql_query;
}
?>