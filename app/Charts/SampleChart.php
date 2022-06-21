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


        return Chartisan::build()
            ->labels($income)
            ->dataset('Income', [1, 2, 3])
            ->dataset('Expense', [3, 2, 1]);

    }


    public function index(Request $request) 
    {
       
    }
}