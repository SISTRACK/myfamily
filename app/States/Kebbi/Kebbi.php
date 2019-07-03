<?php
namespace App\States\Kebbi;

use Modules\Address\Entities\State;

trait Kebbi

{
	use Aliero, ArewaDandi, Argungu, Augie, Bagudo, BirninKebbi, Bunza, Dandi, DankoWasagu, Fakai, Gwandu, Jega,Kalgo, KokoBesse, Mayyama, Ngaski, Sakaba, Shanga, Suru, Yauri, Zuru;

    public $lga_id;

    public function generateKebbiInformation(State $state)
    {
    	foreach ($state->lgas as $lga) {
    		$this->lga_id = $lga->id;
    		switch ($this->lga_id) {
    			case '426':
    				foreach ($this->aliero() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '427':
    				foreach ($this->arewaDandi() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '428':
    				foreach ($this->argungu() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '429':
    				foreach ($this->augie() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '430':
    				foreach ($this->bagudo() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '431':
    				foreach ($this->birninKebbi() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '432':
    				foreach ($this->bunza() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '433':
    				foreach ($this->dandi() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '434':
    				foreach ($this->dankoWasagu() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '435':
    				foreach ($this->fakai() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '436':
    				foreach ($this->gwandu() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '437':
    				foreach ($this->jega() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '438':
    				foreach ($this->kalgo() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '439':
    				foreach ($this->kokoBesse() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '440':
    				foreach ($this->mayyama() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '441':
    				foreach ($this->ngaski() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '442':
    				foreach ($this->sakaba() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '443':
    				foreach ($this->shanga() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '444':
    				foreach ($this->suru() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '445':
    				foreach ($this->yauri() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			case '446':
    				foreach ($this->zuru() as $current_data) {
    					$current_district = $lga->districts()->firstOrCreate(['name'=>$current_data['district']]);
    					foreach ($current_data['towns'] as $town) {
    						$current_district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($current_district);
    				}
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    		$this->lga_id = $this->lga_id + 1;
    	}
    }
}