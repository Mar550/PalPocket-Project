@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h1> Income </h1>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  ADD NEW
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">  NEW INCOME </h5>
        <br>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf

            <div class="input-group mb-3">
                <input class="form-control" type="text" placeholder="Description" name="description">
            </div>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> 
            @enderror           

            <div class="input-group mb-3">
                <input type="text" class="form-control" name="amount" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                    <span class="input-group-text"> € </span>
                </div>
            </div>

            @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> 
            @enderror

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                </div>
                <input type="date" class="form-control" name="date" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> 
            @enderror
            

            <div class="input-group mb-3">
                <input id="receipt" type="file" class="form-control" name="receipt"  required autocomplete="receipt" autofocus>
                    @error('receipt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                    @enderror
            </div>

            

            <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> Create </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

        </form>
      </div>
      
    </div>
  </div>
</div>
</div>
<br>
<br>

<!-- Table -->
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th id="thid">Id</th>
                <th id="thwording">Wording</th>
                <th id="thamount">Amount</th>
                <th id="thdaet">Date</th>
                <th id="thinvoice">Receipt</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>$372,000</td>
            </tr>
             
        </tbody> 
    </table>
</div>


@endsection

