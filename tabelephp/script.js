function edit_id(id, tableName){
    if(confirm('Sigurni ste da zelite promenu podataka?')){
        window.location.href = '\\DatabasePHPApp/' + 'edit_data.php?edit_id=' + id + '&tableName=' + tableName;
    }
}

function add_data(tableName){
    window.location.href = '\\DatabasePHPApp/' + 'add_data.php?tableName=' + tableName;
}

function delete_id(id){
    if(confirm('Sigurni ste da zelite da obrisete podatak?')){
        window.location.href += '?delete_id=' + id;
    }
}

function create_row(row, columnCount){
    for(let columIndex = 1; columIndex < columnCount; columIndex++){
        const cellData = document.createElement('td');
        const cellText = document.createTextNode(row[columIndex]);
        cellData.appendChild(cellText);
        
        const rowIndex = document.getElementsByClassName("row").length - 1

        const element = document.getElementsByClassName("row")[rowIndex];
        element.appendChild(cellData);
    }
}

function try_to_insert_into(succesful, tableName){
    if(succesful){
        alert("Podatak je sacuvan!");
        window.location.href = 'tabelephp/' + tableName + '.php';
        return;
    }
    alert('Greska! Podatak nije dodat!');
}

function try_to_update(succesful, tableName){
    if(succesful){
        alert("Podatak je promenjen uspesno!");
        window.location.href = 'tabelephp/' + tableName + '.php';
        return;
    }
    alert('Greska! Podatak nije promenjen uspesno!');
}