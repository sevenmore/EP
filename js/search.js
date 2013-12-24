$(document).ready(function () {				
	$('#searchbar').keyup(function(){
		var searched = $('#searchbar').val();
		var fullurl = $('#hiddenurl').val() + 'index.php/main/proces';
		
		if(searched!=''){
			$.post(fullurl,{searchbar: searched},
			function(result){
				$('#results').html(result);
			});
		}else{
			$('#results').html('<label>Write something...</label>');
		}
		//$('#results').load(fullurl);
	});
	
	$('#results').hide();
	
	$('#searchbar').focus(function(){
		$('#results').show();
	});
	
	$('#searchbar').blur(function(){
		$('#results').hide();
	});
});