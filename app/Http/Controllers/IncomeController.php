<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Income;
use Illuminate\Support\Facades\Session;

class IncomeController extends Controller
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
        return view('pocket.income');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('pocket.income', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|bool|max:255',
            'date' => 'required',
            'receipt' => 'max:2048'
            
        ],[
            'description.required' => 'The description of the income  name is required',
            'description.string' => 'The description field must contain characters',
            'amount.required' => 'The amount is required',
            'amount.bool' => 'The amount must be a number',
            'date.required' => 'The date is required',
            'image.max' => 'The maximum upload size is 2M',]);
        

        $path = $request->file('receipt')->store('public/files');

        $income = new Income;
        $income ->description = $request->input('description');
        $income ->date = $request->input('date');
        $income ->amount = $request->input('amount');
        $income ->receipt = $path;
        $income->save();
        return $income;

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
