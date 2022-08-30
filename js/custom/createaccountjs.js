

		$("#individual").hide();
	$("#company").hide();
	if($("#usertype").val()=="individual"){
		$("#company").hide();
		$("#individual").show(500);
	}
		if($("#usertype").val()=="company"){
		$("#individual").hide();
		$("#company").show(500);
	
	}

	$("#usertype").change(function(){
	if($("#usertype").val()=="individual"){
		$("#company").hide();
		$("#individual").show(500);
	}
	if($("#usertype").val()=="company"){
		$("#individual").hide();
		$("#company").show(500);
	
	}

	});
		
	$("#individualsubmitbtn").click(function(){

	$("#individualform").submit();

	});

	$("#companysubmitbtn").click(function(){

	$("#companysubmitbtn").submit();

	});
	

