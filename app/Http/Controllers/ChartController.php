<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Chart;
use Cron\MonthField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $date = Income::select('date')->get();
        $selectmonth = Income::whereMonth('date','=','month')->get();
        $dataincome = Income::select('amount')->get()->sum('amount');
        $dataexpense = Expense::select('amount')->get();
        $incomedate = Income::select('date')->get();
        $expdate = Income::select('amount')->whereMonth('date','06')->get();

        //Montant income total de tous les mois
        $montanttotal = DB::table('income')->get('income.amount')->sum('amount');
        //Montant total income du mois 05
        $jan = DB::table('income')->whereMonth('date','01')->get('income.amount')->sum('amount');
        $feb = DB::table('income')->whereMonth('date','02')->get('income.amount')->sum('amount');
        $mar = DB::table('income')->whereMonth('date','03')->get('income.amount')->sum('amount');
        $apr = DB::table('income')->whereMonth('date','04')->get('income.amount')->sum('amount');
        $may = DB::table('income')->whereMonth('date','05')->get('income.amount')->sum('amount');
        $jun = DB::table('income')->whereMonth('date','06')->get('income.amount')->sum('amount');
        $jul = DB::table('income')->whereMonth('date','07')->get('income.amount')->sum('amount');
        $aug = DB::table('income')->whereMonth('date','08')->get('income.amount')->sum('amount');
        $sep = DB::table('income')->whereMonth('date','09')->get('income.amount')->sum('amount');
        $oct = DB::table('income')->whereMonth('date','10')->get('income.amount')->sum('amount');
        $nov = DB::table('income')->whereMonth('date','11')->get('income.amount')->sum('amount');
        $dec = DB::table('income')->whereMonth('date','12')->get('income.amount')->sum('amount');
        
        return view('pocket.chart', compact('dataincome','dataexpense','incomedate','expdate','selectmonth','montanttotal','jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'))->with('month',json_encode($month,JSON_NUMERIC_CHECK));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
