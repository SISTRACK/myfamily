
	$(document).ready(function(){
        console.log('here')
        $('select[name="town"]').on('change',function(){
            var town_id = $(this).val();
            if(town_id){
                $.ajax({
                   url: '/core/ajax/address/town/'+town_id+'/areas',
                   type: 'GET',
                   dataType: 'json',
                   success: function(data){
                   	   $('select[name="area"]').empty();
                   	   $.each(data, function(key, value){
                   	   	$('select[name="area"]').append('<option value="'+key+'">'+ value +'</option>');
                   	   });
                   }
                });
            } else {
                $('select[name="area"]').empty();
            }
        });
	});