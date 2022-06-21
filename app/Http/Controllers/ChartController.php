<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Chart;
use Cron\MonthField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $incomes = Income::pluck('amount','date');
        $expenses = Expense::pluck('amount','date');

        $income = $incomes->values();

        $income = $income->toArray();
        
        return view('pocket.chart',compact('incomes','expenses','income'));
        
        /*** 
        $date = Income::select('date')->get();
        $selectmonth = Income::whereMonth('date','=','month')->get();
        $dataincome = Income::select('amount')->get()->sum('amount');
        $dataexpense = Expense::select('amount')->get();
        $incomedate = Income::select('date')->get();
        $expdate = Income::select('amount')->whereMonth('date','06')->get();

        //Montant income total de tous les mois
        $montanttotal = DB::table('income')->get('income.amount')->sum('amount');
        //Montant total income du mois 05

        $yeara = DB::table('income')->whereYear('date','2018')->get('income.amount')->sum('amount');
        $yearb = DB::table('income')->whereYear('date','2019')->get('income.amount')->sum('amount');
        $yearc = DB::table('income')->whereYear('date','2020')->get('income.amount')->sum('amount');
        $yeard = DB::table('income')->whereYear('date','2021')->get('income.amount')->sum('amount');
        $yeare = DB::table('income')->whereYear('date','2022')->get('income.amount')->sum('amount');

        $yearsamount = array($yeara,$yearb,$yearc,$yeard,$yeare);   

        // TESTS
        $days = array('1','2','3','4','5','6','7','8','9','10');
        $months = array('01','02','03','04','05','06','07','08','09','10','11','12');
        $years = array('2018','2019','2020','2021','2022');

        foreach ($months as $month){
            $query = DB::table('income')->whereMonth('date',$month)->get('income.amount');
        }



        foreach($years as $year){
            $amountYearInc = DB::table('income')->whereYear('date',$year)->get('income.amount');
            foreach($months as $month) {
                $amountMonthInc = DB::table('income')->whereYear('date',$year)->whereMonth('date',$month)->get('income.amount')->sum('amount');
                foreach($days as $day){
                    $amountDayInc = DB::table('income')->whereYear('date',$year)->whereMonth('date',$month)->whereDay('date',$day)->get('income.amount')->sum('amount');
                }
            }
        }

        foreach($years as $year){
            $amountYearExp = DB::table('expense')->whereYear('date',$year)->get('expense.amount')->sum('amount');
            foreach($months as $month) {
                $amountMonthExp = DB::table('expense')->whereYear('date',$year)->whereMonth('date',$month)->get('expense.amount')->sum('amount');
                foreach($days as $day){
                    $amountDayExp = DB::table('expense')->whereYear('date',$year)->whereMonth('date',$month)->whereDay('date',$day)->get('expense.amount')->sum('amount');
                }
            }
        }               
            
        return view('pocket.chart', compact('amountDayInc','amountMonthInc','amountYearInc','amountDayExp','amountMonthExp','amountYearExp','query','yeara','yearb','yearc','yeard','yeare','yearsamount'))
        ->with('days',json_encode($days,JSON_NUMERIC_CHECK))
        ->with('years',json_encode($years,JSON_NUMERIC_CHECK))
        ->with('months',json_encode($days,JSON_NUMERIC_CHECK));
        */
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chart = Chart::all();
        $income = Income::all();
        $expense = Expense::all();
        return view('pocket.chart', compact('chart','income','expense'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chartdata = Chart::create([
            'type' => $request->type,
            'period' => $request->period,
            'from' => $request->from,
            'to' => $request->to,
        ]);
        Session::put('message', 'Chart created ');
        return view('home')->with('message','Chart created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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