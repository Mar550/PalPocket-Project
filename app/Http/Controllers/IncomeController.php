<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Income;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
        $income = Income::orderBy('id','asc')->get();
        return view('pocket.income', compact('income'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $income = new Income;
        $income ->description = $request->input('description');
        $income ->amount = $request->input('amount');
        $income ->date = $request->input('date');
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
        $income = Income::findOrFail($id);
        return view('pocket.editincome',['income'=>$income]);
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
        $income = Income::findOrFail($id);
        $income->description = $request->description;
        $income->amount = $request->amount;
        $income->date = $request->date;
        $receipt = $income->receipt;
        if($request->file('receipt')) {
            Storage::delete($receipt);
            $receipt = $request->file('receipt')->store('public/files');
        }
        $income->receipt = $receipt;
        $income->update();
        return redirect()->route('income.index');           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income = Income::find($id);
        if ($income != null) {
            $income->delete();
        }
        return redirect()->route('income.index');
    }
}
