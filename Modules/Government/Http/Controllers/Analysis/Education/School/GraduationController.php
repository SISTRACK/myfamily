<?php

namespace Modules\Government\Http\Controllers\Analysis\Education\School;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\Lga;
use Modules\Address\Entities\Town;
use Modules\Government\Entities\Year;
use Modules\Address\Entities\District;
use Modules\Government\Entities\LgaSchoolReportCollation;
use Modules\Government\Entities\TownSchoolReportCollation;
use Modules\Government\Entities\AreaSchoolReportCollation;
use Modules\Government\Entities\DistrictSchoolReportCollation;
use Modules\Government\Charts\Education\School\GraduationChart;

class GraduationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('government::Analysis.Education.School.Graduation.index',['years'=>Year::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function showResult(GraduationChart $graduation)
    {
        return view('government::Analysis.Education.School.Graduation.result',['graduation'=>$graduation->createChart()]);
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
        $labels = [];
        $data_sets = [];
        if($request->town_id){
            //view district chart on specified month basic the label eg (District 2019 January)
            $town = Town::find($request->town_id);
            $result_of = $town->name.' Town';
            if($flag == 'year'){
                foreach ($town->areas as $area) {
                    $count = 0;
                    foreach (AreaSchoolReportCollation::where(['area_id'=>$area->id,'year_id'=>$request->year_id])->get() as $area_school_graduation) {
                        $count = $area_school_graduation->yearly_graduation + $count;
                    }
                    $labels[] = $area->name.' '.Year::find($request->year_id)->year;
                    $data_sets[] = $count; 
                }
            }else{
                foreach ($town->areas as $area) {
                    $count = 0;
                    foreach (AreaSchoolReportCollation::where(['area_id'=>$area->id])->get() as $area_school_graduation) {
                        $count = $area_school_graduation->yearly_graduation + $count;
                    }
                    $labels[] = $area->name;
                    $data_sets[] = $count; 
                }
            }  
        }else if($request->district_id){
            if($flag == 'year'){
                foreach ($district->towns as $town) {
                    $count = 0;
                    foreach (TownSchoolReportCollation::where(['town_id'=>$town->id,'year_id'=>$request->year_id])->get() as $town_school_graduation) {
                        $count = $town_school_graduation->yearly_graduation + $count;
                    }
                    $labels[] = $town->name.' '.Year::find($request->year_id)->year;
                    $data_sets[] = $count; 
                }
            }else{
                foreach ($district->towns as $town) {
                    $count = 0;
                    foreach (TownSchoolReportCollation::where(['town_id'=>$town->id])->get() as $town_school_graduation) {
                        $count = $town_school_graduation->yearly_graduation + $count;
                    }
                    $labels[] = $town->name;
                    $data_sets[] = $count; 
                }
            }
        }elseif($request->lga_id){
            //view district chart on specified month basic the label eg (District 2019 January)
            $lga = Lga::find($request->lga_id);
            $result_of = $lga->name.' Local Government';
            if($flag == 'year'){
                foreach ($lga->districts as $district) {
                    $count = 0;
                    foreach (DistrictSchoolReportCollation::where(['district_id'=>$district->id,'year_id'=>$request->year_id])->get() as $district_school_graduation) {

                        $count = $district_school_graduation->yearly_graduation + $count;
                    }
                    $labels[] = $district->name.' '.Year::find($request->year_id)->year;
                    $data_sets[] = $count;
                }
            }else{
                foreach ($lga->districts as $district) {
                    $count = 0;
                    foreach (DistrictSchoolReportCollation::where(['district_id'=>$district->id])->get() as $district_school_graduation) {

                        $count = $district_school_graduation->yearly_graduation + $count;
                    }
                    $labels[] = $district->name;
                    $data_sets[] = $count;
                }
            }
            
        }else{
            /*
             * you dont specify the direction of the search so we are going to use your 
             * accessibility to get the general for you
            */
            if(government()->state){
                $result_of = government()->state->name.' State';
                
                foreach (government()->state->lgas as $lga) {
                    $count = 0;
                    foreach ($lga->lgaSchoolReportCollations as $school_graduation) {
                        $count = $school_graduation->yearly_graduation + $count;
                    }
                    $data_sets[] = $count;
                    $labels[] = $lga->name;
                }
            }elseif(government()->lga){
                $result_of = government()->lga->name.' Local Government';
                foreach (government()->lga->districts as $district) {
                    $count = 0;
                    foreach ($district->districtSchoolReportCollations as $school_graduation) {
                        $count = $school_graduation->yearly_graduation + $count;
                    }
                    $data_sets[] = $count;
                    $labels[] = $district->name;
                }
            }elseif(government()->district){
                $result_of = government()->district->name.' District';
                foreach (government()->district->towns as $town) {
                    $count = 0;
                    foreach ($town->townSchoolReportCollations as $school_graduation) {
                        $count = $school_graduation->yearly_graduation + $count;
                    }
                    $data_sets[] = $count;
                    $labels[] = $town->name;
                }
            }
        }
        session(['data_set'=>$data_sets,'label'=>$labels,'result_of'=>$result_of]);

        return redirect()->route('government.analysis.education.school.graduation.result');

    }
}
