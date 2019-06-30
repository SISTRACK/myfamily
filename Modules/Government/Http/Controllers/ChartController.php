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
use Modules\Government\Charts\Education\Primary;
use Modules\Government\Charts\Education\Secondary;
use Modules\Government\Charts\Education\Poly;
use Modules\Government\Charts\Education\Coe;
use Modules\Government\Charts\Education\Nursing;
use Modules\Government\Charts\Education\University;
class ChartController extends Controller
{
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


    public function primary(Primary $primary)
    {
        return view('government::Government.Charts.Education.primary',
            [
                'admitted'=>$primary->admitted(),
                'graduated'=>$primary->graduated()
            ]);
    }

    public function secondary(Secondary $secondary)
    {
        return view('government::Government.Charts.Education.secondary',
            [
                'admitted'=>$secondary->admitted(),
                'graduated'=>$secondary->graduated()
            ]);
    }

    public function coe(Coe $coe)
    {
        return view('government::Government.Charts.Education.coe',
            [
                'admitted'=>$coe->admitted(),
                'graduated'=>$coe->graduated()
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

    public function poly(Poly $poly)
    {
        return view('government::Government.Charts.Education.poly',[
            'admitted'=>$poly->admitted(),
            'graduated'=>$poly->graduated()
        ]);
    }

     public function university(University $university)
    {
        return view('government::Government.Charts.Education.university',
            [
                'admitted'=>$university->admitted(),
                'graduated'=>$university->graduated()
            ]);
    }
}
