function deleteRecord(id) {
    let decision = confirm('Are you sure you want to delete this product? ');
    if (decision == true) {
        $.post('requests/delete-product.php', {
                delete1: 'true',
                table: 'products',
                column_id: 'id',
                id: id
            },
            function(data, status) {
                alert(data);
               
                    window.location.assign("myadverts.php");
            

            })
    }
}

function deactivate(newData, id) {
    var result = confirm("By deactivating this advert, it means it will not appear public for people to view, Do you want to continue?");
    if (result == true) {

        $(document).ajaxStart(function() {
            $("#showMessage").html("<i class='fa fa-spinner fa-spin'></i>");
        })

        $.post("requests/update.php", { newData: newData, tableName: 'products', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
            $("#showMessage").html(data);
            window.location.assign('myadverts.php');

        });
    }

}


function activate(newData,id) {
    //let newData = 1;
    var result = confirm("By activating this advert, it means it will appear public for people to view, Do you want to continue?");
    if (result == true) {

        $.post("requests/update.php", { newData: newData, tableName: 'products', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
            $("#showMessage").html(data);
             window.location.assign('myadverts.php');

        });
    }

}




/* for services */
function deleteServiceRecord(id) {
    let decision = confirm('Are you sure you want to delete this Advert? ');
    if (decision == true) {
        $.post('requests/delete-product.php', {
                delete1: 'true',
                table: 'services',
                column_id: 'id',
                id: id
            },
            function(data, status) {
                alert(data);
               
               window.location.assign("myadverts.php");
            

            })
    }
}


function deactivateService(newData, id) {
    var result = confirm("By deactivating this advert, it means it will not appear public for people to view, Do you want to continue?");
    if (result == true) {

        $(document).ajaxStart(function() {
            $("#showMessage").html("<i class='fa fa-spinner fa-spin'></i>");
        })

        $.post("requests/update.php", { newData: newData, tableName: 'services', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
           alert("Advert deactivated successfully");
            window.location.assign('myadverts.php');

        });
    }

}


function activateService(newData,id) {
    //let newData = 1;
    var result = confirm("By activating this advert, it means it will appear public for people to view, Do you want to continue?");
    if (result == true) {

        $.post("requests/update.php", { newData: newData, tableName: 'services', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
            alert("Advert activated successfully");
             window.location.assign('myadverts.php');

        });
    }

}


/* for job */

function deleteJobRecord(id) {
    let decision = confirm('Are you sure you want to delete this Advert? ');
    if (decision == true) {
        $.post('requests/delete-product.php', {
                delete1: 'true',
                table: 'job',
                column_id: 'id',
                id: id
            },
            function(data, status) {
                alert(data);
               
                    window.location.assign("myadverts.php");
            

            })
    }
}


function deactivateJob(newData, id) {
    var result = confirm("By deactivating this advert, it means it will not appear public for people to view, Do you want to continue?");
    if (result == true) {

        $(document).ajaxStart(function() {
            $("#showMessage").html("<i class='fa fa-spinner fa-spin'></i>");
        })

        $.post("requests/update.php", { newData: newData, tableName: 'job', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
           alert("Advert deactivated successfully");
            window.location.assign('myadverts.php');

        });
    }

}


function activateJob(newData,id) {
    //let newData = 1;
    var result = confirm("By activating this advert, it means it will appear public for people to view, Do you want to continue?");
    if (result == true) {

        $.post("requests/update.php", {newData: newData, tableName: 'Job', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
            alert("Advert activated successfully");
             window.location.assign('myadverts.php');

        });
    }

}


/* for skills */

function deleteSkillRecord(id) {
    let decision = confirm('Are you sure you want to delete this Advert? ');
    if (decision == true) {
        $.post('requests/delete-product.php', {
                delete1: 'true',
                table: 'skills',
                column_id: 'id',
                id: id
            },
            function(data, status) {
                alert(data);
               
                     window.location.assign("myadverts.php");
            

            })
    }
}


function deactivateSkill(newData, id) {
    var result = confirm("By deactivating this advert, it means it will not appear public for people to view, Do you want to continue?");
    if (result == true) {

        $(document).ajaxStart(function() {
            $("#showMessage").html("<i class='fa fa-spinner fa-spin'></i>");
        })

        $.post("requests/update.php", { newData: newData, tableName: 'skills', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
           alert("Advert deactivated successfully");
            window.location.assign('myadverts.php');

        });
    }

}


function activateSkill(newData,id) {
    //let newData = 1;
    var result = confirm("By activating this advert, it means it will appear public for people to view, Do you want to continue?");
    if (result == true) {

        $.post("requests/update.php", { newData: newData, tableName: 'skills', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
            alert("Advert activated successfully");
             window.location.assign('myadverts.php');

        });
    }

}

/* for vacancy*/
function deleteVacancyRecord(id) {
    let decision = confirm('Are you sure you want to delete this Advert? ');
    if (decision == true) {
        $.post('requests/delete-product.php', {
                delete1: 'true',
                table: 'vacancy',
                column_id: 'id',
                id: id
            },
            function(data, status) {
                alert(data);
               
                   window.location.assign("myadverts.php");
            

            })
    }
}


function deactivateVacancy(newData, id) {
    var result = confirm("By deactivating this advert, it means it will not appear public for people to view, Do you want to continue?");
    if (result == true) {

        $(document).ajaxStart(function() {
            $("#showMessage").html("<i class='fa fa-spinner fa-spin'></i>");
        })

        $.post("requests/update.php", { newData: newData, tableName: 'vacancy', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
           alert("Advert deactivated successfully");
            window.location.assign('myadverts.php');

        });
    }

}


function activateVacancy(newData,id) {
    //let newData = 1;
    var result = confirm("By activating this advert, it means it will appear public for people to view, Do you want to continue?");
    if (result == true) {

        $.post("requests/update.php", { newData: newData, tableName: 'vacancy', column_name: 'user_approval_status', column_id: 'id', id: id }, function(data, status) {
            alert("Advert activated successfully");
             window.location.assign('myadverts.php');

        });
    }

}