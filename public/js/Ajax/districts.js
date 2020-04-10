
	$(document).ready(function(){
        console.log('here')
        $('select[name="lga"]').on('change',function(){
            var lga_id = $(this).val();
            if(lga_id){
                $.ajax({
                   url: '/core/ajax/address/lga/'+lga_id+'/districts',
                   type: 'GET',
                   dataType: 'json',
                   success: function(data){
                        $('select[name="district"]').empty();
                        $('select[name="district"]').append('<option value="">Select District</option>');  
                   	    $.each(data, function(key, value){
                   	      	$('select[name="district"]').append('<option value="'+key+'">'+ value +'</option>');
                   	    });
                   }
                });
            } else {
                $('select[name="district"]').empty();
            }
        });
	});
