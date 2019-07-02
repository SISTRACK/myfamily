<?php
namespace App\States\Kebbi;

trait Kebbi

use Aliero, ArewaDandi, Argungu, Augie, Bagudo, BirninKebbi, Bunza, Dandi, DankoWasagu, Fakai, Gwandu, Jega,Kalgo, KokoBesse, Mayyama, Ngaski, Sakaba, Shanga, Suru, Yauri, Zuru;
{
    public function kebbi(State $state)
    {
    	foreach ($state->lgas as $lga) {
    		switch ($lga->name) {
    			case 'Aliero':
    				foreach ($this->aliero() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'ArewaDandi':
    				foreach ($this->arewaDandi() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Argungu':
    				foreach ($this->argungu() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Augie':
    				foreach ($this->augie() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Bagudo':
    				foreach ($this->bagudo() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'BirninKebbi':
    				foreach ($this->birninKebbi() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Bunza':
    				foreach ($this->bunza() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Dandi':
    				foreach ($this->dandi() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'DankoWasagu':
    				foreach ($this->dankoWasagu() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Fakai':
    				foreach ($this->fakai() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Gwandu':
    				foreach ($this->gwandu() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Jega':
    				foreach ($this->jega() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Kalgo':
    				foreach ($this->kalgo() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'KokoBesse':
    				foreach ($this->kokoBesse() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Mayyama':
    				foreach ($this->mayyama() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Ngaski':
    				foreach ($this->ngaski() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Sakaba':
    				foreach ($this->sakaba() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Shanga':
    				foreach ($this->shanga() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Suru':
    				foreach ($this->suru() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Yauri':
    				foreach ($this->yauri() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case 'Zuru':
    				foreach ($this->zuru() as $current_lga) {
    					$current_district = $current_lga->districts()->create(['name'=>$current_lga['district']]);
    					foreach ($current_lga['towns'] as $town) {
    						$current_district->towns()->create(['lga_id'=>$lga->id,'name'=>$town]);
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