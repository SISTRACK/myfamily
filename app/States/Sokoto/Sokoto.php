<?php
namespace App\States\Sokoto;

use Modules\Address\Entities\State;

trait Sokoto

{
	use Binji, Bodinga, DangeShuni, Gada, Goronyo, Gudu,Gwadabawa, Illela, Isa, Kebbe, Kware, Rabah, SabonBirni,Shagari, Silame, SokotoNorth, SokotoSouth, Tambuwal, Tangaza, Tureta, Wamakko, Wurno, Yabo;

    public function generateSokotoInformation($state)
    {
    	foreach ($state->lgas as $lga) {
    		switch ($lga->id) {
    			case '679':
    				foreach ($this->binji() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '680':
    				foreach ($this->bodinga() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '681':
    				foreach ($this->dangeShuni() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '682':
    				foreach ($this->gada() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '683':
    				foreach ($this->goronyo() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '684':
    				foreach ($this->gudu() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '685':
    				foreach ($this->gwadabawa() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '686':
    				foreach ($this->illela() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '687':
    				foreach ($this->isa() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '688':
    				foreach ($this->kebbe() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '689':
    				foreach ($this->kware() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '690':
    				foreach ($this->rabah() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '691':
    				foreach ($this->sabonBirni() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '692':
    				foreach ($this->shagari() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '693':
    				foreach ($this->silame() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '694':
    				foreach ($this->sokotoSouth() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '695':
    				foreach ($this->sokotoNorth() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '696':
    				foreach ($this->tambuwal() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '697':
    				foreach ($this->tangaza() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '698':
    				foreach ($this->tureta() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '699':
    				foreach ($this->wamakko() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '700':
    				foreach ($this->wurno() as $data) {
    					$district = $lga->districts()->firstOrCreate(['name'=>$data['district']]);
    					foreach ($data['towns'] as $town) {
    						$district->towns()->firstOrCreate(['lga_id'=>$lga->id,'name'=>$town]);
    					}
    				}
    				break;
    			case '701':
    				foreach ($this->yabo() as $data) {
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