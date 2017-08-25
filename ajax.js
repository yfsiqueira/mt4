$(document).ready(function(){
	$('#tabela').empty();
	$.ajax({
		type:'post',
		dataType: 'json',
		url: 'dataJson.php',
		success: function(dados){

			for(var i=0;dados.length>i;i++){

				$('#tabela').append('<tr><td>'+dados[i].id+'</td><td>'+dados[i].name+
				'</td><td>'+dados[i].personal_email+'</td><td>'
				+dados[i].work_email+'</td><td>'
				+dados[i].home_phone+'</td><td>'+dados[i].cell_phone+'</td><td>'
				+dados[i].work_phone+'</td></tr>');
			}

		}
	});
});
