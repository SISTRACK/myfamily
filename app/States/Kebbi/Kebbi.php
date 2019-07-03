<?php
namespace App\States\Kebbi;

use Modules\Address\Entities\State;

trait Kebbi

{
	use Aliero, ArewaDandi, Argungu, Augie, Bagudo, BirninKebbi, Bunza, Dandi, DankoWasagu, Fakai, Gwandu, Jega,Kalgo, KokoBesse, Mayyama, Ngaski, Sakaba, Shanga, Suru, Yauri, Zuru;

    public function generateKebbiInformation(State $state)
    {
    	foreach ($state->lgas as $this_lga) {
    		switch ($this_lga->id) {
    			case '426':
    				foreach ($this->aliero() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '427':
    				foreach ($this->arewaDandi() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '428':
    				foreach ($this->argungu() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '429':
    				foreach ($this->augie() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '430':
    				foreach ($this->bagudo() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '431':
    				foreach ($this->birninKebbi() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '432':
    				foreach ($this->bunza() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '433':
    				foreach ($this->dandi() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '434':
    				foreach ($this->dankoWasagu() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '435':
    				foreach ($this->fakai() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '436':
    				foreach ($this->gwandu() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '437':
    				foreach ($this->jega() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '438':
    				foreach ($this->kalgo() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '439':
    				foreach ($this->kokoBesse() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '440':
    				foreach ($this->mayyama() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '441':
    				foreach ($this->ngaski() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '442':
    				foreach ($this->sakaba() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '443':
    				foreach ($this->shanga() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '444':
    				foreach ($this->suru() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '445':
    				foreach ($this->yauri() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			case '446':
    				foreach ($this->zuru() as $data) {
    					$district = $this_lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$this_lga->id,'name'=>$town]);
    					}
    					$this->createDistrictUser($district);
    				}
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    	}
    }
}