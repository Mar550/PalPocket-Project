@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h1> Income </h1>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  ADD NEW
</button>

<!--  Create Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">  NEW INCOME </h5>
        <br>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="form" method="POST" action="{{ route('income.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="input-group mb-3">
                <input id="description" class="form-control" type="text" placeholder="Description" name="description" >
            </div>
            <span> {{ $errors->first('description')}} </span>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong id="descriptionError">{{ $message }}</strong>
                </span> 
            @enderror           

            <div class="input-group mb-3">
                <input id="amount" type="text" class="form-control" name="amount" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                    <span class="input-group-text"> € </span>
                </div>
            </div>
            <span> {{ $errors->first('amount')}} </span>

            @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong id="amountError">{{ $message }}</strong>
                </span> 
            @enderror

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                </div>
                <input type="date" id="date" class="form-control" name="date" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <span> {{ $errors->first('date')}} </span>

            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong id="dateError">{{ $message }}</strong>
                </span> 
            @enderror
            
            <div class="input-group mb-3">
                <input id="receipt" type="file" class="form-control" name="receipt"  >
                    @error('receipt')
                        <span class="invalid-feedback" role="alert">
                            <strong id="receiptError">{{ $message }}</strong>
                        </span> 
                    @enderror
            </div>
            <span> {{ $errors->first('receipt')}} </span>

            <div class="modal-footer">
        <button type="submit"  class="btn btn-primary"> Create </button>
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
<!--  End create Modal -->


<!-- Table -->
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th id="thid">Id</th>
                <th id="thwording">Description</th>
                <th id="thamount">Amount</th>
                <th id="thdaet">Date</th>
                <th id="thinvoice">Receipt</th>
                <th>  </th>
            </tr>
        </thead>

        @forelse($income as $inc)

        <tbody>
            <tr>
                <td>{{ $inc->id }}</td>
                <td>{{ $inc->description }}</td>
                <td>{{ $inc->amount }} €</td>
                <td>{{ $inc->date }}</td>
                <td>{{ $inc->receipt }}</td>
                <td> 
                    <div class="icones">
                    <a href="{{ route('income.edit', $inc->id)}}"> <i style="color:orange;font-size:20px" class="fa-solid fa-pen-to-square"></i> </a>
                    <form  action="{{ route('income.delete', $inc->id) }}" method="POST" > 
                        @method('DELETE')
                        @csrf       
                      <button type="submit" class="btn btn-primary" id="delete"> <i id="icone2" class="fa-solid fa-trash-can"> </i> </button>
                    </form>                    
                    </div>
                </td>
            </tr>
            
        </tbody>
        @empty
        <tr>
            No income added 
        </tr>
        @endforelse
    </table>
</div>

@endsection



