function deleteRecord(id) {
    let decision = confirm('Are you sure you want to delete this product? ');
    if (decision == true) {
        $.post('requests/delete-request.php', {
                delete1: 'true',
                table: 'saved_adverts',
                column_id: 'id',
                id: id
            },
            function(data, status) {
                alert(data);
               
                    window.location.assign("saved-adverts.php");
            

            })
    }
}