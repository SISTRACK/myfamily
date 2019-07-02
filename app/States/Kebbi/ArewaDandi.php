<?php
namespace App\States\Kebbi;

trait ArewaDandi 
{
	public function arewaDandi()
	{
		return [
            [
            	'district'=>'kangiwa','towns'=>
            	[
            		'Baraje Buii',	
					'Chibike',	
					'Falde',	
					'Fasko',	
					'G/Dikko',	
					'Gumundai',	
					'Gunki',	
					'Kangiwa',	
					'Muza Jaffeji',	
					'Rafin Taska'
				]
            ],
            [
            	'district'=>'yeldu','towns'=>
            	[
            		'Bachaka',	
					'Danstohuwa',	
					'Dantsoho',	
					'Daura',	
					'Jantullu',	
					'Jarkuka',	
					'Laima',	
					'Sakwaba',	
					'Sarka',	
					'Yeldu'
				]
            ]
		];
	}
	
}