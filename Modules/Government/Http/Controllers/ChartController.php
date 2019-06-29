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
class ChartController extends Controller
{
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
}
