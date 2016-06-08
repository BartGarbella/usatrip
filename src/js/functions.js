$(document).ready(function(){
	$('#listLi').addClass('active');
	load('render','list');
})

$('.navbutton').click(function render() {
	$('.navbutton').parent().removeClass('active');
	$(this).parent().addClass('active');
	var file = $(this).attr('value');
	var type = 'render';
	load(type,file);
});




function load(type,payload) {
	console.log(type);
	var dataObject = {};
	dataObject[type] = payload;



	$.ajax({
		type: "POST",
		data: dataObject,
		url: "./include/load.php",
		success: function(data) {
			result = $.parseJSON(data);
			if(result.render) {
				$('#content').html(result.render);	
			}else if(result.modify) {
				modifymodal(result.modify);
			}else{
				console.log(result);
			}
		}
	}); 
}

function modifymodal(data) {
	$('#modifyModal').modal();
	$('#InputName').val(data.Name);
	$('#InputSum').val(data.Sum);
	$('#Currency').val(data.Currency);
	$('#InputShareBart').val(data.ShareBart * 100);
	$('#InputShareJessi').val(data.ShareJessi * 100);
	$('#InputPaidBy').val(data.PaidBy);

	
}




