   
        $.post('requests/upload-services.php',{addservices:'addservices'
        },function(data,status){
            $("#service_category").html(data);
        });
        /*
   $("#submit").click(function(){
    setTimeout(function() {
     $("#addproduct").submit();
    }, 500);
   }); */
