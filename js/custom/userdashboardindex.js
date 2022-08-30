
			function deleteRecord(id){
				let decision = confirm('Are you sure you want to delete this product? '); 
				if(decision==true){
				$.post('requests/delete-request.php',
				{ 
					delete1:'true',
					table:'products',
					column_id:'id',
					id:id				},
				function(data,status){
					setTimeout(function() {
					$("#showMessage").html(data);
					}, 500);
					setTimeout(function() {
					window.location.assign(window.location.href);
					}, 700);
					
					
				}) 
			}
			}
		