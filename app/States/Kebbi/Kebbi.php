<?php
namespace App\States\Kebbi;

use Modules\Address\Entities\State;

trait Kebbi

{
	use Aliero, ArewaDandi, Argungu, Augie, Bagudo, BirninKebbi, Bunza, Dandi, DankoWasagu, Fakai, Gwandu, Jega,Kalgo, KokoBesse, Mayyama, Ngaski, Sakaba, Shanga, Suru, Yauri, Zuru;

    public function generateKebbiInformation(State $state)
    {
    	foreach ($state->lgas as $lga) {
    		switch ($lga->id) {
    			case '426':
    				foreach ($this->aliero() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '427':
    				foreach ($this->arewaDandi() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '428':
    				foreach ($this->argungu() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '429':
    				foreach ($this->augie() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '430':
    				foreach ($this->bagudo() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '431':
    				foreach ($this->birninKebbi() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '432':
    				foreach ($this->bunza() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '433':
    				foreach ($this->dandi() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '434':
    				foreach ($this->dankoWasagu() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '435':
    				foreach ($this->fakai() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '436':
    				foreach ($this->gwandu() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '437':
    				foreach ($this->jega() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '438':
    				foreach ($this->kalgo() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '439':
    				foreach ($this->kokoBesse() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '440':
    				foreach ($this->mayyama() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '441':
    				foreach ($this->ngaski() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '442':
    				foreach ($this->sakaba() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '443':
    				foreach ($this->shanga() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '444':
    				foreach ($this->suru() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '445':
    				foreach ($this->yauri() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '446':
    				foreach ($this->zuru() as $data) {
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