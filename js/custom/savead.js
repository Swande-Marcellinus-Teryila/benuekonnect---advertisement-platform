
function saveAd(ad_id,ad_type,user_id){
$.post("includes/saveAd.php",{
	saveAdinsession:'',
	ad_id:ad_id,
	ad_type:ad_type,
	user_id:user_id
},function(data, status) {
	alert(data);
}); 
}