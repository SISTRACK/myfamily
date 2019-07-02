<?php
namespace App\States\Kebbi;

trait Ngaski
{
	public function ngaski($value='')
	{
		return [
            [
                'district'=>'Birnin Yauri','towns'=>
                [
                    'B/Yauri',
					'G/ Baka',
					'Kambuwa',
					'Kimo',
					'Makirim',
                ]
            ],
            [
                'district'=>'Ngaski','towns'=>
                [
                    'Chipanini',
					'G/ Kwano',
					'G/ Tagware',
					'Kwanga',
					'Libata',
					'Macufa',
					'Ngaski',
					'Utono',
					'Wara'
                ]
            ],
		];
	}
}