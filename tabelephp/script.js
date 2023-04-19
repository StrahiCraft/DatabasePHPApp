function edit_id(id){
    if(confirm('Sigurni ste da zelite promenu podataka?')){
        window.location.href = 'edit_data.php?edit_id=' + id;
    }
}

function delete_id(id){
    if(confirm('Sigurni ste da zelite da obrisete podatak?')){
        window.location.href = 'index.php?delete_id' + id;
    }
}