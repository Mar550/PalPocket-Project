<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
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
        $expenses = Expense::orderBy('id','asc')->get();
        return view('pocket.expense', compact('expenses'));
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
        $this->validate($request, [
            'description' => 'required|string|max:255',
            'amount' => 'required|max:25',
            'date' => 'required',
            'receipt' => 'max:2048'
        ],[
            'description.required' => 'The description of the income is required',
            'description.string' => 'The description should contain string characters',
            'description.max' => 'The description should contain a maximum of 255 characters',
            'amount.required' => 'The amount is required',
            'amount.max' => 'The amount is too high',
            'date.required' => 'The date is required',
            'receipt.max' => 'The maximum upload file size is 2M'
        ]);

        $path = $request->file('receipt')->store('public/files');

        $expense = new Expense;
        $expense ->description = $request->input('description');
        $expense ->amount = $request->input('amount');
        $expense ->date = $request->input('date');
        $expense ->receipt = $path;
        $expense->save();
        return $expense;
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
