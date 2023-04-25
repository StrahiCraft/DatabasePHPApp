
let tableName = "index";

function edit_id(id){
    if(confirm('Sigurni ste da zelite promenu podataka?')){
        window.location.href = '\\DatabasePHPApp/' + 'edit_data.php?edit_id=' + id;
    }
}

function delete_id(id){
    if(confirm('Sigurni ste da zelite da obrisete podatak?')){
        window.location.href = tableName + '.php?delete_id=' + id;
    }
}

function create_row(row, columnCount){
    for(let columIndex = 1; columIndex < columnCount; columIndex++){
        const cellData = document.createElement('td');
        const cellText = document.createTextNode(row[columIndex]);
        cellData.appendChild(cellText);
        
        const rowIndex = document.getElementsByClassName("row").length - 1

        const element = document.getElementsByClassName("row")[rowIndex];
        element.classList.add('gg'); // ovo mozda treba da se skloni
        element.appendChild(cellData);
    }
}

function set_current_table_name(newTableName){
    tableName = newTableName;
    localStorage.setItem("tableName", newTableName);
    get_current_table_name();
}

function get_current_table_name(){
    tableName = localStorage.getItem("tableName");
    document.cookie = "tableName=" + tableName;
}

function try_to_insert_into(succesful){
    if(succesful){
        alert("Podatak je sacuvan!");
        window.location.href = 'tabelephp/' + tableName + '.php';
        return;
    }
    alert('Greska! Podatak nije dodat!');
}

function try_to_update(succesful){
    if(succesful){
        alert("Podatak je promenjen uspesno!");
        window.location.href = 'tabelephp/' + tableName + '.php';
        return;
    }
    alert('Greska! Podatak nije promenjen uspesno!');
}

function check_cookie(cookie){
    let documentCookie = document.cookie.split('=')[1];
    if(cookie != documentCookie){
        location.reload();
    }
}