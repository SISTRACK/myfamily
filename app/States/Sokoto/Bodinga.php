<?php
namespace App\States\Sokoto;

trait Bodinga
{
	public function bodinga()
	{
		return [
            [
            	'district'=>'Bodinga','towns'=>
            	[
					'Bodinga',
					'Garko',
					'Kaura-Minyo',
					'Mazar Gari',
					'Toma'
            	]
            ],
            [
            	'district'=>'Dingyadi','towns'=>
            	[
					'Badawa',
					'Dingyadi',
					'Kulafassa',
					'Tulluwa'
            	]
            ],
            [
            	'district'=>'Sifawa','towns'=>
            	[
					'Badau',
					'Bindin',
					'Danguibi',
					'Dankurmi',
					'Lukuyawa',
					'S/Birn',
					'Sifawa'
            	]
            ]
		];
	}
}