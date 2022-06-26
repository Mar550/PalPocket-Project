<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Expense;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Http\Controllers\ChartController;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */


    public function handler(Request $request): Chartisan
    {
        $incomes = Income::pluck('amount','date');
        $expenses = Expense::pluck('amount','date');

        $income = $incomes->values();
        $expense = $expenses->values();

        

        return Chartisan::build()
            ->labels(['2018','2019','2020','2021','2022'])
            ->dataset('Income', $income->toArray())
            ->dataset('Expense', $expense->toArray());

    }


    public function index(Request $request) 
    {
       
    }
}