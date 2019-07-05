<?php

namespace App\States\Zamfara;

trait Zamfara
{
	use Anka, Bakura, BirninMagaji,Bukuyyum, Bungudu, TalataMafara, Gumi, Gusau, KauraNamoda, Maradun, Maru, Shinkafi, Zurmi;
	public function generateZamfaraInformation($state)
    {
    	foreach ($state->lgas as $lga) {
    		switch ($lga->id) {
    			case '736':
    				foreach ($this->anka() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    				case '737':
    				foreach ($this->bakura() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '738':
    				foreach ($this->birninMagaji() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '739':
    				foreach ($this->bukuyyum() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '740':
    				foreach ($this->bungudu() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '741':
    				foreach ($this->gumi() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '742':
    				foreach ($this->gusau() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '741':
    				foreach ($this->kauraNamoda() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '743':
    				foreach ($this->maradun() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '744':
    				foreach ($this->maru() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '745':
    				foreach ($this->shinkafi() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '746':
    				foreach ($this->talataMafara() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '747':
    				foreach ($this->zurmi() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    	}
    }
}