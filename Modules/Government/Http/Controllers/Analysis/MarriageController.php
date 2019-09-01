<?php

namespace Modules\Government\Http\Controllers\Analysis;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\Lga;
use Modules\Address\Entities\Town;
use Modules\Address\Entities\District;
use Modules\Government\Entities\Year;
use Modules\Government\Entities\Month;
use Modules\Government\Charts\Social\MarriageChart;
use Modules\Government\Entities\LgaMarriageCollation;
use Modules\Government\Entities\TownMarriageCollation;
use Modules\Government\Entities\DistrictMarriageCollation;
use Modules\Government\Entities\AreaMarriageCollation;

class MarriageController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('government::Analysis.Marriage.index',['years'=>Year::all(),'months'=>Month::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function showResult(MarriageChart $marriage)
    {
        return view('government::Analysis.Marriage.result',['marriage'=>$marriage->createChart()]);
    }

    public function search(Request $request)
    {
        $flag = null;
        $result_of = null;
        if($request->year_id){
            $flag = 'year';
        }
        if($request->month_id){
            $flag = 'month';
            $request->validate(['year_id'=>'required']);
        }
        $labels = [];
        $data_sets = [];
        if($request->town_id){
            //view district chart on specified month basic the label eg (District 2019 January)
           $town = Town::find($request->town_id);
           $result_of = $town->name.' Town';
            if($flag == 'month'){
                foreach ($town->areas as $area) {
                    $count = 0;
                    foreach (AreaMarriageCollation::where(['area_id'=>$area->id,'year_id'=>$request->year_id,'month_id'=>$request->month_id])->get() as $area_marriage) {
                        $count = $count + $area_marriage->marriage;
                    }
                    $labels[] = $area->name.' '.Year::find($request->year_id)->year.' '.Month::find($request->month_id)->month;
                    $data_sets[] = $count;
                }
                
            }else{
                //view district chart on specified year basic the label eg (District 2019)
                if($flag == 'year'){
                    foreach ($town->areas as $area) {
                        $count = 0;
                        foreach (AreaMarriageCollation::where(['area_id'=>$area->id,'year_id'=>$request->year_id])->get() as $area_marriage) {

                            $count = $area_marriage->marriage + $count;
                        }
                        $labels[] = $area->name.' '.Year::find($request->year_id)->year;
                        $data_sets[] = $count;
                        
                    }
                }else{
                    //view general district marriages)
                    foreach ($town->areas as $area) {
                        $count = 0;
                        foreach (AreaMarriageCollation::where(['area_id'=>$area->id])->get() as $area_marriage) {
                            $count = $count + $area_marriage->marriage;
                        }
                        $labels[] = $area->name;
                        $data_sets[] = $count;
                    }
                }
            }
        }else if($request->district_id){
            //view district chart on specified month basic the label eg (District 2019 January)
           $district = District::find($request->district_id);
            $result_of = $district->name.' District';
            if($flag == 'month'){
                foreach ($district->towns as $town) {
                    $count = 0;
                    foreach (TownMarriageCollation::where(['town_id'=>$town->id,'year_id'=>$request->year_id,'month_id'=>$request->month_id])->get() as $town_marriage) {
                        $count = $count + $town_marriage->marriage;
                    }
                    $labels[] = $town->name.' '.Year::find($request->year_id)->year.' '.Month::find($request->month_id)->month;
                    $data_sets[] = $count;
                }
                
            }else{
                //view district chart on specified year basic the label eg (District 2019)
                if($flag == 'year'){
                    foreach ($district->towns as $town) {
                        $count = 0;
                        foreach (TownMarriageCollation::where(['town_id'=>$town->id,'year_id'=>$request->year_id])->get() as $town_marriage) {

                            $count = $town_marriage->marriage + $count;
                        }
                        $labels[] = $town->name.' '.Year::find($request->year_id)->year;
                        $data_sets[] = $count;
                        
                    }
                }else{
                    //view general district marriages)
                    foreach ($district->towns as $town) {
                        $count = 0;
                        foreach (TownMarriageCollation::where(['town_id'=>$town->id])->get() as $town_marriage) {
                            $count = $count + $town_marriage->marriage;
                        }
                        $labels[] = $town->name;
                        $data_sets[] = $count;
                    }
                }
                
            }
        }elseif($request->lga_id){
            
            //view district chart on specified month basic the label eg (District 2019 January)
            $lga = Lga::find($request->lga_id);
            $result_of = $lga->name.' Local Government';

            if($flag == 'month'){
                foreach ($lga->districts as $district) {
                    $count = 0;
                    foreach (DistrictMarriageCollation::where(['district_id'=>$district->id,'year_id'=>$request->year_id,'month_id'=>$request->month_id])->get() as $district_marriage) {
                        $count = $count + $district_marriage->marriage;
                    }
                    $labels[] = $district->name.' '.Year::find($request->year_id)->year.' '.$district_marriage->month->month;
                    $data_sets[] = $count;
                }
                
            }else{

                //view district chart on specified year basic the label eg (District 2019)
                if($flag == 'year'){
                    foreach ($lga->districts as $district) {
                        $count = 0;

                        foreach (DistrictMarriageCollation::where(['district_id'=>$district->id,'year_id'=>$request->year_id])->get() as $district_marriage) {

                            $count = $district_marriage->marriage + $count;
                        }
                        $labels[] = $district->name.' '.Year::find($request->year_id)->year;
                        $data_sets[] = $count;
                        
                    }
                }else{
                    //view general district marriages)
                    foreach ($lga->districts as $district) {
                        $count = 0;
                        foreach (DistrictMarriageCollation::where(['district_id'=>$district->id])->get() as $district_marriage) {
                            $count = $count + $district_marriage->marriage;
                        }
                        $labels[] = $district->name;
                        $data_sets[] = $count;
                    }
                }
                
            }
        }else{
            /*
             * you dont specify the direction of the search so we are going to use your 
             * accessibility to get the general marriages for you
            */
            if(government()->state){
                $result_of = government()->state->name.' State';
                
                foreach (government()->state->lgas as $lga) {
                    $count = 0;
                    foreach ($lga->lgaMarriageCollations as $marriage) {
                        $count = $marriage->marriage + $count;
                    }
                    $data_sets[] = $count;
                    $labels[] = $lga->name;
                }
            }elseif(government()->lga){
                $result_of = government()->lga->name.' Local Government';
                foreach (government()->lga->districts as $district) {
                    $count = 0;
                    foreach ($district->districtMarriageCollations as $marriage) {
                        $count = $marriage->marriage + $count;
                    }
                    $data_sets[] = $count;
                    $labels[] = $district->name;
                }
            }elseif(government()->district){
                $result_of = government()->district->name.' District';
                foreach (government()->district->towns as $town) {
                    $count = 0;
                    foreach ($town->townMarriageCollations as $marriage) {
                        $count = $marriage->marriage + $count;
                    }
                    $data_sets[] = $count;
                    $labels[] = $town->name;
                }
            }
        }
        session(['data_set'=>$data_sets,'label'=>$labels,'result_of'=>$result_of]);

        return redirect()->route('government.analysis.marriage.result');
    }
}
