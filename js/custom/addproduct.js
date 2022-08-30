
    $("#subcategory").hide();
    
      $.post('requests/check-subcategory.php',{showcategory:'showcategory'

        },function(data,status){
            $("#category").html(data);
         
        });    

   $("#category").change(function(){
        let category_id =  $("#category").val();
        $.post('requests/check-subcategory.php',{check_subcategory:category_id

        },function(data,status){

            if(data=='true'){
                $("#subcategory").show(500);
                    $.post('requests/check-subcategory.php',{mysubcategory:category_id, category_id:category_id
                    
        },function(data,status){
            $("#selectsubcategory").html(data);
        });

            }else{
                $("#subcategory").hide(500);
            }
        });
      });
   $("#submit").click(function(){
    setTimeout(function() {
     $("#addproduct").submit();
    }, 500);
   });
