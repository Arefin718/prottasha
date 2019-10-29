<?php

namespace App\Http\Controllers;

use App\Report;
use App\Sell;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function SellReportAll(){

        $sells=Report::DailySell();

        return view('admin.report.sellReport')->with('sells',$sells);
    }

    public function SellReportByRange(Request $request){
$sells= Report::SellByRange($request);
return $sells;

    }
}
