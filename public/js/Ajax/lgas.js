
	$(document).ready(function(){
        console.log('here')
        $('select[name="state"]').on('change',function(){
            var state_id = $(this).val();
            if(state_id){
                $.ajax({
                   url: '/core/ajax/address/state/'+state_id+'/lgas',
                   type: 'GET',
                   dataType: 'json',
                   success: function(data){
                        $('select[name="lga"]').empty();
                        $('select[name="lga"]').append('<option value="">Select Local Government</option>');  
                   	   $.each(data, function(key, value){
                   	   	$('select[name="lga"]').append('<option value="'+key+'">'+ value +'</option>');
                   	   });
                   }
                });
            } else {
                $('select[name="area"]').empty();
            }
        });
	});
