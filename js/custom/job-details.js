	function sendComment(){
			let product_id = $("#product_id").val();
			let fullname = $("#fullname").val();
			let user_id = $("#user_id").val();
			let email = $("#email").val();
			if(email==""){
				email='nil';
			}
			let comment = $("#comment").val(); 

			$.post('includes/requests/insert-requests.php',{
						insertcomment:'true',
						product_id:product_id,
						fullname:fullname,
						comment:comment,
						user_id:user_id
					
			},
				function(data, status){
					$("#show").html(data);
			}); 
		}
			
		//$("#comments").load('includes/requests/comments.php');