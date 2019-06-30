<?php

namespace Modules\Government\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Government\Charts\Health\Polio;
use Modules\Government\Charts\Health\Malaria;
use Modules\Government\Charts\Health\Tv;
use Modules\Government\Charts\Health\Hiv;
use Modules\Government\Charts\Health\Diabetes;

use Modules\Government\Charts\Social\MarriageChart;
use Modules\Government\Charts\Social\DivorceChart;
use Modules\Government\Charts\Social\DeathChart;
use Modules\Government\Charts\Social\BirthChart;
use Modules\Government\Charts\Social\AccidentChart;
use Modules\Government\Charts\Social\PopulationChart;

use Modules\Government\Charts\Education\Graduated\PrimaryGraduated;
use Modules\Government\Charts\Education\Graduated\SecondaryGraduated;
use Modules\Government\Charts\Education\Graduated\PolyGraduated;
use Modules\Government\Charts\Education\Graduated\CoeGraduated;
use Modules\Government\Charts\Education\Graduated\NursingGraduated;
use Modules\Government\Charts\Education\Graduated\UniversityGraduated;


use Modules\Government\Charts\Education\Admitted\PrimaryAdmitted;
use Modules\Government\Charts\Education\Admitted\SecondaryAdmitted;
use Modules\Government\Charts\Education\Admitted\PolyAdmitted;
use Modules\Government\Charts\Education\Admitted\CoeAdmitted;
use Modules\Government\Charts\Education\Admitted\NursingAdmitted;
use Modules\Government\Charts\Education\Admitted\UniversityAdmitted;

class ChartController extends Controller
{
    public function population(PopulationChart $population)
    {
        return view('government::Government.Charts.Social.population',['population'=>$population->createChart()]);
    }
    //health

    public function polio(Polio $polio)
    {
        return view('government::Government.Charts.Health.polio',['polio'=>$polio->createChart()]);
    }

    public function hiv(Hiv $hiv)
    {
        return view('government::Government.Charts.Health.hiv',['hiv'=>$hiv->createChart()]);
    }

    public function malaria(Malaria $malaria)
    {
        return view('government::Government.Charts.Health.malaria',['malaria'=>$malaria->createChart()]);
    }

    public function diabetes(Diabetes $diabetes)
    {
        return view('government::Government.Charts.Health.diabetes',['diabetes'=>$diabetes->createChart()]);
    }

    public function tv(Tv $tv)
    {
        return view('government::Government.Charts.Health.tv',['tv'=>$tv->createChart()]);
    }


    //educational


    public function primary(PrimaryAdmitted $admitted, PrimaryGraduated $graduated)
    {
        return view('government::Government.Charts.Education.primary',
            [
                'admitted'=>$admitted->admitted(),
                'graduated'=>$graduated->graduated()
            ]);
    }

    public function secondary(SecondaryAdmitted $admitted, SecondaryGraduated $graduated)
    {
        return view('government::Government.Charts.Education.secondary',
            [
                'admitted'=>$admitted->admitted(),
                'graduated'=>$graduated->graduated()
            ]);
    }

    public function coe(CoeAdmitted $admitted, CoeGraduated $graduated)
    {
        return view('government::Government.Charts.Education.coe',
            [
                'admitted'=>$admitted->admitted(),
                'graduated'=>$graduated->graduated()
            ]);
    }

    public function nursing(Nursing $nursing)
    {
        return view('government::Government.Charts.Education.nursing',
            [
                'admitted'=>$nursing->admitted(),
                'graduated'=>$nursing->graduated()
            ]);
    }

    public function poly(PolyAdmitted $admitted, PolyGraduated $graduated)
    {
        return view('government::Government.Charts.Education.poly',[
            'admitted'=>$admitted->admitted(),
            'graduated'=>$graduated->graduated()
        ]);
    }

     public function university(UniversityAdmitted $admitted, UniversityGraduated $graduated)
    {
        return view('government::Government.Charts.Education.university',
            [
                'admitted'=>$admitted->admitted(),
                'graduated'=>$graduated->graduated()
            ]);
    }

    //social routes

    public function birth(BirthChart $birth)
    {
        return view('government::Government.Charts.Social.birth',['birth'=>$birth->createChart()]);
    }

    public function marriage(MarriageChart $marriage)
    {
        return view('government::Government.Charts.Social.marriage',['marriage'=>$marriage->createChart()]);
    }

    public function death(DeathChart $death)
    {
        return view('government::Government.Charts.Social.death',['death'=>$death->createChart()]);
    }

    public function accident(AccidentChart $accident)
    {
        return view('government::Government.Charts.Social.accident',['accident'=>$accident->createChart()]);
    }

    public function divorce(DivorceChart $divorce)
    {
        return view('government::Government.Charts.Social.divorce',['divorce'=>$divorce->createChart()]);
    }
}
