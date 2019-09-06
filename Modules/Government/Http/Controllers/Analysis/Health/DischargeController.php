<?php

namespace Modules\Government\Http\Controllers\Analysis\Health;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\Lga;
use Modules\Address\Entities\Town;
use Modules\Government\Entities\Year;
use Modules\Health\Entities\Infection;
use Modules\Government\Entities\Month;
use Modules\Address\Entities\District;
use Modules\Government\Charts\Health\DischargeChart;
use Modules\Government\Entities\LgaHospitalReportCollation;
use Modules\Government\Entities\TownHospitalReportCollation;
use Modules\Government\Entities\DistrictHospitalReportCollation;
use Modules\Government\Entities\AreaHospitalReportCollation;

class DischargeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('government::Analysis.Health.Discharge.index',['years'=>Year::all(),'months'=>Month::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function showResult(DischargeChart $discharge)
    {
        return view('government::Analysis.Health.Discharge.result',['discharge'=>$discharge->createChart()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
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
           $result_of = $town->name.' Town Births';
            if($flag == 'month'){
                foreach ($town->areas as $area) {
                    $count = 0;
                    foreach (AreaHospitalReportCollation::where(['area_id'=>$area->id,'year_id'=>$request->year_id,'month_id'=>$request->month_id])->get() as $area_hospita_admission) {
                        $count = $count + $area_hospita_admission->monthly_discharge;
                    }
                    $labels[] = $area->name.' '.Year::find($request->year_id)->year.' '.Month::find($request->month_id)->month;
                    $data_sets[] = $count;
                }
                
            }else{
                //view district chart on specified year basic the label eg (District 2019)
                if($flag == 'year'){
                    foreach ($town->areas as $area) {
                        $count = 0;
                        foreach (AreaHospitalReportCollation::where(['area_id'=>$area->id,'year_id'=>$request->year_id])->get() as $area_hospita_admission) {

                            $count = $area_hospita_admission->monthly_discharge + $count;
                        }
                        $labels[] = $area->name.' '.Year::find($request->year_id)->year;
                        $data_sets[] = $count;
                        
                    }
                }else{
                    //view general district births)
                    foreach ($town->areas as $area) {
                        $count = 0;
                        foreach (AreaHospitalReportCollation::where(['area_id'=>$area->id])->get() as $area_hospita_admission) {
                            $count = $count + $area_hospita_admission->monthly_discharge;
                        }
                        $labels[] = $area->name;
                        $data_sets[] = $count;
                    }
                }
            }
        }else if($request->district_id){
            //view district chart on specified month basic the label eg (District 2019 January)
           $district = District::find($request->district_id);
            $result_of = $district->name.' District Births';
            if($flag == 'month'){
                foreach ($district->towns as $town) {
                    $count = 0;
                    foreach (TownHospitalReportCollation::where(['town_id'=>$town->id,'year_id'=>$request->year_id,'month_id'=>$request->month_id])->get() as $town_hospita_admission) {
                        $count = $count + $town_hospita_admission->monthly_discharge;
                    }
                    $labels[] = $town->name.' '.Year::find($request->year_id)->year.' '.Month::find($request->month_id)->month;
                    $data_sets[] = $count;
                }
                
            }else{
                //view district chart on specified year basic the label eg (District 2019)
                if($flag == 'year'){
                    foreach ($district->towns as $town) {
                        $count = 0;
                        foreach (TownHospitalReportCollation::where(['town_id'=>$town->id,'year_id'=>$request->year_id])->get() as $town_hospita_admission) {

                            $count = $town_hospita_admission->monthly_discharge + $count;
                        }
                        $labels[] = $town->name.' '.Year::find($request->year_id)->year;
                        $data_sets[] = $count;
                        
                    }
                }else{
                    //view general district births)
                    foreach ($district->towns as $town) {
                        $count = 0;
                        foreach (TownHospitalReportCollation::where(['town_id'=>$town->id])->get() as $town_hospita_admission) {
                            $count = $count + $town_hospita_admission->monthly_discharge;
                        }
                        $labels[] = $town->name;
                        $data_sets[] = $count;
                    }
                }
                
            }
        }elseif($request->lga_id){
            
            //view district chart on specified month basic the label eg (District 2019 January)
            $lga = Lga::find($request->lga_id);
            $result_of = $lga->name.' Local Government Births';

            if($flag == 'month'){
                foreach ($lga->districts as $district) {
                    $count = 0;
                    foreach (DistrictHospitalReportCollation::where(['district_id'=>$district->id,'year_id'=>$request->year_id,'month_id'=>$request->month_id])->get() as $district_hospita_admission) {
                        $count = $count + $district_hospita_admission->monthly_discharge;
                    }
                    $labels[] = $district->name.' '.Year::find($request->year_id)->year.' '.$district_hospita_admission->month->month;
                    $data_sets[] = $count;
                }
                
            }else{

                //view district chart on specified year basic the label eg (District 2019)
                if($flag == 'year'){
                    foreach ($lga->districts as $district) {
                        $count = 0;

                        foreach (DistrictHospitalReportCollation::where(['district_id'=>$district->id,'year_id'=>$request->year_id])->get() as $district_hospita_admission) {

                            $count = $district_hospita_admission->monthly_discharge + $count;
                        }
                        $labels[] = $district->name.' '.Year::find($request->year_id)->year;
                        $data_sets[] = $count;
                        
                    }
                }else{
                    //view general district births)
                    foreach ($lga->districts as $district) {
                        $count = 0;
                        foreach (DistrictHospitalReportCollation::where(['district_id'=>$district->id])->get() as $district_hospita_admission) {
                            $count = $count + $district_hospita_admission->monthly_discharge;
                        }
                        $labels[] = $district->name;
                        $data_sets[] = $count;
                    }
                }
                
            }
        }else{
            /*
             * you dont specify the direction of the search so we are going to use your 
             * accessibility to get the general births for you
            */
            if(government()->state){
                $result_of = government()->state->name.' State Births';
                
                foreach (government()->state->lgas as $lga) {
                    $count = 0;
                    foreach ($lga->lgaHospitalReportCollations as $hospital_admission) {
                        $count = $hospital_admission->monthly_discharge + $count;
                    }
                    $data_sets[] = $count;
                    $labels[] = $lga->name;
                }
            }elseif(government()->lga){
                $result_of = government()->lga->name.' Local Government Births';
                foreach (government()->lga->districts as $district) {
                    $count = 0;
                    foreach ($district->districtHospitalReportCollations as $hospital_admission) {
                        $count = $hospital_admission->monthly_discharge + $count;
                    }
                    $data_sets[] = $count;
                    $labels[] = $district->name;
                }
            }elseif(government()->district){
                $result_of = government()->district->name.' District Births';
                foreach (government()->district->towns as $town) {
                    $count = 0;
                    foreach ($town->townHospitalReportCollations as $hospital_admission) {
                        $count = $hospital_admission->monthly_discharge + $count;
                    }
                    $data_sets[] = $count;
                    $labels[] = $town->name;
                }
            }
        }
        session(['data_set'=>$data_sets,'label'=>$labels,'result_of'=>$result_of]);

        return redirect()->route('government.analysis.health.admission.discharge.result');
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
