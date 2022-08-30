 setInterval(function() {
       
        $.post('includes/header2.php', {
              

            },
            function(data, status) {
                $("#showheader2").html(data);
            })
    }, 500);
