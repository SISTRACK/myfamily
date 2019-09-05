<?php

namespace Modules\Government\Http\Controllers\Analysis\Health;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Address\Entities\Lga;
use Modules\Address\Entities\Town;
use Illuminate\Routing\Controller;
use Modules\Government\Entities\Year;
use Modules\Health\Entities\Infection;
use Modules\Government\Entities\Month;
use Modules\Address\Entities\District;
use Modules\Government\Charts\Health\InfectionChart;
use Modules\Government\Entities\LgaInfectionReportCollation;
use Modules\Government\Entities\TownInfectionReportCollation;
use Modules\Government\Entities\DistrictInfectionReportCollation;
use Modules\Government\Entities\AreaInfectionReportCollation;
class InfectionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('government::Analysis.Health.Infection.index',['years'=>Year::all(),'months'=>Month::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function showResult(InfectionChart $infection)
    {
        return view('government::Analysis.Health.Infection.result',['infection'=>$infection->createChart()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $request->validate(['infection'=>'required']);
        $infection = Infection::find($request->infection);
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
                    foreach (AreaInfectionReportCollation::where(['area_id'=>$area->id,'year_id'=>$request->year_id,'month_id'=>$request->month_id,'infection_id'=>$infection->id])->get() as $area_hospital_report) {
                        $count = $count + $area_hospital_report->monthly_infection;
                    }
                    $labels[] = $area->name.' '.Year::find($request->year_id)->year.' '.Month::find($request->month_id)->month;
                    $data_sets[] = $count;
                }
            }else{
                //view district chart on specified year basic the label eg (District 2019)
                if($flag == 'year'){
                    foreach ($town->areas as $area) {
                        $count = 0;
                        foreach (AreaInfectionReportCollation::where(['area_id'=>$area->id,'year_id'=>$request->year_id,'infection_id'=>$infection->id])->get() as $area_hospital_report) {

                            $count = $area_hospital_report->monthly_infection + $count;
                        }
                        $labels[] = $area->name.' '.Year::find($request->year_id)->year;
                        $data_sets[] = $count;
                        
                    }
                }else{
                    //view general district population)
                    foreach ($town->areas as $area) {
                        $count = 0;
                        foreach (AreaInfectionReportCollation::where(['area_id'=>$area->id,'infection_id'=>$infection->id])->get() as $area_hospital_report) {
                            $count = $count + $area_hospital_report->monthly_infection;
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
                    foreach (TownInfectionReportCollation::where(['town_id'=>$town->id,'year_id'=>$request->year_id,'month_id'=>$request->month_id,'infection_id'=>$infection->id])->get() as $town_hospital_report) {
                        $count = $count + $town_hospital_report->monthly_infection;
                    }
                    $labels[] = $town->name.' '.Year::find($request->year_id)->year.' '.Month::find($request->month_id)->month;
                    $data_sets[] = $count;
                }
                
            }else{
                //view district chart on specified year basic the label eg (District 2019)
                if($flag == 'year'){
                    foreach ($district->towns as $town) {
                        $count = 0;
                        foreach (TownInfectionReportCollation::where(['town_id'=>$town->id,'year_id'=>$request->year_id,'infection_id'=>$infection->id])->get() as $town_hospital_report) {

                            $count = $town_hospital_report->monthly_infection + $count;
                        }
                        $labels[] = $town->name.' '.Year::find($request->year_id)->year;
                        $data_sets[] = $count;
                        
                    }
                }else{
                    //view general district population)
                    foreach ($district->towns as $town) {
                        $count = 0;
                        foreach (TownInfectionReportCollation::where(['town_id'=>$town->id,'infection_id'=>$infection->id])->get() as $town_hospital_report) {
                            $count = $count + $town_hospital_report->monthly_infection;
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
                    foreach (DistrictInfectionReportCollation::where(['district_id'=>$district->id,'year_id'=>$request->year_id,'month_id'=>$request->month_id,'infection_id'=>$infection->id])->get() as $district_hospital_report) {
                        $count = $count + $district_hospital_report->monthly_infection;
                    }
                    $labels[] = $district->name.' '.Year::find($request->year_id)->year.' '.$district_hospital_report->month->month;
                    $data_sets[] = $count;
                }
                
            }else{

                //view district chart on specified year basic the label eg (District 2019)
                if($flag == 'year'){
                    foreach ($lga->districts as $district) {
                        $count = 0;

                        foreach (DistrictInfectionReportCollation::where(['district_id'=>$district->id,'year_id'=>$request->year_id,'infection_id'=>$infection->id])->get() as $district_hospital_report) {

                            $count = $district_hospital_report->monthly_infection + $count;
                        }
                        $labels[] = $district->name.' '.Year::find($request->year_id)->year;
                        $data_sets[] = $count;
                        
                    }
                }else{
                    //view general district population)
                    foreach ($lga->districts as $district) {
                        $count = 0;
                        foreach (DistrictInfectionReportCollation::where(['district_id'=>$district->id,'infection_id'=>$infection->id])->get() as $district_hospital_report) {
                            $count = $count + $district_hospital_report->monthly_infection;
                        }
                        $labels[] = $district->name;
                        $data_sets[] = $count;
                    }
                }    
            }
        }else{
            /*
             * you dont specify the direction of the search so we are going to use your 
             * accessibility to get the general population for you
            */
            if(government()->state){
                $result_of = government()->state->name.' State';
                foreach (government()->state->lgas as $lga) {
                    $count = 0;
                    foreach ($lga->lgaInfectionReportCollations as $infection_report) {
                        if($infection->id == $infection_report->infection_id){
                            $count = $infection_report->monthly_infection + $count;
                        }
                    }
                    $data_sets[] = $count;
                    $labels[] = $lga->name;
                }
            }elseif(government()->lga){
                $result_of = government()->lga->name.' Local Government';
                foreach (government()->lga->districts as $district) {
                    $count = 0;
                    foreach ($district->districtInfectionReportCollations as $infection_report) {
                        if($infection->id == $infection_report->infection_id){
                            $count = $infection_report->monthly_infection + $count;
                        }
                    }
                    $data_sets[] = $count;
                    $labels[] = $district->name;
                }
            }elseif(government()->district){
                $result_of = government()->district->name.' District';

                foreach (government()->district->towns as $town) {
                    $count = 0;
                    foreach ($town->townInfectionReportCollations as $infection_report) {
                        if($infection->id == $infection_report->infection_id){
                            $count = $infection_report->monthly_infection + $count;
                        }
                    }
                    $data_sets[] = $count;
                    $labels[] = $town->name;
                }
            }
        }

        session(['data_set'=>$data_sets,'label'=>$labels,'result_of'=>$result_of,'infection'=>$infection->name]);

        return redirect()->route('government.analysis.health.infection.result');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('government::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('government::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
