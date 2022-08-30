	function sendComment(){
			let service_id = $("#service_id").val();
			let fullname = $("#fullname").val();
			let email = $("#email").val();
			if(email==""){
				email='nil';
			}
			let comment = $("#comment").val(); 

			$.post('includes/requests/insert-requests.php',{
						insertcomment:'true',
						service_id:service_id,
						fullname:fullname,
						email:email,
						comment:comment
					
			},
				function(data, status){
					$("#show").html(data);
			}); 
		}
			
		//$("#comments").load('includes/requests/comments.php');