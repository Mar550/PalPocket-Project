<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Chart;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Nette\Utils\DateTime;


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
        $chart = DB::table('chart')->orderBy('created_at','desc')->first();
        $start = $chart->from;
        $end = $chart->to;

        $incomes = Income::pluck('amount','date');
        $expenses = Expense::pluck('amount','date');

        $income = $incomes->values();
        $expense = $expenses->values();
        
        $daysInc = Income::selectRaw('DAY(income.date) AS day')->orderByRaw('date ASC')->groupBy('day')->pluck('day');
        $monthsInc = Income::selectRaw('MONTH(income.date) AS month')->orderByRaw('date ASC')->groupBy('month')->pluck('month');
        $yearsInc = Income::selectRaw('YEAR(income.date) AS year')->orderByRaw('date ASC')->groupBy('year')->pluck('year');

        $array = (array) $yearsInc;

        // Income of each year 
        foreach ($yearsInc as $yearInc){
            $incomeYears = Income::select(DB::raw('sum(income.amount) as amount'),DB::raw('YEAR(income.date) as year'))
            ->orderByRaw('year ASC')
            ->groupBy('year')
            ->pluck('amount')
            ->toArray();
        }
        
        // Income of each month of each year
        $incomeMonths = Income::select(DB::raw('sum(income.amount) as amount'),DB::raw('month(income.date) AS month'),DB::raw('year(income.date) as year'))
        ->orderByRaw('year ASC')
        ->groupBy('date')
        ->pluck('amount')
        ->toArray();

        
        // Income of each day 
        $incomeDays = Income::select(DB::raw('sum(income.amount) as amount'),
        DB::raw('day(income.date) AS day'),
        DB::raw('month(income.date) AS month'),
        DB::raw('year(income.date) AS year'))
        ->orderByRaw('year ASC')
        ->groupBy('date')
        ->pluck('amount')
        ->toArray();

        // Generate the dates in the range
        // Left Join the income table 
        //


        if(Chart::exists()) {
            switch ($chart->type){
                case(1):
                    echo("type 1");
                    switch($chart->period){
                        case(1):
                            $labels = $daysInc;
                            $start = $chart->from;
                            $end = $chart->to;
                            $daterange = CarbonPeriod::create($start, $end);
                            foreach ($daterange as $date) {
                                echo $date->format('Y-m-d') . "<br>";
                            }                    
                            $dates = $daterange->toArray();
                            break;
                        case(2):
                            $daterange = CarbonPeriod::create($start, '1 month', $end);
                            $dates = $daterange->toArray();
                            $data = $incomeMonths;
                            break;
                        case(3):
                            $labels = $yearsInc;
                            $start = $chart->from;
                            $end = $chart->to;
                            
                            $daterange = CarbonPeriod::create($start, '1 year', $end);
                            foreach ($daterange as $date) {
                                echo $date->format('Y') . "<br>";
                            }                    
                            $dates = $daterange->toArray();
                            break;
                        }
                    break;
                case(2):
                    echo("type 2");
                    break;
            }        
        }
        return view('pocket.chart2',compact('incomes','expenses','income','expense','array','chart','daterange','dates','data'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $income = Income::all();
        $expense = Expense::all();
        $chart = Chart::all();

        return view('pocket.modal', compact('chart','income','expense'));
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