	function sendProductComment(){
			let product_id = $("#product_id").val();
			let fullname = $("#fullname").val();
			let user_id = $("#user_id").val();
			let email = $("#email").val();
			let user_chat_status = $("#user_chat_status").val();

			if(email==""){
				email='nil';
			}
			let comment = $("#comment").val(); 

			$.post('includes/requests/insert-requests.php',{
						insertcomment:'true',
						product_id:product_id,
						fullname:fullname,
						comment:comment,
						user_id:user_id,
						user_chat_status:user_chat_status
					
			},
				function(data, status){
					$("#comment").val(""); 
					$("#show").html(data);
			}); 
		}
			


	function sendServiceComment(){
			let service_id = $("#service_id").val();
			let fullname = $("#fullname").val();
			let user_id = $("#user_id").val();
			let email = $("#email").val();
			let user_chat_status = $("#user_chat_status").val();
			if(email==""){
				email='nill';
			}
			let comment = $("#comment").val(); 

			$.post('includes/requests/insert-requests.php',{
						insertcomment:'true',
					    service_id:service_id,
						fullname:fullname,
						comment:comment,
						user_id:user_id,
						user_chat_status:user_chat_status
					
			},
				function(data, status){
					$("#comment").val(""); 
					$("#show").html(data);
			}); 
		}
		

		function sendJobComment(){
			let job_id = $("#job_id").val();
			let fullname = $("#fullname").val();
			let user_id = $("#user_id").val();
			let email = $("#email").val();
			let user_chat_status = $("#user_chat_status").val();
			if(email==""){
				email='nill';
			}
			let comment = $("#comment").val(); 

			$.post('includes/requests/insert-requests.php',{
						insertcomment:'true',
					    job_id:job_id,
						fullname:fullname,
						comment:comment,
						user_id:user_id,
						user_chat_status:user_chat_status
					
			},
				function(data, status){
					$("#comment").val(""); 
					$("#show").html(data);
			}); 
		}
		

		function sendVacancyComment(){
			let vacancy_id = $("#vacancy_id").val();
			let fullname = $("#fullname").val();
			let user_id = $("#user_id").val();
			let email = $("#email").val();
			let user_chat_status = $("#user_chat_status").val();
			if(email==""){
				email='nill';
			}
			let comment = $("#comment").val(); 

			$.post('includes/requests/insert-requests.php',{
						insertcomment:'true',
					    vacancy_id:vacancy_id,
						fullname:fullname,
						comment:comment,
						user_id:user_id,
						user_chat_status:user_chat_status
					
			},
				function(data, status){
					$("#comment").val(""); 
					$("#show").html(data);
			}); 
		}



		function sendSkillComment(){
			let skill_id = $("#skill_id").val();
			let fullname = $("#fullname").val();
			let user_id = $("#user_id").val();
			let email = $("#email").val();
			let user_chat_status = $("#user_chat_status").val();
			if(email==""){
				email='nill';
			}
			let comment = $("#comment").val(); 

			$.post('includes/requests/insert-requests.php',{
						insertcomment:'true',
					    skill_id:skill_id,
						fullname:fullname,
						comment:comment,
						user_id:user_id,
						user_chat_status:user_chat_status
					
			},
				function(data, status){
					$("#comment").val(""); 
					$("#show").html(data);
			}); 
		}


		//$("#comments").load('includes/requests/comments.php');